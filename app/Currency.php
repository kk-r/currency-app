<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $table = 'currencies';
    public $primarykey = 'id';
    protected $fillable = [
        'symbol',
        'name',
        'symbol_native',
        'decimal_digits',
        'rounding',
        'rounding',
        'code',
        'name_plural',
        'base_currency_rate'
    ];


}
