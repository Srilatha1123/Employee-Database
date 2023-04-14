<?php

namespace Codilar\Emp\Model\DataProvider\EditHistory;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Codilar\Emp\Model\ResourceModel\EditHistory\CollectionFactory ;
use Magento\Framework\App\RequestInterface;

class EditHistory extends AbstractDataProvider
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * EditHistory constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param RequestInterface $request
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->request = $request;
    }

    /**
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getData()
    {
        $collection = $this->getCollection();
        if ($this->request->getParam('id')){
            $collection->addFieldToFilter('id', $this->request->getParam('id'));
            $data = $collection->toArray();
        } else {
            $data = $collection->toArray();
        }
        return $data;
    }
}
