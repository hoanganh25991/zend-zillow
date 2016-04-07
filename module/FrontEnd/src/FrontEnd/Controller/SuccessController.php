<?php

namespace FrontEnd\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SuccessController extends AbstractActionController{
    public function indexAction(){
        if(!$this->getServiceLocator()->get('AuthService')->hasIdentity()){
            return $this->redirect()->toRoute('sample-login');
        }
        return new ViewModel();
    }
}