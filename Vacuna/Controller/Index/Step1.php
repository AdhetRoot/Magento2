<?php
namespace Farmacia\Vacuna\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\View\Result\PageFactory;

class Step1 extends Action
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

    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {
            $this->_redirect('customer/account/login');
            return;
        }

        $name = "HOLA " . $this->customerSession->getCustomer()->getName();
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__($name));
        return $resultPage;
    }

 
}
