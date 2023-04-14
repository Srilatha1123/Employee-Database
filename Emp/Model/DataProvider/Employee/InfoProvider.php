<?php


namespace Codilar\Emp\Model\DataProvider\Employee;

use Codilar\Emp\Model\ResourceModel\EmpInfo\Collection as Collection;
use Codilar\Emp\Model\ResourceModel\EmpInfo\CollectionFactory as CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class InfoProvider extends AbstractDataProvider
{
    /**
     * @var
     */
    protected $loadedData;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var Collection
     */
    private $collectionFactory;

    /**
     * DataProvider constructor.
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
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $id = $this->request->getParam('id');
        $items = $this->collectionFactory->create()->addFieldToFilter('id', $id)->getItems();
        foreach ($items as $item) {
            $employeeData = $item->getData();
            $this->loadedData[$item->getId()] = $employeeData;
        }
        return $this->loadedData;
    }

    protected function addKeywordFilter($collection, $column)
{
    if (!isset($column['filter']['your_filter_name'])) {
        return;
    }

    $keyword = $column['filter']['your_filter_name'];
    if (!empty($keyword)) {
        $collection->addFieldToFilter('your_column_name', ['like' => '%'.$keyword.'%']);
    }
}

//  public function addFilter(\Magento\Framework\Api\Filter $filter)
// {
//     $column = $this->getStructure()->get($filter->getField());
//     if (!$column) {
//         parent::addFilter($filter);
//         return;
//     }

   
//     }


}
