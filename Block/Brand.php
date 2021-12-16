<?php
/**
 *
 * @package     magento2
 * @author      Codilar Technologies
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License v. 3.0 (OSL-3.0)
 * @link        https://www.codilar.com/
 */

namespace Codilar\Brand\Block;

use Magento\Framework\View\Element\Template;

class Brand extends Template
{
        protected $_productCollectionFactory;

        public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
            \Magento\Framework\ObjectManagerInterface $objectmanager,

            array $data = []
        )
        {
            $this->_productCollectionFactory = $productCollectionFactory;
            $this->_objectManager = $objectmanager;
            parent::__construct($context, $data);
   }

   public function getText() {
          $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
           $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
           $storeId = $storeManager->getStore()->getStoreId();
           $collection = $this->_productCollectionFactory->create();
            $collection->addAttributeToSelect('*');
            $collection->addStoreFilter($storeId);
           return $collection;

   }
}
