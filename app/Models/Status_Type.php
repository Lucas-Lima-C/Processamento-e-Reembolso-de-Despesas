<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Type extends Model
{
    use HasFactory;

    //Para o laravel reconhecer a tabela
    public $table = "status_types";
}
