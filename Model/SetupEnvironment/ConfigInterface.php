<?php
/**
 * Copyright © Colognetworx cnx GmbH
 * @author      Morshiba
 */
namespace Cnx\Developer\Model\SetupEnvironment;

interface ConfigInterface {
    /**
     * Loop throu $data object and save data to core_config_data table
     *
     * @param   DOMNodeList object $data
     * @return  array $result
     */
    public function save($data);
}