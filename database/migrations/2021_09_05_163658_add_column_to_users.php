<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('guardian_id')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('education')->nullable();
            $table->string('address')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('student_relation')->nullable();
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'guardian_id',
                'contact_no',
                'education',
                'address',
                'gender',
                'student_relation',
                'picture',
            ]);
        });
    }
}
