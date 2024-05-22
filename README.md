# symfony + vue + postgres ddb demo

A demo project that uses ddb to show how easy it is to setup an environment.

This is a project using Symfony 7, Vue 3 and Postgres 16.

If you had to install such project by hand, you would have to install PHP (and its correct set of extensions), Composer, Symfony, node.js, npm, vite, postgres, create the database, configure the database connection, etc...

All of that is automatically handled by the devbox.

## Installation

### Clone the project

```bash
git clone https://github.com/inetum-orleans/ddb-symfony-vue-demo.git
```

### In your devbox, in the project directory

```bash
ddb configure
```

The first time, you will need to activate the project

```bash
$(ddb activate)
```

(You could also use `cd .` and let the magic of smartcd activate the project for you, if you don't mind the warning that the project is not activated yet)

### Initialize the project

```bash
make init
```

This will build and run the docker containers, setup the database and install the dependencies.

### Start the frontend project

```bash
make watch
```

That's it, your app is up and running on https://ddb-symfony-vue-demo.test