<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Kernel as HttpKernel;


class Kernel extends HttpKernel
{
   

    protected $routeMiddleware = [

    
    'checkrole.admin' => \App\Http\Middleware\CheckRole::class. ':admin',
    'checkrole.cliente' => \App\Http\Middleware\CheckRole::class. ':cliente',


];
}