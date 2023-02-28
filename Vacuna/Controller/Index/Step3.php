<?php
namespace Farmacia\Vacuna\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\View\Result\PageFactory;

class Step3 extends Action
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
        $this->view = $context->getView();

        parent::__construct($context);
    }

    public function execute(){
        if (!$this->customerSession->isLoggedIn()) {
            $this->messageManager->addErrorMessage(__('You must be logged in to access this page.'));
            $this->_redirect('customer/account/login');
            return;
        }

   
            $data = $this->getRequest()->getPost();
            //var_dump($data);die("datatatta");
            // Verify that form field names match with the names in the controller
            if (!empty($data['curp']) && !empty($data['nombres']) && !empty($data['apellido_paterno']) && !empty($data['apellido_materno']) && !empty($data['fecha_nacimiento']) && !empty($data['telefono']) && !empty($data['genero']) && !empty($data['ubicacion']) && !empty($data['codigo_postal']) && !empty($data['numero_exterior']) && !empty($data['colonia']) && !empty($data['estado']) && !empty($data['municipio']) && !empty($data['numero_interior']) && !empty($data['calle'])) {
                
                
               $this->customerSession->setData('vacuna_form_data_2', $data);
              //var_dump($this->customerSession->getData('vacuna_form_data'));
               //var_dump($this->customerSession->getData('vacuna_form_data_2'));
               //var_dump("entro a if"); 
               $formData = $this->customerSession->getData('vacuna_form_data');
               $formData2 = $this->customerSession->getData('vacuna_form_data_2');
               //var_dump($formData);
               //var_dump("nada");
               //var_dump($formData2);
               //die("fin del resr");
                     
         if (!empty($formData) && !empty($formData2)) {
                // Los datos están disponibles en la sesión, úsalos en la vista
                $direccion = $formData['direccion'];
                $consultorio = $formData['consultorio'];
                $dia = $formData['dia'];
                $hora = $formData['hora'];
                $email = $formData['email'];
                $numero_exterior = $formData2['numero-exterior'];
                $colonia = $formData2['colonia'];
                $estado = $formData2['estado'];
                $municipio = $formData2['municipio'];
                $numero_interior = $formData2['numero-interior'];
                $calle = $formData2['calle'];
                
                $resultPage = $this->pageFactory->create();
                $resultPage->getConfig()->getTitle()->prepend(__('Vacuna Step 3'));
                return $resultPage;
            } else {
                // Si los datos no están en la sesión, redirecciona a la página anterior
                $this->messageManager->addErrorMessage(__('Los datos del formulario no están disponibles'));
                $this->_redirect('vacuna/index/step2');
                return;
            }
            
               
    

        

            } else {
                // If the field names don't match, display an error message or redirect back to the form page
                $this->messageManager->addErrorMessage(__('Revisa los datos de tu formulario'));
                $this->_redirect('vacuna/index/step2');
                return;
            }



}


    public function postAction()
    {
        // Handle form submission
    }
}
