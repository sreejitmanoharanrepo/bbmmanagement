<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbayfeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebayfeedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CommentingUser');
            $table->string('FeedbackRatingStar');
            $table->string('CommentingUserScore');
            $table->string('CommentText');
            $table->string('CommentTime');
            $table->string('CommentType');
            $table->string('ItemID');
            $table->string('Role');
            $table->string('FeedbackID');
            $table->string('TransactionID');
            $table->string('OrderLineItemID');
            $table->string('ItemTitle');
            $table->string('ItemPrice');
           
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
        Schema::dropIfExists('ebayfeedbacks');
    }
}
