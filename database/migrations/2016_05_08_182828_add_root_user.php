<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRootUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('users')->insert(array(
                    'fullname' => 'Root Rootowski',
                    'name' => 'root',
                    'is_admin' => 1,
                    'email' => 'root@roothost.rr',
                    'password' => bcrypt('root123'),
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')

                    ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::table('users')->where('name', '=', 'root')->delete();
    }
}
