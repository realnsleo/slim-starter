<?php

/**
 * Returns the index page
 */
$app->get(
    '/[{name}]',
    [
        '\App\Controllers\IndexController',
        'index',
    ]
)->setName('index');