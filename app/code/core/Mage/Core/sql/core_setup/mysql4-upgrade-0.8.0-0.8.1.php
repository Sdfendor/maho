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

$installer->getConnection()->addColumn($this->getTable('core/url_rewrite'), 'entity_id', 'INT( 10 ) NOT NULL AFTER `store_id`');
$installer->run("UPDATE {$this->getTable('core/url_rewrite')} set `entity_id` = SUBSTR(`id_path`, LOCATE('/', `id_path`)+1, IF(LOCATE('/', `id_path`, LOCATE('/', `id_path`)+1) = 0, LENGTH(`id_path`) , LOCATE('/', `id_path`, LOCATE('/', `id_path`)+1)) - LOCATE('/', `id_path`)+1);");

$installer->endSetup();
