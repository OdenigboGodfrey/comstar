<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /** display positive message to user compulsory **/
    private $positive = 1;
    /** display message to user not compulsory **/
    private $neutral = 0;
    /** display negative message to user compulsory **/
    private $negative = -1;
    /** display error message to user compulsory **/
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('post_image');
            $table->integer('published')->default($this->positive);
            $table->string('location');
            $table->unsignedInteger('latitude')->nullable();
            $table->unsignedInteger('longitude')->nullable();
            $table->unsignedFloat('weight')->default(1);
            $table->unsignedInteger('post_id')->nullable();
            $table->string('post_type')->default('post');
            $table->timestamp('posted_on');
            $table->unsignedInteger('user_id');
            $table->integer('sponsored')->default($this->negative);
            $table->unsignedInteger('flags')->default(0);
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
