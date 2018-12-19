<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'cart',
        'users/getid',
        '/shopping_lists/many',
        '/shopping_lists/one',
        '/orders/create',
        'orders',
        '/order_lists/create',
        '/contact_infos',
        'admin/goods/create',

    ];
}
