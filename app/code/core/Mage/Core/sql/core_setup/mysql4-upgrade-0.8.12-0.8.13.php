<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Core
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addConstraint(
    'FK_CORE_URL_REWRITE_STORE',
    $installer->getTable('core/url_rewrite'),
    'store_id',
    $installer->getTable('core/store'),
    'store_id',
    'CASCADE',
    'CASCADE',
    true
);

$installer->endSetup();
