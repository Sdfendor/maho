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

$installer->getConnection()->addColumn($this->getTable('sales_order'), 'subtotal_invoiced', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_order'), 'tax_invoiced', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_order'), 'shipping_invoiced', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_order'), 'base_subtotal_invoiced', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_order'), 'base_tax_invoiced', 'decimal(12,4) NULL');
$installer->getConnection()->addColumn($this->getTable('sales_order'), 'base_shipping_invoiced', 'decimal(12,4) NULL');

$installer->addAttribute('order', 'subtotal_invoiced', ['type' => 'static']);
$installer->addAttribute('order', 'tax_invoiced', ['type' => 'static']);
$installer->addAttribute('order', 'shipping_invoiced', ['type' => 'static']);
$installer->addAttribute('order', 'base_subtotal_invoiced', ['type' => 'static']);
$installer->addAttribute('order', 'base_tax_invoiced', ['type' => 'static']);
$installer->addAttribute('order', 'base_shipping_invoiced', ['type' => 'static']);
