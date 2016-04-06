<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'FrontEnd\Controller\Login' => 'FrontEnd\Controller\LoginController',
            'FrontEnd\Controller\Home' => 'FrontEnd\Controller\HomeController',
            'FrontEnd\Controller\Join' => 'FrontEnd\Controller\JoinController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Home',
                        'action' => 'index',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Login',
                        'action' => 'index',
                    ),
                ),
            ),
            'join' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/join',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Join',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'frontend\default-layout' => __DIR__ . '/../view/front-end/default-layout.phtml',
            'frontend\login\layout' => __DIR__ . '/../view/front-end/login/layout.phtml',
            'frontend\component\img-page' => __DIR__.'/../view/front-end/component/img-page.phtml',
        ),
        'template_path_stack' => array(
            'frontend' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);