<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/10/2019
 * Time: 3:09 PM
 */

namespace App\Http\Controllers\test2;

use App\Phrase;
use App\Analyzer;
use Auth;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class PhraseController extends Controller
{
    private $analyzer;

    public function getFirstChar($array, $char){
        for ($i = 0; $i < sizeof($array); $i++){
            if($array[$i] == $char){
                return $i;
            }
        }
        return false;
    }

    public function exists($array, $char){
        foreach ($array as $ar){
            if($ar->getChar() == $char){
                return true;
            }
        }
        return false;
    }

    public function restart(){
        return Redirect::to('/');
    }

    public function analyze(){

        $this->analyzer = new Analyzer();
        //get the phrase
        $string = Input::get('phrase');

        $phraseString = preg_replace('/\s/', '', $string);

        if(strlen($phraseString) > 255) {
            Request::session()->put('error', true);
            return Redirect::back()->withInput();
        }

        try{
            //convert all chars to lower case for a better manage
            $cleanPhrase = strtolower($phraseString);

            //converts string into an array
            $arrayPhrase = str_split($cleanPhrase);

            $arrayAnalyzer = $this->analyzer->getPhrase();

            for ($i = 0; $i < sizeof($arrayPhrase); $i++) {
                if($this->exists($arrayAnalyzer, $arrayPhrase[$i])){
                    foreach ($arrayAnalyzer as $an){
                        if($an->getChar() == $arrayPhrase[$i]){
                            $an->setTimes($an->getTimes() + 1);
                            if($i + 1 < sizeof($arrayPhrase)){
                                $after = $an->getAfter();
                                array_push($after, $arrayPhrase[$i + 1]);
                                $an->setAfter($after);
                            }
                            if($i - 1 >= 0){
                                $before = $an->getBefore();
                                array_push($before, $arrayPhrase[$i - 1]);
                                $an->setBefore($before);
                            }
                            $maxDist = $i - $this->getFirstChar($arrayPhrase, $arrayPhrase[$i]);
                            $an->setMaxDist($maxDist);
                        }
                    }
                }else{
                    $phrase = new Phrase();
                    $phrase->setChar($arrayPhrase[$i]);
                    $phrase->setTimes(1);
                    if($i + 1 < sizeof($arrayPhrase)){
                        $after = $phrase->getAfter();
                        array_push($after, $arrayPhrase[$i + 1]);
                        $phrase->setAfter($after);
                    }
                    if($i - 1 >= 0){
                        $before = $phrase->getBefore();
                        array_push($before, $arrayPhrase[$i - 1]);
                        $phrase->setBefore($before);
                    }
                    array_push($arrayAnalyzer, $phrase);
                }
            }
            $this->analyzer->setStringPhrase($string);
            $this->analyzer->setPhrase($arrayAnalyzer);
            Request::session()->put('analyzer', $this->analyzer);
            return Redirect::to('/Analyze');
        }catch(\Exception $exception) {
            return Redirect::back()->with('error', 'The action could not be executed')->withInput();
        }


    }
}