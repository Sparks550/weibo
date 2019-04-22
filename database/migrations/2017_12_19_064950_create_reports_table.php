<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id')->comment('举报ID');
            $table->integer('user_id')->nullable()->comment('举报者ID');
            $table->integer('content_id')->nullable()->comment('微博内容ID');
            $table->text('report_type')->nullable()->comment('举报类型');
            $table->text('report_content')->nullable()->comment('举报内容');
            $table->boolean('is_report')->nullable()->comment('举报是否处理');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
