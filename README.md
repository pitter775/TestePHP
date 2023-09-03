# SIGO

## Instalação

1. Clonar este repositório
2. Executar `composer install`
3. Renomear `.env.example` para `.env` e atualizar com as credenciais do seu banco de dados local
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `php artisan module:seed`
7. `php artisan serve`

## Dependência

- [Composer](https://getcomposer.org/)
- [PHP 8.1](https://www.php.net/downloads)
