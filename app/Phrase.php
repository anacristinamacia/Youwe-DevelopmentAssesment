<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/10/2019
 * Time: 3:56 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Phrase extends Model
{
    protected $char;
    protected $times;
    protected $before;
    protected $after;
    protected $maxDist;

    public function __construct()
    {
        $this->before = array();
        $this->after = array();
        $this->maxDist = 0;
    }

    public function getChar(){
        return $this->char;
    }
    public function getTimes(){
        return $this->times;
    }
    public function getBefore(){
        return $this->before;
    }
    public function getAfter(){
        return $this->after;
    }
    public function getMaxDist(){
        return $this->maxDist;
    }

    public function setChar($char){
        $this->char = $char;
    }
    public function setTimes($times){
        $this->times = $times;
    }
    public function setBefore($before){
        $this->before = $before;
    }
    public function setAfter($after){
        $this->after = $after;
    }
    public function setMaxDist($maxDist){
        $this->maxDist = $maxDist;
    }

}
