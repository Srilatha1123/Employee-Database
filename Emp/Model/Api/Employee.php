<?php

namespace Codilar\Emp\Model\Api;

use Psr\Log\LoggerInterface;
use Codilar\Emp\Api\EmpInterface;
use Codilar\Emp\Model\ResourceModel\EmpInfo\Collection;
use Codilar\Emp\Model\ResourceModel\EmpInfo\CollectionFactory as CollectionFactory;
class Employee
{
 protected $logger;
 private $collectionFactory;

 public function __construct(
 LoggerInterface $logger,
 Collection $collection,
 CollectionFactory $collectionFactory
 )
{
 $this->logger = $logger;
 $this->collection = $collection;
 $this->collectionFactory = $collectionFactory;
}
    /**
     * @return string
     */
public function getPost()
{
 return "Hello";
 
}
 /** * @return string */
 
 
 public function getData()
 {
    // return "Hell";
    // die;
     try {
         $items = $data = $this->collection->getData();
         return $items;
     } catch (\Exception $e) {
         return ['success' => false, 'message' => $e->getMessage()];
     }
 }
 /** * @param int $id * @return string */
 public function getById($id)
 {
    // return "hello";
    // die;
     try {
      
         if ($id) {

             $data = $this->collection->addFieldToFilter('id',(int)$id)->getData();
                return $data;
         }
     } catch (\Exception $e) {
         return ['success' => false, 'message' => $e->getMessage()];
     }
 }

  /** * @param int $id * @return bool true on success */
  public function getDelete($id)
  {
      try {
          if ($id) {
              $data = $this->collectionFactory->addFieldToFilter('id',(int)$id)->getData();
              $data->delete();
              return "success";
          } 
      } catch (\Exception $e) {
          $response = ['success' => false, 'message' => $e->getMessage()];
      }
      return "false";
  }
  
}
