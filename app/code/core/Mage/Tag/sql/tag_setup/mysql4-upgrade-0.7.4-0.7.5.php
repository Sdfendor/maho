<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Tag
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn($installer->getTable('tag/tag'), 'first_store_id', "smallint(5) UNSIGNED NOT NULL DEFAULT '0'");

$groupedTags = $installer->getConnection()->select()
    ->from($installer->getTable('tag/relation'))->group('tag_id')->order('created_at ASC');
$select = $installer->getConnection()->select()
    ->reset()
    ->joinInner(
        ['relation_table' => new Zend_Db_Expr("({$groupedTags->__toString()})")],
        'relation_table.tag_id = main_table.tag_id',
        null
    )
    ->columns(['first_store_id' => 'store_id']);

$updateSql = $select->crossUpdateFromSelect(['main_table' => $installer->getTable('tag/tag')]);
$installer->getConnection()->query($updateSql);

$installer->endSetup();
