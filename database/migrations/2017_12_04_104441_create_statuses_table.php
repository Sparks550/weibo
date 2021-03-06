<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id')->commment('微博自用ID(主键)');
            $table->text('content')->comment('微博内容');
            $table->integer('user_id')->index()->comment('发布微博者ID');
            $table->integer('repost_id')->nullable()->index()->comment('转发微博时作者ID');
            $table->integer('repost_count')->nullable()->comment('微博转发的数量');
            $table->integer('like_count')->default(0)->comment('点赞次数');
            $table->text('repost_content')->comment('转发原因')->nullable();


            //创建时间和更新时间
            $table->timestamps();
            //软删除设置
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}