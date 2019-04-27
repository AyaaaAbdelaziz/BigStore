<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    public $primarykey='id';

public $timestamp =true;
    protected $products;
    protected $product;

}
