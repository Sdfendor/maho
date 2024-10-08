<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Cms
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->run("
    UPDATE `{$this->getTable('cms_page')}` SET `root_template` = 'two_columns_left' WHERE `root_template` LIKE 'left_column';
    UPDATE `{$this->getTable('cms_page')}` SET `root_template` = 'two_columns_right' WHERE `root_template` LIKE 'right_column';
    UPDATE `{$this->getTable('cms_page')}` SET `root_template` = 'three_columns' WHERE `root_template` LIKE 'three_column';
");

$installer->endSetup();
