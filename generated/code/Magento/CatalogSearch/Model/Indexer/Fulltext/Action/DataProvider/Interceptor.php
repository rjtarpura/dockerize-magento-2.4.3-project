<?php
namespace Magento\CatalogSearch\Model\Indexer\Fulltext\Action\DataProvider;

/**
 * Interceptor class for @see \Magento\CatalogSearch\Model\Indexer\Fulltext\Action\DataProvider
 */
class Interceptor extends \Magento\CatalogSearch\Model\Indexer\Fulltext\Action\DataProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ResourceConnection $resource, \Magento\Catalog\Model\Product\Type $catalogProductType, \Magento\Eav\Model\Config $eavConfig, \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $prodAttributeCollectionFactory, \Magento\CatalogSearch\Model\ResourceModel\EngineProvider $engineProvider, \Magento\Framework\Event\ManagerInterface $eventManager, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\EntityManager\MetadataPool $metadataPool, int $antiGapMultiplier = 5)
    {
        $this->___init();
        parent::__construct($resource, $catalogProductType, $eavConfig, $prodAttributeCollectionFactory, $engineProvider, $eventManager, $storeManager, $metadataPool, $antiGapMultiplier);
    }

    /**
     * {@inheritdoc}
     */
    public function getSearchableProducts($storeId, array $staticFields, $productIds = null, $lastProductId = 0, $batch = 100)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSearchableProducts');
        return $pluginInfo ? $this->___callPlugins('getSearchableProducts', func_get_args(), $pluginInfo) : parent::getSearchableProducts($storeId, $staticFields, $productIds, $lastProductId, $batch);
    }

    /**
     * {@inheritdoc}
     */
    public function prepareProductIndex($indexData, $productData, $storeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'prepareProductIndex');
        return $pluginInfo ? $this->___callPlugins('prepareProductIndex', func_get_args(), $pluginInfo) : parent::prepareProductIndex($indexData, $productData, $storeId);
    }
}
