<?php


namespace Codilar\Emp\Model\ResourceModel\EditHistory;

use Codilar\Emp\Model\EditHistory as EditModel;
use Codilar\Emp\Model\ResourceModel\EditHistory as EditResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(EditModel::class, EditResource::class);
    }
}
