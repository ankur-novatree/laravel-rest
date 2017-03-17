Laravel-RestModel
===================
What is RestModel ? It is a laravel based package that can expose api for any model
provided. Its easy !

                 This package is powered by

[![](http://www.novatree.com/sites/all/themes/novatree/logo.png)](https://nodesource.com/products/nsolid)


Functionality
-------------

> - this packages extends your models CRUD based functionality.
> - it enables restful urls/routes.
> - the model objects will be created dynamically uses laravel native methods.
> - it can be usable for native/hybrid mobile app or any web app development as a backend.
> - it is so easy just hit the url and get required respose !

#### <i class="icon-file"></i> Installation
>- run the command <strong>composer require novatree/restmodel</strong> from console after traversing to your laravel project directory .Then follow the steps bellow.
>- go to your laravel application root directory.
>- there is a file with the  LaravelProject\Config\app.php.
>- in this file there is an array of contents called providers.
>- paste <i class="icon-paste"> <strong> Novatree\RestModel\RestModelServiceProvider::class,</strong> in <strong>Project\config\app.php</strong> file providers array.
>- paste <i class="icon-paste"> <strong> 'Rest' => Novatree\RestModel\Facades\RestFacade::class,</strong> in <strong>Project\config\app.php</strong> file aliases array.
>- now from your console type composer dump-autoload or
  > composer dump-autoload -o for autloading composer vendors
  > and classes.
>- its all set .
>- If you fased any problem regarding this package feel free to mail me
> <i class="icon-mail"></i> tejomay@novatree.com



