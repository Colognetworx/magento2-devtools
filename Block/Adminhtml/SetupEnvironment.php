<?php
	namespace Cnx\Developer\Block\Adminhtml;
	
	use Magento\Backend\Block\Template;
	use Magento\Framework\App\Config\ScopeConfigInterface;

	class SetupEnvironment extends \Magento\Framework\View\Element\Template {

		/**
		* @var Magento\Framework\App\Config\ScopeConfigInterface
		*/
		protected $_scopeConfig;

		/**
		* @var string default scopr for db entries
		*/
		protected $_scope = "default";
		/**
		* Constructor
		*
		* @param \Magento\Backend\App\Action\Context $context
		* @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
		* @param array $data
		*/

		public function __construct(
			Template\Context $context,
			ScopeConfigInterface $scopeConfig,
			array $data = []
		) {
			parent::__construct($context, $data);
			$this->_scopeConfig = $scopeConfig;
		}
		
		/**
		* @return array 	List of all setting path and content information
		*/
		public function getConfigItems() {
			$result = [];
			/**
			* @ToDo 	Load the configfile for getting the informations
			* 			which parameters are defined
			*/
			$parameters = [
				"web/unsecure/base_url",
				"web/secure/base_url",
				"system/smtp/host"
			];
			for ( $i=0; $i<count($parameters); $i++ ) {
				$result[$parameters[$i]] = $this->getConfigValues($parameters[$i]);
			}
			return $result;
		}

		private function getConfigValues($path) {
			return $this->_scopeConfig->getValue($path, $this->_scope);
		}
	}
?>