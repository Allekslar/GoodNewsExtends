<?php

namespace Allekslar\GoodNewsExtends\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use Allekslar\GoodNewsExtends\Classes\Item\GoodNewsExtendsItem;
use Allekslar\GoodNewsExtends\Classes\Store\CategoryListStore;
use Illuminate\Support\Facades\Redirect;
use Response;

/**
 * Class CardCollection
 * @package Allekslar\Post\Classes\Collection
 */
class GoodNewsExtendsCollection extends ElementCollection
{
    // const ITEM_CLASS = CardItem::class;

    /**
     * Sort list
     * @return $this
     */
    public function type()
    {

        $arResultIDList = CategoryListStore::instance()->type->get();
        // trace_log([self::class => $arResultIDList]);
        return $this->applySorting($arResultIDList);
    }


}
