<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense_Type extends Model
{
    use HasFactory;

    //Foi necessário adicionar essa public $table pois o Laravel não estava reconhecendo a table sozinho
    public $table = "expense_types";
}
