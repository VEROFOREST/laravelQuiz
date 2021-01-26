<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $path = "public/json/questions.json";
        $detail = file_get_contents($path);
         $data = json_decode($detail,true);

         foreach( $data as $type){
             Type::create(
                 array(
                 'name'=> $type['type'],
                )
             )->save();
         }
      
    }
}
