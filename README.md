Laravel-RestModel
===================
What is RestModel ? It is a laravel based package that can expose api for any model
provided. Its easy !

                  This package is powered by

<img src="http://www.novatree.com/sites/all/themes/novatree/logo.png" width="auto" height="150px">


Functionality
------------------

> - this packages extends your models CRUD based functionality.
> - it provides you restful functionality  with your existing methods without righting single line of code.
> - e.g. if you have a User model then,
    -   you can get all results by accessing this url [your-project-name]/User   **(GET)**
    - you can get a particular record by accessing this url [your-project-name]/User/id   **(GET)**
    - you can create a record with providing all necessary model attributes hitting url [your-project-name]/User   **(POST)**
    - you can update a record passing id and all necessary model attributes hitting url [your-project-name]/User/id   **(PUT)**
    - you can delete a record passing id hitting url [your-project-name]/User/id  **(DELETE)**

#### <i class="icon-file"></i> Installation
-------------------------------------------
>- to install the package please type the command <strong>composer require novatree/restmodel</strong> from console in your laravel project directory .Then follow the steps bellow ....
>- go to your laravel application root directory.
>- there is a file with the  YourLaravelProject\Config\app.php.
>- in this file there is an array of contents called providers.
>- paste `Novatree\Rest\RestProvider::class` in `YourLaravelProject\config\app.php` file providers array.
>- now from your console type `composer dump-autoload` or
  > `composer dump-autoload -o` for autloading composer vendor and classes.
>- its all set .
>- If you faced any problem regarding this package feel free to mail me
> <i class="icon-mail"></i> tejomay@novatree.com /
><i class="icon-mail"></i> tejomaysaha@outlook.com


