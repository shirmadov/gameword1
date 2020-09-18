<?php

namespace App\Http\Controllers;

use App\Models\WordModel;
use DB;
use Illuminate\Http\Request;

class WordGameController extends Controller
{
    public function index(){

//        dd("Sa");
        return view('gameword.gameword');
    }

    public function insertword(){


        $verbs=array('arise','awake','accept','add','admire','admit','advise','afford','agree','alert','allow',
            'back','bake','balance','ban','bang','bare','bat','bathe','battle','beam',
            'calculate', 'call','camp','care','carry','carve','cause','challenge','change','charge','chase','cheat','check','cheer','chew',
            'dam','damage','dance','dare','decay','deceive','decide','decorate','delay','delight',
            'earn','educate','embarrass','encourage',
            'face','fade','fail','fancy','fasten','fax','fear','fence',
            'gather','gaze','glow','glue',
            'hammer','hand','handle','hang','happen','harass',
            'identify','ignore','imagine','impress','improve','include',
            'jail','jam	',
            'kick','kill',
            'label','land','last','laugh','launch',
            'man','manage','march','mark','marry','match','mate',
            'nail','name',
            'obey','object','observe',
            'pack','paddle','paint','park','part','pass','paste','pat','pause','peck','pedal','peel','peep','perform','permit',
            'question',
            'race','radiate','rain','raise','reach','realise','recognise','record','reduce','reflect',
            'sack','sail','satisfy','save','saw','scare','scatter','scold','scorch','scrape','scratch','scream','screw','scribble','scrub','seal','search','separate','serve','settle','shade','share','shave','shelter',
            'talk','tame','tap','taste','tease','telephone','tempt','terrify','test','thank',
            'undress','unfasten',
            'vanish',
            'wail','wait','walk','wander','want','warm','warn','wash',
            'x-ray',
            'yawn',
            'zip');


        foreach ($verbs as $verb){
            DB::table('gameword')->insert([
               'word'=> $verb,
                'word_of_type_id'=>1
            ]);
        }

//        return view('gameword.gameword');
    }


    public function getWord(Request $request,WordModel $wordModel){

//dd($request);
//        if($request->response){
        $allWords = $wordModel->get();
        $allWordsJson = json_encode($allWords);
        return $allWordsJson;
//        }

    }

    public function Test(Request $request,WordModel $wordModel){

        $test = $wordModel->get();
        dd($test);
    }


}
