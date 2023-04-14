<?php


namespace Codilar\Emp\Model;

use Magento\Framework\Model\AbstractModel;
use Codilar\Emp\Model\ResourceModel\EditHistory as ResourceModel;

class EditHistory extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
