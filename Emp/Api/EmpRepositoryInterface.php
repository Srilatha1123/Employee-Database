<?php

namespace Codilar\Emp\Api;

use Codilar\Emp\Model\EmpInfo as Model;
use Codilar\Emp\Model\ResourceModel\EmpInfo\Collection;

interface EmpRepositoryInterface
{
    /**
     * @param $id
     * @return Model
     */
    public function getDataBYId($id);

    /**
     * @param Model $model
     * @return Model
     */
    public function save(Model $model);



    /**
     * @param Model $model
     * @return Model
     */
    public function delete(Model $model);


    /**
     * @return Model $model
     */
    public function create();

    /**
     * @param int $id
     * @return Model
     */
    public function deleteById($id);

    /**
     * @return Collection
     */
    public function getCollection();

    /**
     * @return boolean
     */
    public function deleteByField($value, $field = null);

}
