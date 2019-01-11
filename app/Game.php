<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/9/2019
 * Time: 6:25 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Card;


class Game extends Model
{
    protected $cards;

    public function __construct()
    {
        $this->cards = array(
        array("C", "A", false),
        array("C", "2", false),
        array("C", "3", false),
        array("C", "4", false),
        array("C", "5", false),
        array("C", "6", false),
        array("C", "7", false),
        array("C", "8", false),
        array("C", "9", false),
        array("C", "10", false),
        array("C", "J", false),
        array("C", "Q", false),
        array("C", "K", false),
        array("D", "A", false),
        array("D", "2", false),
        array("D", "3", false),
        array("D", "4", false),
        array("D", "5", false),
        array("D", "6", false),
        array("D", "7", false),
        array("D", "8", false),
        array("D", "9", false),
        array("D", "10", false),
        array("D", "J", false),
        array("D", "Q", false),
        array("D", "K", false),
        array("H", "A", false),
        array("H", "2", false),
        array("H", "3", false),
        array("H", "4", false),
        array("H", "5", false),
        array("H", "6", false),
        array("H", "7", false),
        array("H", "8", false),
        array("H", "9", false),
        array("H", "10", false),
        array("H", "J", false),
        array("H", "Q", false),
        array("H", "K", false),
        array("S", "A", false),
        array("S", "2", false),
        array("S", "3", false),
        array("S", "4", false),
        array("S", "5", false),
        array("S", "6", false),
        array("S", "7", false),
        array("S", "8", false),
        array("S", "9", false),
        array("S", "10", false),
        array("S", "J", false),
        array("S", "Q", false),
        array("S", "K", false)
    );
    }

    public function getCards(){
        return $this->cards;
    }

    public function changeStatus($card){
        $this->cards[$card][2] = true;
    }

}