<?php

namespace Codilar\Emp\Controller\Adminhtml\Info;

use Codilar\Emp\Api\EmpRepositoryInterface;
use Magento\Backend\Model\UrlInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;

class Delete implements ActionInterface
{
    private $resultFactory;
    private $request;
    private $url;
    private $empRepository;
    private $manager;

    /**
     * Save constructor.
     * @param ResultFactory $resultFactory
     * @param RequestInterface $request
     * @param EmpRepositoryInterface $empRepository
     * @param ManagerInterface $manager
     * @param UrlInterface $url
     */
    public function __construct(
        ResultFactory $resultFactory,
        RequestInterface $request,
        EmpRepositoryInterface $empRepository,
        ManagerInterface $manager,
        UrlInterface $url
    ) {
        $this->resultFactory = $resultFactory;
        $this->request = $request;
        $this->url = $url;
        $this->empRepository = $empRepository;
        $this->manager = $manager;
    }

    /**
     * @return ResultInterface
     */
    public function execute()
    {
        $redirectResponse = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $redirectResponse->setUrl($this->url->getUrl('employee/info/index'));
        $result = $this->empRepository->deleteById($this->request->getParam('id'));
        if ($result) {
            $this->manager->addSuccessMessage(
                __(sprintf(
                    'The Emp with id %s has been deleted Successfully',
                    $this->request->getParam('id')
                ))
            );
        } else {
            $this->manager->addErrorMessage(
                __(sprintf(
                    'The Emp with id %s has not been deleted, Due to some technical reasons',
                    $this->request->getParam('id')
                ))
            );
        }
        return $redirectResponse;
    }
}
