<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Input;

class MarvelController extends Controller
{
    public function getCharacter($limit,$offset){
        $publicKey = "7b44451671811b8d1810afb13f96801b";
        $ts = time();        
        $privateKey = "78bf34ed50decde0330df1e7abd7d58c82983137";
        $enc=hash('md5', $ts.$privateKey.$publicKey);
        $response = Http::get("https://gateway.marvel.com:443/v1/public/characters?apikey=".$publicKey."&ts=".$ts."&hash=".$enc."&limit=".$limit."&offset=".$offset);
        $jsonData = $response->json();
        return $jsonData['data'];
        // return $jsonData;
        // return $enc;    
    }
    
    public function index(){
        return view('marvel');
    }
    
    public function search(Request $req){
        $b = $req->all();  

        if(!empty($b['limit'])){
            $limit =  $b['limit'];
            $res['limit'] = $limit;            
        }else{
            $limit =  20;
            $res['limit'] = 20;
        }

        if(!empty($b['page']) && $b['page'] != 1 ){
            $page =  $b['page'];
            $res['page'] = $page;
            $offset = ($page-1)*$limit;
        }else{            
            $offset = 0;
            $res['page'] = 1;
        }


        
        $src = $this->getCharacter($limit,$offset);
        if(empty($b['keyword'])){
            $res['keyword'] = NULL;
            // $res['data'] = $this->getCharacter($limit,$offset);
            for($i=0; $i<sizeof($src['results']); $i++){                
                $res['results'][$i]['id'] = $src['results'][$i]['id'];                
                $res['results'][$i]['nama'] = $src['results'][$i]['name'];                
                $res['results'][$i]['deskripsi'] = $src['results'][$i]['description'];                
                $res['results'][$i]['urls'] = $src['results'][$i]['urls'];                   
            }
        }else{
            $res['keyword'] = $b['keyword'];
            for($i=0; $i<sizeof($src['results']); $i++){
                $a = $src['results'][$i]['name'];
                $comp = $b['keyword'];
                if(stristr($a,$comp)){                
                    $res['results'][$i]['id'] = $src['results'][$i]['id'];                
                    $res['results'][$i]['nama'] = $src['results'][$i]['name'];
                    $res['results'][$i]['deskripsi'] = $src['results'][$i]['description'];         
                    $res['results'][$i]['urls'] = $src['results'][$i]['urls'];                
                }
            }
            
            if(empty($res)){
                $res['results'] = "Karakter tidak ditemukan, silahkan cari di page lain";
            }
        }

        $results =  [];
        if(empty($b['sort'])){
            $results = $res;
        }else{
            if($b['sort'] == 'asc'){
                foreach ($res['results'] as $key => $row)
                {
                    $results[$key] = $row;                
                }
                array_multisort($results, SORT_ASC, $res['results']);
            }elseif($b['sort'] == 'desc'){
                foreach ($res['results'] as $key => $row)
                {
                    $results[$key] = $row;                
                }
                array_multisort($results, SORT_DESC, $res['results']);            
            }
        }
            
        dd($results);
    }

}
