<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_SalesRule
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;

$installer->getConnection()->addColumn(
    $installer->getTable('salesrule/coupon_aggregated'),
    'subtotal_amount_actual',
    "decimal(12,4) NOT NULL default '0.0000'"
);

$installer->getConnection()->addColumn(
    $installer->getTable('salesrule/coupon_aggregated'),
    'discount_amount_actual',
    "decimal(12,4) NOT NULL default '0.0000'"
);

$installer->getConnection()->addColumn(
    $installer->getTable('salesrule/coupon_aggregated'),
    'total_amount_actual',
    "decimal(12,4) NOT NULL default '0.0000'"
);
