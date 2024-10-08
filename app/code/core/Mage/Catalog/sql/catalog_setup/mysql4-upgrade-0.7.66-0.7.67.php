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

$installer->addAttribute('catalog_product', 'created_at', [
    'type'      => 'static',
    'backend'   => 'eav/entity_attribute_backend_time_created',
    'visible'   => 0,
]);
$installer->addAttribute('catalog_product', 'updated_at', [
    'type'      => 'static',
    'backend'   => 'eav/entity_attribute_backend_time_updated',
    'visible'   => 0,
]);
