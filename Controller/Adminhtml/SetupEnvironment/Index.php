<?php
/**
 * Copyright © Colognetworx cnx GmbH
 * @author      Morshiba
 */
namespace Cnx\Developer\Controller\Adminhtml\SetupEnvironment;

class Index extends \Magento\Backend\App\Action {
    /**
    * @var \Magento\Framework\View\Result\PageFactory
    */
    protected $_resultPageFactory;

    /**
    * Constructor
    *
    * @param \Magento\Backend\App\Action\Context $context
    * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
    */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory){
		parent::__construct($context);
		$this->_resultPageFactory = $resultPageFactory;
    }

    public function execute() {
		return  $resultPage = $this->_resultPageFactory->create();
    }

}