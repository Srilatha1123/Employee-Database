<?php

namespace Codilar\Emp\Controller\Adminhtml\Info;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;


class Edit extends Action
{
    const ADMIN_RESOURCE = "Codilar_Emp::employee_list";

    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     */
    public function execute()
    {
//        get the id from - Url

//        $rowId = (int)$this->getRequest()->getParam('id');
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Employee'));
        return $resultPage;
    }
}
