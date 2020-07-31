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

    // /**
    //  * Get item by code
    //  * @param string $sCode
    //  * @return $this
    //  */
    // public function getCardByCode($sCode)
    // {
    //     $arResultIDList = CategoryListStore::instance()->get_card_by_code->get($sCode);
    //     return $this->applySorting($arResultIDList);
    // }

    // /**
    //  * Get item by code
    //  * @param string $sCode
    //  * @return $this
    //  */
    // public function getCardByParentId($sCode)
    // {
    //     trace_log([self::class => " getCardByParentId"]);
    //     $arResultIDList = CategoryListStore::instance()->get_card_by_parent_id->get($sCode);
    //     trace_log([self::class => " getCardByParentId2"]);
    //     trace_log([self::class => $sCode]);
    //     if (!$arResultIDList) {
    //         trace_log([self::class => " 404"]);
    //         // return Response::make($this->controller->run('404'), 404);
    //         return false;
    //         return CardItem::make(null);
    //     }
    //     if ($arResultIDList[0] == '') {
    //         trace_log([self::class => '$arResultIDList[0]']);
    //         return false;
    //     }
    //     trace_log([self::class => $arResultIDList[0]]);
    //     return $this->applySorting($arResultIDList);
    // }

    // /**
    //  * Get item by code
    //  * @param string $sCode
    //  * @return CardItem
    //  */
    // public function getByCode($sCode)
    // {

    //     if ($this->isEmpty() || empty($sCode)) {
    //         return CardItem::make(null);
    //     }

    //     $arCardList = $this->all();
    //     /** @var CardItem $obCardItem */
    //     foreach ($arCardList as $obCardItem) {
    //         if ($obCardItem->code == $sCode) {
    //             return $obCardItem;
    //         }
    //     }

    //     return CardItem::make(null);
    // }
}
