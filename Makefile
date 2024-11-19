start:
	php artisan serve --host=0.0.0.0 --port=8000
watch:
	npm run watch
migrate:
	php artisan migrate
console:
	php artisan tinker
gen-helper:
	php artisan ide-helper:generate
test:
	php artisan test
log:
	tail -f storage/logs/laravel.log
dump:
	composer dump-autoload
lint:
	composer exec --verbose phpcs -- --standard=PSR12 app
lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 app
clear-cache:
	php artisan cache:clear
	php artisan route:clear
	php artisan config:clear
	php artisan view:clear
