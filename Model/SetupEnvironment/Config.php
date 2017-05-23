<?php
/**
 * Copyright © Colognetworx cnx GmbH
 * @author      Sven Janßen
 */
namespace Cnx\Developer\Model\SetupEnvironment;

use Magento\Framework\App\Config\Storage\WriterInterface;
/**
 * Cnx developer model for config data
 */
class Config {

    /**
     * @var \Magento\Framework\App\Config\Storage\WriterInterface
     */
    protected $_writerInterface;

    /**
    * @var  string  the default scope
    */
    protected $_scope = "default";

    /**
    * @param   Magento\Framework\App\Config\Storage\WriterInterface
    */
    public function __construct(
        WriterInterface $writerInterface
    ) {
        $this->_writerInterface = $writerInterface;
    }

    /**
    * @param    DomNodeList     DomNodeList object with parameter nodes
    * @return   array           Array with information about updated values
    */
    public function save($data) {
        $result = [];
        foreach($data as $parameter) {
            $result[] = "update " . $parameter->getAttribute('name') . " to " . $parameter->getAttribute('value');
            $this->updateDatabaseConfigValue($parameter->getAttribute('name'), $parameter->getAttribute('value'));
        }
        return $result;
    }

    /**
    * @param    string      path of the config value
    * @param    string      the new value
    * @return   void
    */
    private function updateDatabaseConfigValue($path, $value) {
        $this->_writerInterface->save($path, $value, $this->_scope);
    }
}