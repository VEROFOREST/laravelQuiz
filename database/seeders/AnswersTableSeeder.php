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
        $data = json_decode($detail, true);
        for ($i=0; $i < count($data); $i++) {
            $question_id = DB::table('questions')->where('label', '=', $data[$i]['data']['label'])->first()->id;

            // for ($i = 0; $i < count($data); $i++) {

                if ($data[$i]['type'] === "checkbox") {
                    $checkboxAnswer = ($data[$i]['data']['values']);
                    for ($y=0; $y <count($checkboxAnswer) ; $y++) { 
                        
                    Answer::create(
                        array(

                            'answer' => $checkboxAnswer[$y],

                            // 'isValid' => 1,

                            'question_id' => $question_id,
                        )
                    )->save();;
                    }
                } 
                if ($data[$i]['type'] === "radio") {
                    $radioAnswer = ($data[$i]['data']['values']);
                     for ($y=0; $y <count($radioAnswer) ; $y++) { 
                    Answer::create(
                        array(

                            'answer' => $radioAnswer[$y],

                            // 'isValid' => 1,

                            'question_id' => $question_id,
                        )
                    )->save();
                    }
                } 
                if ($data[$i]['type'] === "text") {
                    $textAnswer = ($data[$i]['data']['answer']);
                    Answer::create(
                        array(

                            'answer' => $textAnswer,

                            // 'isValid' => 1,

                            'question_id' => $question_id,
                        )
                    )->save();
                }
            // }
        }
    }
}
