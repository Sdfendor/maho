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
$installer  = $this;
$installer->startSetup();

$table = $this->getTable('core_translate');
$conn = $installer->getConnection();

$conn->addColumn($table, 'locale', "varchar(20) not null default 'en_US'");
$conn->dropKey($table, 'IDX_CODE');
$conn->raw_query('alter table `' . $table . '` add unique key `IDX_CODE` (`store_id`, `locale`, `string`)');

$installer->endSetup();
