<?php

// Access $app using $this when in folder(group)
$this->get(
    '/movies[/{id}]',
    [
        '\App\Controllers\MovieController',
        'getMovies',
    ]
);