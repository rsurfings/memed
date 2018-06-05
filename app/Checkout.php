<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{

    protected $table = 'checkout';

    public $primaryKey = 'id';

    public $timestamps = true;
}