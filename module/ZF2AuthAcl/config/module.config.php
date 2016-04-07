<?php
return array(
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/arvind2110-login',
                    'defaults' => array(
                        'controller' => 'ZF2AuthAcl\Controller\Index',
                        'action' => 'index'
                    )
                )
            ),
            'logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/arvind2110-logout',
                    'defaults' => array(
                        'controller' => 'ZF2AuthAcl\Controller\Index',
                        'action' => 'logout'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'ZF2AuthAcl\Controller\Index' => 'ZF2AuthAcl\Controller\IndexController'
        )
    ),
    'view_manager' => array(
        'template_map' => array(
            'zf2-auth-acl/index/index' => __DIR__ . '/../view/zf2-auth-acl/index/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);
