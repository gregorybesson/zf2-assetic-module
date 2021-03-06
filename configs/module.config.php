<?php
use Zend\Mvc\Application;

return array(
    'controllers' => array(
        'invokables' => array(
            'AsseticBundle\Controller\Console' => 'AsseticBundle\Controller\ConsoleController',
        ),
        'initializers' => array(
            'AsseticBundleInitializer' => 'AsseticBundle\Initializer\AsseticBundleInitializer',
        ),
    ),

    'service_manager'       => array(
        'aliases'   => array(
            'AsseticConfiguration' => 'AsseticBundle\Configuration',
            'AsseticCacheBuster'   => 'AsseticBundle\CacheBuster',
            'AsseticService'       => 'AsseticBundle\Service',
        ),
        'factories' => array(
            'AsseticBundle\Service'       => 'AsseticBundle\ServiceFactory',
            'Assetic\AssetWriter'         => 'AsseticBundle\WriterFactory',
        ),
        'invokables' => array(
            'Assetic\AssetManager'      => 'Assetic\AssetManager',
            'Assetic\FilterManager'     => 'Assetic\FilterManager',
            'AsseticBundle\CacheBuster' => 'AsseticBundle\CacheBuster\LastModifiedStrategy',
            'AsseticBundle\Listener'    => 'AsseticBundle\Listener',
        ),
        'initializers' => array(
            'AsseticBundleInitializer' => 'AsseticBundle\Initializer\AsseticBundleInitializer',
        ),
    ),

    'assetic_configuration' => array(
        'debug'              => false,
        /**
         * Set to true if you're working in a development environment and you want for
         * every assets to be moved to public directory after some changes.
         * Set to false on production environment - to boost your application.
         * Default true - for backward compatibility.
         */
        'buildOnRequest'     => true,
        // Relative to application root dir.
        // Path where generated assets will be moved.
        'webPath'            => 'public/assets',
        // The base URL. When null then will be auto detected by ZF2.
        'baseUrl'            => null,
        // The base path.
        // Related path to the base URL.
        // Indicate where asset are and from where will
        'basePath'           => 'assets',
        'rendererToStrategy' => array(
            'Zend\View\Renderer\PhpRenderer'  => 'AsseticBundle\View\ViewHelperStrategy',
            'Zend\View\Renderer\FeedRenderer' => 'AsseticBundle\View\NoneStrategy',
            'Zend\View\Renderer\JsonRenderer' => 'AsseticBundle\View\NoneStrategy',
        ),
        'acceptableErrors' => array(
            Application::ERROR_CONTROLLER_NOT_FOUND,
            Application::ERROR_CONTROLLER_INVALID,
            Application::ERROR_ROUTER_NO_MATCH
        ),
        'routes'             => array(),
        'modules'            => array(),
    ),
);
