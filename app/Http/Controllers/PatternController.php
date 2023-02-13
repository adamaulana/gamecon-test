<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatternController extends Controller
{

    public function index(){
         return view('pattern');    
    }

    public function generate(Request $req){
        $n = $req->n;
        $rowNum = $n;
        $space = $rowNum-1;
        for($i=1; $i<=$rowNum; $i++)
        {
            for($j=1; $j<=$space; $j++){
                echo "+";
            }
            for($j=1; $j<=(2*$i-1); $j++){
                echo "-";
            }
            for($j=1; $j<=$space; $j++){
                echo "+";
            }
            $space--;

            echo "<br>";
       }
        $space = 1;
        for($i=1; $i<=($rowNum-1); $i++)
        {
            for($j=1; $j<=$space; $j++){
                echo "+";
            } 
            for($j=1; $j<=(2*($rowNum-$i)-1); $j++){
                echo "-";
            }
            for($j=1; $j<=$space; $j++){
                echo "+";
            }
            $space++;
            echo "<br>";
        }
    }
 
}
