<?php


namespace Codilar\Emp\Model\ResourceModel\EmpInfo;

use Codilar\Emp\Model\EmpInfo;
use Codilar\Emp\Model\ResourceModel\EmpInfo as EmpResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;



class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(EmpInfo::class, EmpResource::class);
    }
}


