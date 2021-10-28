<?php
namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    use SoftDeletes;

    protected $table = "produtos";
    public $timestamps = false;
}
