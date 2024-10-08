<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Review
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2023 The OpenMage Contributors (https://openmage.org)
 * @copyright  Copyright (c) 2024 Maho (https://mahocommerce.com)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Review/Rating module upgrade. Both module tables must be installed.
 */

$this->startSetup();

// add average approved percent
$this->run("
ALTER TABLE `{$this->getTable('rating_option_vote_aggregated')}`
ADD COLUMN `percent_approved` tinyint(3) NULL DEFAULT 0 AFTER `percent`;
");

try {
    // re-aggregate existing reviews
    $resource = Mage::getResourceSingleton('review/review');
    // count quantity and aggregate packs per 100 items
    $total = $this->getConnection()->select()->from($this->getTable('review'), 'count(*)');
    $total = (int) $this->getConnection()->fetchOne($total);
    for ($i = 0; $i < $total; $i += 100) {
        $select = $this->getConnection()->select()
            ->from($this->getTable('review'), ['review_id', 'entity_pk_value'])
            ->limit(100, $i)
        ;
        $rows = $this->getConnection()->fetchAll($select);
        foreach ($rows as $row) {
            $resource->reAggregateReview($row['review_id'], $row['entity_pk_value']);
        }
    }
} catch (Exception $e) {
    $this->run("ALTER TABLE `{$this->getTable('rating_option_vote_aggregated')}` DROP COLUMN `percent_approved`;");
    throw $e;
}

$this->endSetup();
