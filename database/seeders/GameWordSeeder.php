<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GameWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $words = ['noun','verb','adjective','adverb'];
        foreach ($words as $word){
            DB::table('typeword')->insert([
                'type_word'=>$word

            ]);
        }
    }
}
