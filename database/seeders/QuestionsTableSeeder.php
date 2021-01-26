<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class QuestionsTableSeeder extends Seeder
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

         foreach( $data as $question){
            $type_id = DB::table('types')->where('name', '=', $question['type'])->first()->id;
           
             Question::create(
                 array(
                 'label'=> $question['data']['label'],
                 'type_id'=>$type_id,
                )
             )->save();
         }
    }
}
