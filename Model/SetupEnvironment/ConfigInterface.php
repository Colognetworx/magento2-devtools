<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Cnx\Developer\Model\SetupEnvironment;
use Magento\Framework\Exception\InvalidEmailOrPasswordException;
use Magento\Framework\Exception\State\UserLockedException;
interface ConfigInterface {
    /**
     * Loop throu $data object and save data to core_config_data table
     *
     * @param   DOMNodeList object $data
     * @return  array $result
     */
    public function save($data);
}