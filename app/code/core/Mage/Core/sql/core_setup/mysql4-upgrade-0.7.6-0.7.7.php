<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Core
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer  = $this;
$installer->startSetup();

$installer->run("
UPDATE `{$this->getTable('core_store')}` SET `code` = 'admin', `name` = 'Admin' WHERE `code` LIKE 'default';
UPDATE `{$this->getTable('core_store')}` SET `code` = 'default', `name` = 'Default Store View' WHERE `code` LIKE 'base';
    ");

$installer->endSetup();
