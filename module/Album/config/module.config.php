<?php
return array(
    'db' => array(
        'adapters' => array(
            'album' => array(
                'driver'         => 'Pdo',
                'username'       => 'root',
                'password'       => 'ifrc',
                'dsn'            => 'mysql:dbname=zf2tutorial;host=localhost',
                'driver_options' => array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                )
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'album' => array(
                'type' => 'segment', 'options' => array(
                    'route' => '/album[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
//    'service_manager' => array(
//        'invokables' => array(
//            'Album\Model\AlbumTable' => 'Zend\Db\Adapter\AdapterServiceFactory'
//        ),
//    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Db\Adapter\AdapterAbstractServiceFactory',
        )
    ),
);