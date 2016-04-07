<?php
namespace FrontEnd;

use Zend\Authentication\Adapter\DbTable;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use FrontEnd\Model\MyAuthStorage;

class Module{
    public function onBootstrap(MvcEvent $e){
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $eventManager->attach('dispatch', array(
            $this,
            'setLayout'
        ), 100);
    }

    public function setLayout(MvcEvent $mvcEvent){
        //get $viewModel to setLayout
        $viewModel = $mvcEvent->getViewModel();
        //check which controller
        $routeMatch = $mvcEvent->getRouteMatch();
        $controller = $routeMatch->getParam('controller');
        if($controller === 'FrontEnd\Controller\Login'){
            $viewModel->setTemplate('frontend\login\layout');
            return;
        }

        /**
         * fallback
         * ViewModel Template Default
         */
        $viewModel->setTemplate('frontend\default-layout');
    }

    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig(){
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig(){
        return array(
            'factories' => array(
                'FrontEnd\Model\MyAuthStorage' => function($sm){
                    return new MyAuthStorage('zf_tutorial');
                },
                'AuthService' => function($sm){
                    //My assumption, you've alredy set dbAdapter
                    //and has users table with columns : user_name and pass_word
                    //that password hashed with md5
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $dbTableAuthAdapter = new DbTable($dbAdapter,
                        'users', 'user_name', 'pass_word');

                    $authService = new AuthenticationService();
                    $authService->setAdapter($dbTableAuthAdapter);
                    $authService->setStorage($sm->get('FrontEnd\Model\MyAuthStorage'));
                    return $authService;
                },
            ),
        );
    }
}