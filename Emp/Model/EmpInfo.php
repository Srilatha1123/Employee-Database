<?php


namespace Codilar\Emp\Model;

use Magento\Framework\Model\AbstractModel;
use Codilar\Emp\Model\ResourceModel\EmpInfo as ResourceModel;

class EmpInfo extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
