<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_CatalogInventory
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer  = $this;

$connection = $installer->getConnection();
/** @var Varien_Db_Adapter_Pdo_Mysql $connection */

$tableCataloginventoryStockItem = $installer->getTable('cataloginventory/stock_item');
$connection->addColumn($tableCataloginventoryStockItem, 'use_config_enable_qty_increments', "tinyint(1) unsigned NOT NULL default '1'");
$connection->addColumn($tableCataloginventoryStockItem, 'enable_qty_increments', "tinyint(1) unsigned NOT NULL default '0'");
