<?php

namespace Allekslar\GoodNewsExtends\Classes\Store\Category;

use Lovata\GoodNews\Models\Category;
use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;

/**
 * Class GetCustomList
 * @package Lovata\BaseCode\Classes\Store\Category
 */
class GetTypeList extends AbstractStoreWithoutParam
{
    protected static $instance;

    /**
     * Get ID list from database
     * @return array
     */
    protected function getIDListFromDB(): array
    {
        $arElementIDList1 = (array) Category::select('id')->get();
        $arElementIDList = (array) Category::where('type', true)->lists('id');
        return $arElementIDList;
    }
}
