init: install init-db fill-db

install: install-backend install-frontend

install-backend:
	cd backend && composer install

install-frontend:
	cd frontend && npm install

init-db:
	backend/bin/console doctrine:migration:migrate

fill-db:
	backend/bin/console doctrine:fixtures:load