<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->date('bday');
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->string('gender');
            $table->string('civil');
            $table->mediumText('address');
            $table->string('occupation');
            $table->string('telephone')->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->string('membership_id');
            $table->string('company_id')->nullable();
            $table->string('plan_id');
            $table->string('frequency')->nullable();
            $table->double('payment')->nullable();
            $table->date('endo');
            $table->string('pec_id')->nullable();
            $table->string('dependent')->nullable();
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
        Schema::dropIfExists('members');
    }
}
