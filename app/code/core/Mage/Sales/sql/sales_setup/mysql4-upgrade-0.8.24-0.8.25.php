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

$installer->getConnection()->addColumn($this->getTable('sales_quote_address'), 'shipping_tax_amount', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_quote_address'), 'base_shipping_tax_amount', 'decimal(12,4) NULL');

$installer->getConnection()->addColumn($this->getTable('sales_order'), 'shipping_tax_amount', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_order'), 'base_shipping_tax_amount', 'decimal(12,4) NULL');

$installer->addAttribute('quote_address', 'shipping_tax_amount', ['type' => 'static']);
$installer->addAttribute('quote_address', 'base_shipping_tax_amount', ['type' => 'static']);

$installer->addAttribute('order', 'shipping_tax_amount', ['type' => 'static']);
$installer->addAttribute('order', 'base_shipping_tax_amount', ['type' => 'static']);

$installer->addAttribute('invoice', 'shipping_tax_amount', ['type' => 'decimal']);
$installer->addAttribute('invoice', 'base_shipping_tax_amount', ['type' => 'decimal']);

$installer->addAttribute('creditmemo', 'shipping_tax_amount', ['type' => 'decimal']);
$installer->addAttribute('creditmemo', 'base_shipping_tax_amount', ['type' => 'decimal']);
