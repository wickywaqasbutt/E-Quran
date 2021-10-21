<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('role');
            $table->string('course')->nullable();
            $table->string('skype_pass');
            $table->string('skype');
            $table->foreignId('team_id')->refrences('id')->on('teams')->default('0');
            $table->longText('description');
            $table->tinyInteger('teacherStatus')->default('0');
            $table->string('apply')->nullable();
            $table->string('apply_for')->nullable();
            $table->text('audio')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });

        $data = array(
                    array(
                        'email' => 'usama1517a@gmail.com',
                        'password' => Hash::make('727@usamaadmin@$'),
                        'name' => 'Usama Qayyum',
                        'role' => 2,
                        'skype' => 'usama1517a',
                        'skype_pass' => 'moltyfoam',
                        'description' => "Administrator"
                    )
                  
                );

        DB::table('users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
