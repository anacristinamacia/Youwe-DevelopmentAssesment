<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/9/2019
 * Time: 6:33 AM
 */

namespace App\Http\Controllers\test1;

use Auth;
use App\Game;
use App\Card;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class GameController extends Controller
{
    private $game;

    public function firstDraft(){

        $this->game = new Game();
        Request::session()->put('success', false);
        //get the selected card
        $selectedSuit= Input::get('suit');
        $selectedValue = Input::get('value');

        $cardsLeft = 0;
        foreach ($this->game->getCards() as $card){
            if(!$card[2]){
                $cardsLeft++;
            }
        }
        $prob = number_format((float)((1/$cardsLeft)*100), 2, '.', '');

        Request::session()->put('selectedSuit', $selectedSuit);
        Request::session()->put('selectedValue', $selectedValue);
        Request::session()->put('prob', $prob);

        try{
            Request::session()->put('game', $this->game);
            return Redirect::to('/Statistics');
        }catch(\Exception $exception) {
            return Redirect::back()->with('error', 'The action could not be executed')->withInput();
        }
    }

    public function draft(){

        //get the selected card
        $game = Request::session()->get('game');
        $selectedSuit = Request::session()->get('selectedSuit');
        $selectedValue = Request::session()->get('selectedValue');

        $random = rand(0, 51);
        while($game->getCards()[$random][2]){
            $random = rand(0, 51);
        }
        $randomSuit = $game->getCards()[$random][0];
        $randomValue = $game->getCards()[$random][1];

        $game->changeStatus($random);

        $cardsLeft = 0;
        foreach ($game->getCards() as $card){
            if(!$card[2]){
                $cardsLeft++;
            }
        }
        $prob = number_format((float)((1/$cardsLeft)*100), 2, '.', '');
        Request::session()->put('prob', $prob);

        try{
            if($randomSuit == $selectedSuit && $randomValue == $selectedValue){
                //success
                $prob = number_format((float)((1/($cardsLeft + 1))*100), 2, '.', '');
                Request::session()->put('prob', $prob);
                Request::session()->put('success', true);
                return Redirect::to('/FirstDraft');
            }else{
                //keeps drafting
                Request::session()->put('game', $game);
                return Redirect::to('/Statistics');
            }
        }catch(\Exception $exception) {
            return Redirect::back()->with('error', 'The action could not be executed')->withInput();
        }
    }

}