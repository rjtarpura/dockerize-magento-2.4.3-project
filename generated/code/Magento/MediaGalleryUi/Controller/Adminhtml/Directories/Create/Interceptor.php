<?php
namespace Magento\MediaGalleryUi\Controller\Adminhtml\Directories\Create;

/**
 * Interceptor class for @see \Magento\MediaGalleryUi\Controller\Adminhtml\Directories\Create
 */
class Interceptor extends \Magento\MediaGalleryUi\Controller\Adminhtml\Directories\Create implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\MediaGalleryApi\Api\CreateDirectoriesByPathsInterface $createDirectoriesByPaths, \Psr\Log\LoggerInterface $logger)
    {
        $this->___init();
        parent::__construct($context, $createDirectoriesByPaths, $logger);
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
