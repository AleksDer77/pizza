D_C = docker-compose
P_A = php artisan
E_P_F = exec php-fpm

test:
	${D_C} ${E_P_F} ${P_A} test
up:
	${D_C} up -d
exec:	up
	docker exec -it php-fpm bash
down:
	${D_C} down
upb:
	${D_C} up -d --build
lcl:
	echo -n > storage/logs/laravel.log
cache:
	${D_C} ${E_P_F} ${P_A} cache:clear
migration:
	${D_C} ${E_P_F} ${P_A} make:migration
migrate:
	${D_C} ${E_P_F} ${P_A} migrate
migrate-rollback:
	${D_C} ${E_P_F} ${P_A} migrate:rollback
tinker:
	${D_C} ${E_P_F} ${P_A} tinker
test-command:
	${D_C} ${E_P_F} ${P_A} test:command
