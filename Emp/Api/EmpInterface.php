<?php

namespace Codilar\Emp\Api;

interface EmpInterface
{
    /**
     * @return string
     */
    public function getPost();

     /**
     * @return string
     */
    public function getData();
     /**
     * @param int $id
     * @return string
     */
    public function getById($id);

        /**
     * @param int $id
     * @return bool true on success
     */
    public function getDelete($id);


}
