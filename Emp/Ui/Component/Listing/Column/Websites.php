<?php

namespace Codilar\Emp\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\Cms\Block\Adminhtml\Page\Grid\Renderer\Action\UrlBuilder;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Store\Model\StoreManagerInterface;

class Websites extends Column
{

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;
    /**
     * @var PriceCurrencyInterface
     */
    protected $priceFormatter;
    /**
     * @var actionUrlBuilder
     */
    protected $actionUrlBuilder;
    /**
     * @var $_storeManager
     */
    protected $_storeManager;


    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        UrlBuilder $actionUrlBuilder,
        PriceCurrencyInterface $priceFormatter,
        StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->actionUrlBuilder = $actionUrlBuilder;
        $this->priceFormatter = $priceFormatter;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $Websites = $this->_storeManager->getWebsites();
                $WebsiteName="-";
                foreach ($Websites as $website) {
                    if($website->getId()==$item['website']){
                        $WebsiteName = $website->getName();
                    }
                }
                $item[$this->getData('name')] = $WebsiteName;
            }
        }
        return $dataSource;
    }
}