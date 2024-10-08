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
$this->startSetup();

$this->run("
ALTER TABLE `{$installer->getTable('sales_quote_item')}`
    MODIFY COLUMN `weight` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `discount_percent` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `discount_amount` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `tax_percent` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `tax_amount` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `row_total_with_discount` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `base_discount_amount` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `base_tax_amount` DECIMAL(12,4) DEFAULT '0.0000',
    MODIFY COLUMN `row_weight` DECIMAL(12,4) DEFAULT '0.0000';
");

$this->endSetup();
$this->installEntities();
