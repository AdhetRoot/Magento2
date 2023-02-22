<?php
namespace Farmacia\Vacuna\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'tresd_helloworld_post';

	protected $_cacheTag = 'tresd_helloworld_post';

	protected $_eventPrefix = 'tresd_helloworld_post';

	protected function _construct()
	{
		$this->_init('Farmacia\Vacuna\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}