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
$installer  = $this;
$installer->startSetup();

$installer->run("
ALTER TABLE {$installer->getTable('eav_attribute_group')}
    CHANGE `attribute_group_name` `attribute_group_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL default '';
");

$installer->endSetup();
