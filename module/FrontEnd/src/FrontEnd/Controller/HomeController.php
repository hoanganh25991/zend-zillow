<?php
namespace FrontEnd\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HomeController extends AbstractActionController{
    public function indexAction(){
        $variablesContainer = array();
        //        $variablesContainer['imgURL'] = 'home.png';
        $viewModel = new ViewModel($variablesContainer);

        //add component img-page.phtml into $viewModel
        $imgPage = new ViewModel(array('imgURL' => 'home.png'));
        $imgPage->setTemplate('frontend\component\img-page');

        $viewModel->addChild($imgPage, 'imgPage');
        return $viewModel;
    }
}