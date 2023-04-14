<?php

namespace Codilar\Emp\Controller\Adminhtml\Info;

use Codilar\Emp\Api\EmpRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\ResourceConnection;
use Codilar\Emp\Model\EditHistoryFactory as ModelFactory;
use Codilar\Emp\Model\ResourceModel\EditHistory as ResourceModel;
use Codilar\Emp\Model\ResourceModel\empInfo\Collection;
use Codilar\Emp\Api\EditRepositoryInterface;

class Save extends Action
{
    protected $dataPersistor;
    private $dataProvider;
    private $empRepository;
    private $collection;
    protected $connection;

    protected $editModelFactory;

    protected $editResourceModel;

    protected $editRepository;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        EmpRepositoryInterface $empRepository,
        Collection $collection,
        ResourceConnection $connection,
        ModelFactory $editModelFactory,
        ResourceModel $editResourceModel,
        EditRepositoryInterface $editRepository
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
        $this->empRepository = $empRepository;
        $this->collection=$collection;
        $this->connection = $connection;
        $this->editModelFactory = $editModelFactory;
        $this->editResourceModel = $editResourceModel;
        $this->editRepository = $editRepository;
    }
    /**
     * @return ResponseInterface|ResultInterface
     * @throws LocalizedException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $name = $this->getRequest()->getParam('name');
        $dob =  $this->getRequest()->getParam('dob');
        $phone = $this->getRequest()->getParam('phone');
        $email = $this->getRequest()->getParam('email');
        $address = $this->getRequest()->getParam('address');
        $website = $this->getRequest()->getParam('website');
        $storeview = $this->getRequest()->getParam('storeview');
        if (isset($id))
        {
        $conn = $this->connection->getConnection();
        $table = $this->connection->getTableName('edit_history_emp');
        $sql = "INSERT INTO " . $table . "(id, name,dob,phone,email,address,website,storeview)
        Values('" .$id. "', '".$name."', '" .$dob. "','" .$phone. "','" .$email. "','" .$address. "','" .$website."','".$storeview."')";
        $conn->query($sql);


            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);



            $employee = $this->empRepository->load($id);
            $employee->setName($name);
            $employee->setDob($dob);
            $employee->setPhone($phone);
            $employee->setEmail($email);
            $employee->setAddress($address);
            $employee->setWebsite($website);
            $employee->setStoreview($storeview);
            $this->empRepository->save($employee);
            $this->messageManager->addSuccessMessage('User  successfully Updated Exist Data');
            $resultRedirect->setUrl($this->getUrl('employee/info/index'));
            return $resultRedirect;
        }
        else{
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $employee = $this->empRepository->create();
            $employee->setName($name);
            $employee->setDob($dob);
            $employee->setPhone($phone);
            $employee->setEmail($email);
            $employee->setAddress($address);
            $employee->setWebsite($website);
            $employee->setStoreview($storeview);
            $this->empRepository->save($employee);
            $this->messageManager->addSuccessMessage('User  successfully Save New Data');
            $resultRedirect->setUrl($this->getUrl('employee/info/index'));
            return $resultRedirect;
            
        }
    }
    
//     public function saveAction()
// {
//     $requestParams = $this->getRequest()->getParams();
//     $fieldValue = $requestParams['my_field_name'];

//     // Update the database with the new value
//     // ...

//     // Return the updated value
//     $result = ['success' => true, 'my_field_name' => $fieldValue];
//     return $this->getResponse()->representJson(\Zend_Json::encode($result));
// }

}
