<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Sales
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Sales_Model_Entity_Setup $installer */
$installer = $this;

$orderHistoryTable = $installer->getTable('sales_flat_order_status_history');
$installer->getConnection()->addColumn(
    $orderHistoryTable,
    'is_visible_on_front',
    "tinyint(1) UNSIGNED NOT NULL default '0' after `is_customer_notified`"
);
$installer->run("UPDATE {$orderHistoryTable} SET
    is_visible_on_front = (is_customer_notified = 1 AND comment IS NOT NULL AND comment <> '');");
