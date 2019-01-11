<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/11/2019
 * Time: 3:12 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;


class Analyzer extends Model
{
    protected $stringPhrase;
    protected $phrase;

    public function __construct()
    {
        $this->phrase = array();
    }

    public function getStringPhrase(){
        return $this->stringPhrase;
    }
    public function getPhrase(){
        return $this->phrase;
    }

    public function setStringPhrase($stringPhrase){
        $this->stringPhrase = $stringPhrase;
    }
    public function setPhrase($phrase){
        $this->phrase = $phrase;
    }

}