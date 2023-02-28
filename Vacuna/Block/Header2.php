<?php
namespace Farmacia\Vacuna\Block;

use Magento\Customer\Model\Session;

class Header2 extends \Magento\Framework\View\Element\Template
{
	protected $_postFactory;
	protected $_customerSession;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		Session $customerSession
	)
	{
		parent::__construct($context);
		$this->_customerSession = $customerSession;
	}

	public function sayHello()
	{
       
	
			$header = "HEADER";
	
		return $header;
	
}

}
