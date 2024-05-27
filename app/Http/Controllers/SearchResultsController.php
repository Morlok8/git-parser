<?php

//namespace App\Http\Controllers\API\V1;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SearchResults;


class SearchResultsController extends Controller
{
    //API
    public function index($array = null){
        if(!empty($array))
            return view('index', ['array'=>$array]);
        else{
            return view('index');
        }
    }
    
    public function display_results($page = null){
        if(is_null($page)){
            $searchResults = SearchResults::all();
        }
        else{
            $numberPerPage = 3; 

            $searchResults = SearchResults::offset($numberPerPage * ($page-1))->limit($numberPerPage)->get();
        }

            $output['items'] = [];
    
            foreach($searchResults as $search){
    
                $decoded = json_decode($search->result, true); 
        
                foreach($decoded["items"] as $key => $decValue){
                    $mergeArr = array("name" => $decValue["name"], 
                                      "owner" => $decValue["owner"]["login"], 
                                       "stargazers_count" => $decValue["stargazers_count"], 
                                       "watchers_count" => $decValue["watchers_count"], 
                                        "html_url" => $decValue["html_url"]);

                    $output['items'][] = $mergeArr;    
                }    
            }
            //если записи не найдены
            if(empty($output['items'])){
                $output = "No records found";
            }

            return view('resultJson', ["array" => json_encode($output, JSON_PRETTY_PRINT)]);
    }

    public function destroy($id){
        if(SearchResults::where('id',$id)->exists()){
            $searchResults = SearchResults::find($id);
            $searchResults->delete();

            return response()->json([
                "message" => "Запись удалена"
            ], 202);
        }
        else{
            return response()->json([
                "message" => "Запись не найдена "
            ], 404);
        }
    }

    //search 
    public function search(Request $request){
        $userQuery = request()->get('query');

        $query = "https://api.github.com/search/repositories?q=".$userQuery."";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $query);
        curl_setopt($ch, CURLOPT_USERAGENT, "curl");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        curl_close($ch);
        $searchResults = SearchResults::where('query', $userQuery)->get();

        if(!count($searchResults)){
            $newResult = new SearchResults;
            $newResult->query = $userQuery;
            $newResult->result = $output;
            $newResult->save();
        }
        else{
            foreach($searchResults as $search){
                $output = $search->result;       
            }  
        }
        return view('result', ["array"=>json_decode($output, true)]);
    }
}
