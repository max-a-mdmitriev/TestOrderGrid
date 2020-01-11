<?php

namespace Max\TestOrderGrid\Model\ResourceModel\Order\Grid;

use Magento\Sales\Model\ResourceModel\Order\Grid\Collection as SalesCollection;

class Collection extends SalesCollection
{

    /**
     * Hook for operations before rendering filters adding missing columns from sales_order table
     * @return void
     */
    protected function _renderFiltersBefore()
    {
        $joinTable = $this->getTable('sales_order');
        $this->getSelect()->joinLeft(
            $joinTable,
            'main_table.entity_id = sales_order.entity_id',
            ['coupon_code', 'discount_amount']
        );
        parent::_renderFiltersBefore();
    }
}
