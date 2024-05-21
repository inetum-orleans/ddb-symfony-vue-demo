init: dc-build dc-up install init-db fill-db

dc-build:
	docker compose build

dc-up:
	docker compose up -d

install: install-backend install-frontend

install-backend:
	cd backend && composer install

install-frontend:
	cd frontend && npm install

init-db:
	backend/bin/console doctrine:migration:migrate

fill-db:
	backend/bin/console doctrine:fixtures:load

watch:
	cd frontend && npm run dev