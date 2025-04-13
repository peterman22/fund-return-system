<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundReturnsTable extends Migration
{
    public function up()
    {
        Schema::create('fund_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fund_id')->constrained()->onDelete('cascade');
            $table->enum('return_type', ['monthly', 'quarterly', 'yearly']);
            $table->boolean('is_compound');
            $table->decimal('percentage', 5, 2);
            $table->date('effective_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fund_returns');
    }
}