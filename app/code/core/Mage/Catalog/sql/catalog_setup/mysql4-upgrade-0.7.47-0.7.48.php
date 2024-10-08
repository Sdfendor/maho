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

$installer->run("
    ALTER TABLE `{$installer->getTable('catalog/product')}` ADD `has_options` SMALLINT(1) NOT NULL DEFAULT '0';
");

$installer->addAttribute('catalog_product', 'has_options', [
    'type' => 'static',
    'visible' => false,
    'default' => false
]);
$installer->run("
    UPDATE `{$installer->getTable('catalog/product')}` SET `has_options` = '1'
    WHERE (entity_id IN (
        SELECT product_id FROM `{$installer->getTable('catalog/product_option')}` GROUP BY product_id
    ));
    UPDATE `{$installer->getTable('catalog/product')}` SET `has_options` = '1'
    WHERE (entity_id IN (
        SELECT product_id FROM `{$installer->getTable('catalog/product_super_attribute')}` GROUP BY product_id
    ));
");

$installer->endSetup();
