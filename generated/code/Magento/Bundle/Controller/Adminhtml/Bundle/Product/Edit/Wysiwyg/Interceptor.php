<?php
namespace Magento\Bundle\Controller\Adminhtml\Bundle\Product\Edit\Wysiwyg;

/**
 * Interceptor class for @see \Magento\Bundle\Controller\Adminhtml\Bundle\Product\Edit\Wysiwyg
 */
class Interceptor extends \Magento\Bundle\Controller\Adminhtml\Bundle\Product\Edit\Wysiwyg implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Catalog\Controller\Adminhtml\Product\Builder $productBuilder, \Magento\Framework\Controller\Result\RawFactory $resultRawFactory, \Magento\Framework\View\LayoutFactory $layoutFactory, ?\Magento\Store\Model\StoreManagerInterface $storeManager = null)
    {
        $this->___init();
        parent::__construct($context, $productBuilder, $resultRawFactory, $layoutFactory, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
