<?php
/**
 * Created by PhpStorm.
 * User: Ana Cristina Macià
 * Date: 1/9/2019
 * Time: 6:17 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $suit;
    protected $value;
    protected $status;

}