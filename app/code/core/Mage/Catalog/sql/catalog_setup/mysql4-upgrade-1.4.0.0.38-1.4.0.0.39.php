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

$entityTypeId = $installer->getEntityTypeId('catalog_product');
$installer->updateAttribute($entityTypeId, 'custom_layout_update', 'backend_model', 'catalog/attribute_backend_customlayoutupdate');

$entityTypeId = $installer->getEntityTypeId('catalog_category');
$installer->updateAttribute($entityTypeId, 'custom_layout_update', 'backend_model', 'catalog/attribute_backend_customlayoutupdate');
