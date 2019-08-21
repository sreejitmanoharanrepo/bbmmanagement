<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DisputeID')->nullable();
            $table->string('DisputeRecordType')->nullable();
            $table->string('DisputeState')->nullable();
            $table->string('DisputeStatus')->nullable();            
            $table->string('OtherPartyName')->nullable();
            $table->string('TransactionID')->nullable();
            $table->string('ItemID')->nullable();
            $table->string('ConditionID')->nullable();
            $table->string('DisputeReason')->nullable();
            $table->string('DisputeExplanation')->nullable();
            $table->string('DisputeCreditEligibility')->nullable();
            $table->string('DisputeCreatedTime')->nullable();
            $table->string('DisputeModifiedTime')->nullable();
            $table->string('OrderLineItemID')->nullable();
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
        Schema::dropIfExists('disputes');
    }
}
