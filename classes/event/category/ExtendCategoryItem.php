<?php namespace Allekslar\GoodNewsExtends\Classes\Event\Category;


use Lovata\GoodNews\Classes\Item\CategoryItem;
use Cms;
use October\Rain\Router\Helper;

/**
 * Class ExtendCategoryItem
 * @package Allekslar\GoodNewsExtends\Classes\Event\Category
 */
class ExtendCategoryItem
{
    public function subscribe()
    {
        CategoryItem::extend(function ($obCategoryItem) {
            $this->addCustomMethod($obCategoryItem);
        });
    }

    /**
     * Add myCustomMethod method
     * @param CategoryItem $obCategoryItem
     */
    protected function addCustomMethod($obCategoryItem)
    {
        $obCategoryItem->addDynamicMethod('getBreadcrumbs', function ($sFragment) use ($obCategoryItem) {

            $arResultList = $this->getBreadcrumbs($obCategoryItem, $sFragment);

            return $arResultList;
        });
        $obCategoryItem->addDynamicMethod('getUrlPage', function ($sFragment) use ($obCategoryItem) {

            $sUrl = $this->getUrlPage($obCategoryItem, $sFragment);

            return $sUrl;
        });
    }

    /**
     * Get array with categories slugs
     * @return array
     */
    protected function getSlugList($obCategoryItem): array
    {
        $arResult = [$obCategoryItem->slug];

        $obParentCategory = $obCategoryItem->parent;
        while ($obParentCategory->isNotEmpty()) {
            $arResult[] = $obParentCategory->slug;
            $obParentCategory = $obParentCategory->parent;
        }

        return $arResult;
    }

    /**
     * Returns URL of a category page.
     *
     * @param string $sFragment
     *
     * @return string
     */
    public function getUrlPage($obCategoryItem, $sFragment = '')
    {

        //Get slug list
        $arSlugList = $this->getSlugList($obCategoryItem);
        $arSlugList = array_reverse($arSlugList);

        //Build URL

        $sBaseUrl = Cms::url();
        $sPathUrl = Helper::rebuildUrl($arSlugList);
        $sUrl =  $sBaseUrl . $sFragment . $sPathUrl;

        return  $sUrl;
    }


    /**
     * Build URL path add name
     *
     * @param CategoryItem $obCategoryItem
     * @param string $sFragment
     * @return array
     */
    public function buildUrl($obCategoryItem, $sFragment = '/category')
    {

        $arResultUrl[] = $obCategoryItem->slug;
        $arResultName[] = $obCategoryItem->name;
        $sBaseUrl = Cms::url();

        $obParentCategory = $obCategoryItem->parent;
        while ($obParentCategory->isNotEmpty()) {

            $arResultSlug[] = $obParentCategory->slug;

            $obCategoryParent = $obParentCategory->parent;
            while ($obCategoryParent->isNotEmpty()) {
                $arResultSlug[] = $obCategoryParent->slug;
                $obCategoryParent = $obCategoryParent->parent;
            }

            $sPathUrl = Helper::rebuildUrl(array_reverse($arResultSlug));
            $url =  $sBaseUrl . $sFragment . $sPathUrl;

            $arResultUrl[] = $url;
            $arResultName[] = $obParentCategory->name;
            $obParentCategory = $obParentCategory->parent;
            $arResultSlug = [];
        }

        $arResult =  array_combine($arResultUrl, $arResultName);
        return $arResult;
    }


    /**
     * Get array with page breadcrumbs
     *
     * @param CategoryItem $obCategoryItem
     * @param string $sFragment
     * @return array
     */
    public function getBreadcrumbs($obCategoryItem, $sFragment)
    {
        $arResultUrl = $this->buildUrl($obCategoryItem, $sFragment);
        $arResult = [];

        foreach ($arResultUrl as $key => $value) {
            $arResult[]   =  array('name' => $value, 'url' =>  $key);
        }
        $arResult[]   =  array('name' => 'Home', 'url' => Cms::url() . $sFragment);

        return array_reverse($arResult);
    }
}
