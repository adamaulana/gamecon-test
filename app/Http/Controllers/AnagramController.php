<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnagramController extends Controller
{

    public function index(){
        return view('anagram');
    }
    public function generate(Request $req){
        $inputArray = explode(",",$req->ana);	
        // $inputArray = ['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua'];
        $output = [];
        foreach ($inputArray as $input){
            $stringParts = str_split($input);
            sort($stringParts); 
            $sortedString =  implode('', $stringParts)." ";
            $output[$sortedString][] = $input;
        }
            dd($output);
    }
}
