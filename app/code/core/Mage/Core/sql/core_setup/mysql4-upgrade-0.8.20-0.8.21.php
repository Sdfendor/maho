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

$installer->getConnection()->addColumn($installer->getTable('core/resource'), 'data_version', 'varchar(50)');

/*
 * Update core_resource table to prevent running data upgrade install scripts,
 * New 'data_version' column will contain value from 'version' column
 */
$installer->getConnection()->update(
    $this->getTable('core/resource'),
    ['data_version' => new Zend_Db_Expr('version')]
);
