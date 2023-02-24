<?php
namespace Farmacia\Vacuna\Block;
class Header extends \Magento\Framework\View\Element\Template
{
	protected $_postFactory;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context
	)
	{
		parent::__construct($context);
	}
 
	public function sayHello()
{
    $name = "HOLA ";

 

    return $name;
}

	
       

}