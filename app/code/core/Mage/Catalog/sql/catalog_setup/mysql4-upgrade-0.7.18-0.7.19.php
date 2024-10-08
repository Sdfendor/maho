<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Catalog_Model_Resource_Setup  $installer */
$installer = $this;

$entityTypeId = (int) $installer->getEntityTypeId('catalog_product');
$installer->run("
    UPDATE `{$installer->getTable('eav_attribute')}`
        SET `apply_to` = IF(`use_in_super_product`, 'simple,grouped,configurable', 'simple')
        WHERE `entity_type_id` = $entityTypeId;
");
$installer->getConnection()->dropColumn($installer->getTable('eav_attribute'), 'use_in_super_product');
