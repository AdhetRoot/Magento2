<?php
namespace Farmacia\Vacuna\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	protected $_postFactory;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Tresd\HelloWorld\Model\PostFactory $postFactory
	)
	{
		$this->_postFactory = $postFactory;
		parent::__construct($context);
	}
 
	public function sayHello()
	{
		return __('Hola mundo , Vacunas ');
	}
       
	public function getPostCollection(){
		$post = $this->_postFactory->create();
		return $post->getCollection();
	}
}