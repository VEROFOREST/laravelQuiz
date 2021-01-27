<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AnswersTableSeeder extends Seeder
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

        //  for ($i=0; $i <count($data); $i++) { 
            
        //         if ($data[$i]['type'] == "checkbox"){
        //       print_r($data[$i]['data']['values']);
        //         }
        //         elseif ($data[$i]['type'] == "radio") {
        //               print_r($data[$i]['data']['answer']);
        //         }
        //         elseif ($data[$i]['type'] == "text"){
        //             print_r($data[$i]['data']['answer']);
        //         }
        //  }
            
         foreach( $data as $answer){
            $question_id = DB::table('questions')->where('label', '=', $answer['data']['label'])->first()->id;
            
            for ($i=0; $i <count($data); $i++) { 
            
                if ($data[$i]['type'] == "checkbox"){
             $checkboxAnswer =($data[$i]['data']['values']);
             
             Answer::create(
                 array(
                     
                    'answer'=> $checkboxAnswer[$i],
                 
                    'isValid'=> 1,
                 
                    'question_id'=>$question_id,
                )
                 )->save();;
                }
                elseif ($data[$i]['type'] == "radio") {
                      $radioAnswer = ($data[$i]['data']['values']);
                       Answer::create(
                 array(
                     
                    'answer'=> $radioAnswer[$i],
                 
                    'isValid'=> 1,
                 
                 'question_id'=>$question_id,
                )
             )->save();
                }
                elseif ($data[$i]['type'] == "text"){
                  $textAnswer = ($data[$i]['data']['answer']);
                  Answer::create(
                 array(
                     
                    'answer'=> $textAnswer,
                 
                    'isValid'=> 1,
                 
                 'question_id'=>$question_id,
                )
             )->save();
                }
            }
             
         }
    }
}
