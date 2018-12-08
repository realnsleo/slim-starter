<?php

/**
 * I find it easier defining the base path early
 * so that I can reference it anywhere else
 */
define('ABSPATH', __DIR__.'/..');

require_once ABSPATH.'/vendor/autoload.php';

session_start();

/**
 * Load .env if we are developing locally
 * otherwise find a way of importing the env variables into your production environment another way
 */
if (getenv('ENVIRONMENT') === 'development') {
    $dotenv = new Dotenv\Dotenv(ABSPATH);

    $dotenv->load();
}

$app = new \App\App(
    [
        'settings.httpVersion'                       => '1.1',
        'settings.responseChunkSize'                 => 4096,
        'settings.outputBuffering'                   => 'append',
        'settings.determineRouteBeforeAppMiddleware' => true,
        'settings.displayErrorDetails'               => getenv('ENVIRONMENT') === 'development',
    ]
);

/**
 * CORS
 */
$app->add('\App\Middleware\CorsMiddleware');

/**
 * Bootstraps all routes
 */
$routesDir = ABSPATH.'/routes/';

if ($handle = opendir($routesDir)) {
    /**
     * This snippet scans the routes directory to include all routes and
     * if a directory is encountered, it creates a group with the name of the directory
     * and other files are included directly as routes
     */
    while (false !== ($entry = readdir($handle))) {
        // Omit . and .. from the list of files
        if ($entry != "." && $entry != "..") {
            // PHP file found
            if ( ! is_dir($routesDir.$entry)) {
                require_once($routesDir.$entry);
            } else {
                // Directory found
                $app->group(
                    '/'.$entry,
                    function () use ($entry, $routesDir) {
                        foreach (glob($routesDir.$entry.'/*.php') as $path) {
                            require_once($path);
                        }
                    }
                );
            }
        }
    }
    closedir($handle);
}

// Return the Slim App
return $app;