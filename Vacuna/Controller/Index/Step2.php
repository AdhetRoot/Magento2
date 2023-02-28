<?php
namespace Farmacia\Vacuna\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\View\Result\PageFactory;

class Step2 extends Action
{
    protected $pageFactory;
    protected $customerSession;
    protected $sessionManager;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Session $customerSession,
        SessionManagerInterface $sessionManager
    ) {
        $this->pageFactory = $pageFactory;
        $this->customerSession = $customerSession;
        $this->sessionManager = $sessionManager;
        parent::__construct($context);
    }

    public function execute(){
        if (!$this->customerSession->isLoggedIn()) {
            $this->messageManager->addErrorMessage(__('You must be logged in to access this page.'));
            $this->_redirect('customer/account/login');
            return;
        }
        try {
            $data = $this->getRequest()->getPost();
        
            // Verify that form field names match with the names in the controller
            if (!empty($data['direccion']) && !empty($data['consultorio']) && !empty($data['dia']) && !empty($data['hora']) && !empty($data['email'])) {
                $this->customerSession->setData('vacuna_form_data', $data);
                $resultPage = $this->pageFactory->create();
                $resultPage->getConfig()->getTitle()->prepend(__('Vacuna Step 2'));
                return $resultPage;
            } else {
                // If the field names don't match, throw an exception with an error message
                throw new \Exception('Revisa los datos de tu formulario');
            }
        } catch (\Exception $e) {
            // Catch the exception and display the error message to the user
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->_redirect('vacuna/index/step1');
            return;
        }
        
   
          //  $data = $this->getRequest()->getPost();
             //var_dump($data);die("datatatta");
            // Verify that form field names match with the names in the controller
            //if (!empty($data['direccion']) && !empty($data['consultorio']) && !empty($data['dia']) && !empty($data['hora']) && !empty($data['email'])) {
              //  $this->customerSession->setData('vacuna_form_data', $data);
               // var_dump($this->customerSession->getData('vacuna_form_data'));die("entro a if"); 
                //$this->_redirect('vacuna/index/step2');
                //$resultPage = $this->pageFactory->create();
                //$resultPage->getConfig()->getTitle()->prepend(__('Vacuna Step 2'));
                // return $resultPage;

            //} else {
                // If the field names don't match, display an error message or redirect back to the form page
               // $this->messageManager->addErrorMessage(__('Revisa los datos de tu formulario'));
                //$this->_redirect('vacuna/index/step1');
                //return;
           // }

        
    



}


    public function postAction()
    {
        // Handle form submission
    }
}
