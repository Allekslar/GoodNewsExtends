<?php

namespace  Allekslar\GoodNewsExtends\Classes\Event\Category;

use Lovata\Toolbox\Classes\Event\AbstractBackendFieldHandler;

use Lovata\GoodNews\Models\Category;
use Lovata\GoodNews\Controllers\Categories;

/**
 * Class ExtendCategoryFieldsHandler
 * @package Lovata\BaseCode\Classes\Event\Category
 */
class ExtendCategoryFieldsHandler extends AbstractBackendFieldHandler
{
    /**
     * Extend field
     * @param \Backend\Widgets\Form $obWidget
     */
    protected function extendFields($obWidget)
    {
        $arAdditionFields = [
            'type' => [
                'label'   => 'Type',
                'tab'     => 'lovata.toolbox::lang.tab.settings',
                'type' => 'dropdown',
                'default' => 'published',
                'options' => [
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived'
                ]
            ]
        ];

        $obWidget->addTabFields($arAdditionFields);
    }

    /**
     * Get model class name
     * @return string
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }

    /**
     * Get controller class name
     * @return string
     */
    protected function getControllerClass(): string
    {
        return Categories::class;
    }
}
