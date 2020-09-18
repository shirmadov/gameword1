<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $primaryKey   = 'word_id';
    protected $table = 'gameword';

    protected $fillable = [
        'word' ,'word_of_type_id',
    ];

}
