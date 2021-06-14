<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('status_id')->default(1);
            $table->integer('priority_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('sla_id')->nullable();
            $table->string('requestor_email');
            $table->string('subject');
            $table->text('concern');
            $table->integer('assigned_by')->nullable();
            $table->integer('assigned_to')->nullable();
            $table->date('closed_at')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
