<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTenRandomPokemons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        for($j=1;$j<=10;$j++)
        {
            DB::table('pokemons')->insert(array(
                    'name' => 'random'.$j,
                    'strength' => rand(1, 100),
                    
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')

                    ));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        for($i=1;$i<=10;$i++)
        {

        DB::table('pokemons')->where('name', '=', 'random'.$i)->delete();
        }
    }
}
