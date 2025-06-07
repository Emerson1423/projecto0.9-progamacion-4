<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Kernel as HttpKernel;


class Kernel extends HttpKernel
{
   

    protected $routeMiddleware = [

    
    'checkrole.Admin' => \App\Http\Middleware\CheckRole::class. ':Admin',
    'checkrole.Cliente' => \App\Http\Middleware\CheckRole::class. ':Cliente',


];
}