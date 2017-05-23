<?php
namespace Cnx\Developer\Controller\Adminhtml\SetupEnvironment;

class Index extends \Magento\Backend\App\Action {
    /**
    * @var \Magento\Framework\View\Result\PageFactory
    */
    protected $resultPageFactory;

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
		$this->resultPageFactory = $resultPageFactory;
    }


    public function execute() {
        //echo "SetupEnvironment Index Controller loadeds"; OK
		return  $resultPage = $this->resultPageFactory->create();
    }

}