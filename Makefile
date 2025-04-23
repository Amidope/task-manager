start:
	php artisan serve --host=0.0.0.0 --port=8000
watch:
	npm run watch
gen-helper:
	php artisan ide-helper:generate
test:
	php artisan test
log:
	tail -f storage/logs/laravel.log
dump:
	composer dump-autoload
lint:
	composer exec --verbose phpcs
lint-fix:
	composer exec --verbose phpcbf
clear-cache:
	php artisan cache:clear
	php artisan route:clear
	php artisan config:clear
	php artisan view:clear
rollback:
	php artisan migrate:rollback
setup:
	cp -n .env.example .env || true
	php artisan key:generate
	php artisan migrate
	php artisan db:seed
