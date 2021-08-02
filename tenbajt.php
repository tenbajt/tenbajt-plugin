<?php

/**
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

$tenbajtClassLoader = require __DIR__.'/vendor/autoload.php';

/**
|--------------------------------------------------------------------------
| Register The Auto Loader path for our namespace
|--------------------------------------------------------------------------
|
| Registers a PSR-4 directory for a given namespace, appending to the ones
| previously set for this namespace.
|
*/

$tenbajtClassLoader->addPsr4('Tenbajt\\', realpath(__DIR__.'/app/'));

/**
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$tenbajt = require_once __DIR__.'/bootstrap/app.php';



