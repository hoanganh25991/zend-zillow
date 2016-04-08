<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'FrontEnd\Controller\Login' => 'FrontEnd\Controller\LoginController',
            'FrontEnd\Controller\Home' => 'FrontEnd\Controller\HomeController',
            'FrontEnd\Controller\Join' => 'FrontEnd\Controller\JoinController',
            'FrontEnd\Controller\Auth' => 'FrontEnd\Controller\AuthController',
            'FrontEnd\Controller\Success' => 'FrontEnd\Controller\SuccessController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'abc' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/home',
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
            'sample-login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/sample-login',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Auth',
                        'action' => 'login',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'process' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                ),
            ),

            'sample-success' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/sample-success',
                    'defaults' => array(
                        'controller' => 'FrontEnd\Controller\Success',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'frontend\default-layout' => __DIR__ .
                '/../view/front-end/default-layout.phtml',
            'frontend\login\layout' => __DIR__ .
                '/../view/front-end/login/layout.phtml',
            'frontend\component\img-page' => __DIR__ .
                '/../view/front-end/component/img-page.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'frontend' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);