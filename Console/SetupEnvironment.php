<?php
/**
 * Copyright © Colognetworx cnx GmbH
 * @author      Sven Janßen
 */
namespace Cnx\Developer\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\DomDocument\DomDocumentFactory;
use Cnx\Developer\Model\SetupEnvironment\Config;

/**
 * Cnx developer console command setup:environment
 */
class SetupEnvironment extends Command {

    /**
     * @var \Magento\Framework\DomDocument\DomDocumentFactory
     */
    protected $_domDocument;

    /**
     * @var \Cnx\Developer\Model\SetupEnvironment\ConfigInterface
     */
    protected $_config;

    const DEFAULT_FILE_NAME = 'local.xml';
    const DEFAULT_FOLDER = '/app/etc/';
    /**
    * @param   Magento\Framework\App\Config\Storage\WriterInterface
    * @param   Magento\Framework\DomDocument\DomDocumentFactory
    */
    public function __construct(
        DomDocumentFactory $domDocument,
        Config $config
    ) {
        parent::__construct();
        $this->_domDocument = $domDocument->create();
        $this->_config = $config;
    }

    /**
     * Add console command to the magento2 system
     * enable parameter file | f
     * @return void
     */
    protected function configure() {
        $this->setName('setup:environment');
        $this->setDescription('Update Database for local use (baseurl, mailhog)');
        $this->addOption('file', 'f', InputOption::VALUE_OPTIONAL, '', '');
    }

    /**
     * execute command line call
     * @example     php bin/magento setup:local -f "custom_config_filename.xml"
     *
     * @param       Symfony\Component\Console\Input\InputInterface
     * @param       Symfony\Component\Console\Output\OutputInterface
     * @return      void
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $configFile = $this->getConfigFilePath($input->getOption("file"));
        if ( file_exists($configFile) ) {
            $this->_domDocument->load($configFile);
            
            $result = $this->_config->save($this->_domDocument->getElementsByTagName('parameter'));
            $output->writeln(implode("\n", $result));
            $output->writeln("Update ready");
        } else {
            $output->writeln("Error: File $configFile not found");
        }
    }

    /**
    * @param    string  filename
    * @return   string  full file url to the config xml file
    */
    private function getConfigFilePath(string $file) {
        if ( empty($file) ) {
           $file = SetupEnvironment::DEFAULT_FILE_NAME;
        }
        return getcwd(). SetupEnvironment::DEFAULT_FOLDER . $file;
    }
}