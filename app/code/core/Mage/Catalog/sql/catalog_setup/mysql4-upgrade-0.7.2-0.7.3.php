<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

$this->run("

update {$this->getTable('eav_entity_attribute')} set `sort_order`=10 where `attribute_id`=(select `attribute_id` from {$this->getTable('eav_attribute')} where `attribute_code`='tier_price');

alter table {$this->getTable('catalog_product_entity_tier_price')} add column `all_groups` tinyint (1)UNSIGNED  DEFAULT '1' NOT NULL  after `entity_id`;

");
