<?php
//home page
$router->controller('/',\App\Controllers\FrontEnd\HomeController::class);
//For users page
$router->controller('/',\App\Controllers\FrontEnd\UserController::class);
//product page
$router->controller('/',\App\Controllers\FrontEnd\ProductController::class);
//cart page
$router->controller('/',\App\Controllers\FrontEnd\CartController::class);


