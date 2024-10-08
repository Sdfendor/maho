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

Mage::getModel('catalog/product_flat_flag')
    ->loadSelf()
    ->setIsBuilt(false)
    ->save();

$installer->startSetup();
$installer->run("
    UPDATE `{$installer->getTable('core/config_data')}` SET `value`=0
        WHERE `path` LIKE '" . Mage_Catalog_Helper_Product_Flat::XML_PATH_USE_PRODUCT_FLAT . "';
");

$installer->endSetup();
