<?php

namespace App;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface as Container;
use Medoo\Medoo;
use Monolog\{Handler\FingersCrossedHandler, Handler\StreamHandler, Logger};
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Noodlehaus\Config;

class App extends \DI\Bridge\Slim\App
{

    /**
     * @var array|null
     */
    private $definitions;

    /**
     * App constructor.
     *
     * @param array|null $definitions
     */
    public function __construct(array $definitions = null)
    {
        $this->definitions = $definitions;
        parent::__construct();
    }

    /**
     * Configure our App dependencies
     *
     * @param \DI\ContainerBuilder $builder
     */
    protected function configureContainer(ContainerBuilder $builder): void
    {
        $dependencies = [
            /**
             * Holds your configuration settings
             */
            Config::class => function () {
                return new Config(ABSPATH.'/config/config.php');
            },

            /**
             * Views
             */
            Twig::class   => function (Container $c, Config $config) {
                $view = new Twig(ABSPATH.'/views', $config->get('twig'));

                // Instantiate and add Slim specific extension
                $router = $c->get('router');

                $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));

                $view->addExtension(new TwigExtension($router, $uri));

                return $view;
            },

            /**
             * Log management
             */
            Logger::class => function () {
                $logger         = new Logger('slim-starter');
                $filename       = ABSPATH.'/logs/error.log';
                $stream         = new StreamHandler($filename, Logger::DEBUG);
                $fingersCrossed = new FingersCrossedHandler($stream, Logger::ERROR);
                $logger->pushHandler($fingersCrossed);

                return $logger;
            },

            /**
             * Database Connection
             */
            Medoo::class  => function (Config $config) {
                return new Medoo($config->get('db'));
            },
        ];

        $builder->addDefinitions($this->definitions);
        $builder->addDefinitions($dependencies);
    }
}