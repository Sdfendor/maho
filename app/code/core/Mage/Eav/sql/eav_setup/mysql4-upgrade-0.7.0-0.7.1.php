<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Eav
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Eav_Model_Entity_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->dropColumn($this->getTable('eav_attribute'), 'attribute_name');
$installer->getConnection()->dropColumn($this->getTable('eav_attribute'), 'apply_to');
$installer->run("
    ALTER TABLE {$this->getTable('eav_attribute')} ADD COLUMN `is_configurable` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1;
");

$installer->endSetup();
