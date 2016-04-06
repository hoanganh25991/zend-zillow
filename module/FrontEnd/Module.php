<?php
namespace FrontEnd;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

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
}