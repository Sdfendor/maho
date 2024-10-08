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
$installer  = $this;
$installer->startSetup();

$installer->run("
    DROP TABLE IF EXISTS `{$this->getTable('catalog_product_entity_media_gallery_image')}`;
");
$installer->getConnection()->dropColumn($this->getTable('catalog_product_entity_media_gallery'), 'entity_type_id');
$installer->updateAttribute('catalog_product', 'image', 'frontend_input', 'media_image');
$installer->updateAttribute('catalog_product', 'small_image', 'frontend_input', 'media_image');
$installer->updateAttribute('catalog_product', 'thumbnail', 'frontend_input', 'media_image');

$installer->endSetup();
