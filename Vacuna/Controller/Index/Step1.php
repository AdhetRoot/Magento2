<?php
namespace Farmacia\Vacuna\Controller\Index;
use Magento\Customer\Model\Session;
class Step1 extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_customerSession;
	public function __construct(
		\Magento\Framework\App\Action\Context $context, Session $customerSession,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_customerSession = $customerSession;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		if (!$this->_customerSession->isLoggedIn()) {
			$this->_redirect('customer/account/login');
			return;
		}
		$resultPage = $this->$pageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('Step 1'));
		return $resultPage;
	}
}