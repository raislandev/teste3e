<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instalação 
<p>Instalar dependencia do laravel:</p>
<ul>
    <li>composer install</li> 
</ul>
<br>
<p>Instalar o driver do php-mongo:</p>
<ul>
    <li>sudo apt-get install php-mongodb</li>
</ul>
<br>
<p>Configurar o .env e banco de dados</p>
<ul>
    <li>criar o arquivo .env de arcodo o .env.example</li>
    <li>php artisan key:generate</li>
    <li>Adicione a configuração do banco no arquivo .env
      <ul>
        <li>DB_CONNECTION=mongodb</li>
        <li>MONGO_DB_HOST=127.0.0.1</li>
        <li>MONGO_DB_PORT=27017</li>
        <li>MONGO_DB_DATABASE=nameBanco</li>
        <li>MONGO_DB_USERNAME=username</li>
        <li>MONGO_DB_PASSWORD=password</li>
      </ul>
    </li>
</ul>
<br>
<p>Iniciar a aplicação: php artisan serve</p>


## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
