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

/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;

$tableOrder         = $this->getTable('sales_order');
$tableOrderItem     = $this->getTable('sales_flat_order_item');

$select = $installer->getConnection()->select()
    ->from($tableOrderItem, [
        'total_qty_ordered'   => 'SUM(qty_ordered)',
        'entity_id'           => 'order_id'])
    ->group(['order_id']);

$installer->run('CREATE TEMPORARY TABLE `tmp_order_items` ' . $select->assemble());

$select->reset()
    ->join('tmp_order_items', 'tmp_order_items.entity_id = order.entity_id', ['total_qty_ordered', 'entity_id']);
$sqlQuery = $select->crossUpdateFromSelect(['order' => $tableOrder]);
$installer->getConnection()->query($sqlQuery);

$installer->run('DROP TEMPORARY TABLE `tmp_order_items`');
