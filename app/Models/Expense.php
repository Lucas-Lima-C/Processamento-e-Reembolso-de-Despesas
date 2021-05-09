<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expense_Type;

class Expense extends Model
{
    use HasFactory;

    public function expense_type(){
        //Definindo relação One-To-Many - falta o $refunds = Refund::with('user')->get();
        return $this->belongsTo(Expense_Type::class);
    }

}
