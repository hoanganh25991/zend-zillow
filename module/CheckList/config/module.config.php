<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'db' => array(
        'adapters' => array(
            'Checklist' => array(
                'driver'         => 'Pdo',
                'username'       => 'root',
                'password'       => 'ifrc',
                'dsn'            => 'mysql:dbname=zend_skeleton_tasklist;host=localhost',
                'driver_options' => array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                )
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'CheckList\Controller\Task' => 'CheckList\Controller\TaskController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'task' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/task[/:action[/:id]]',
                    'defaults' => array(
                        'controller' => 'Task',
                        'action' => 'index',
                    ),
                    'constraints' => array(
                        'action' => '(add|edit|delete|json)',
                        'id' => '[0-9]+',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'avatar' => __DIR__.'/../view/check-list/avatar.phtml',
            'layout/checklist' => __DIR__.'/../view/check-list/layout.phtml',
            'layout/checklist/add' => __DIR__.'/../view/check-list/addLayout.phtml'

        ),
        'template_path_stack' => array(
            'check-list' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);