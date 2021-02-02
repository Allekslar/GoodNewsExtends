<?php

namespace Allekslar\GoodNewsExtends\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * Class UpdateTableArticlesAddSoftDeletes
 * @package Lovata\GoodNews\Updates
 */
class UpdateTableGoodNewsCategories extends Migration
{
    /**
     * Apply migration
     */
    public function up()
    {
        if (Schema::hasTable('lovata_good_news_categories') && !Schema::hasColumn('lovata_good_news_categories', 'type')) {

            Schema::table('lovata_good_news_categories', function (Blueprint $table) {
                $table->string('type')->nullable();
                $table->index('type');
            });
        }
    }

    /**
     * Rollback migration
     */
    public function down()
    {
        if (Schema::hasTable('lovata_good_news_categories') && Schema::hasColumn('lovata_good_news_categories', 'type')) {
            Schema::table('lovata_good_news_categories', function (Blueprint $table) {
                $table->dropIndex('type');
                $table->dropColumn('type');
            });
        }
    }
}
