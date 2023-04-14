<?php


namespace Codilar\Emp\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class EditHistory extends AbstractDb
{
    const MAIN_TABLE = 'edit_history_emp';
    const ID_FIELD_NAME = 'edit_id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
