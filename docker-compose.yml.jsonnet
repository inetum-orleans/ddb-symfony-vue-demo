local ddb = import 'ddb.docker.libjsonnet';

local domain_ext = std.extVar('core.domain.ext');
local domain_sub = std.extVar('core.domain.sub');

local domain = std.join('.', [domain_sub, domain_ext]);
local dbConnectionString = 'postgresql://' + std.extVar('app.db.user') + ':' + std.extVar('app.db.password') + '@db/' + std.extVar('app.db.db');

ddb.Compose(
  ddb.with(
    import '.docker/node/djp.libjsonnet',
    append=ddb.VirtualHost('5173', domain)
  ) +
  {
    services+: {
      db: ddb.Build('postgres') + ddb.User() +
          ddb.Binary('psql', '/project', 'psql --dbname=' + dbConnectionString) +
          ddb.Binary('pg_dump', '/project', 'pg_dump --dbname=' + dbConnectionString) +
          ddb.Expose('5432') +
          {
            environment+: {
              POSTGRES_USER: std.extVar('app.db.user'),
              POSTGRES_PASSWORD: std.extVar('app.db.password'),
              POSTGRES_DB: std.extVar('app.db.db'),
            },
            volumes+: [
              'db-data:/var/lib/postgresql/data',
              ddb.path.project + ':/project',
            ],
          },
      php: ddb.Build('php') +
           ddb.User() +
           ddb.Binary('composer', '/var/www/html', 'composer') +
           ddb.Binary('php', '/var/www/html', 'php') +
           ddb.XDebug() +
           {
             volumes+: [
               ddb.path.project + ':/var/www/html',
               'php-composer-cache:/composer/cache',
               'php-composer-vendor:/composer/vendor',
             ],
           },
      web: ddb.Build('web') +
           {
             volumes+: [
               ddb.path.project + ':/var/www/html',
               ddb.path.project + '/.docker/web/apache.conf:/usr/local/apache2/conf/custom/apache.conf',
             ],
           },
    },
  }
)
