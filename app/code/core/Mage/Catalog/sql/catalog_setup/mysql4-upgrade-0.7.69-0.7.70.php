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
$installer->startSetup();

$installer->getConnection()->addColumn(
    $installer->getTable('catalog/compare_item'),
    'store_id',
    'smallint unsigned default null'
);
$installer->getConnection()->addConstraint(
    'FK_CATALOG_COMPARE_ITEM_STORE',
    $installer->getTable('catalog/compare_item'),
    'store_id',
    $installer->getTable('core/store'),
    'store_id',
    'set null',
    'cascade'
);

$installer->endSetup();
