<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Status_Type;

class Refund extends Model
{
    use HasFactory;

    public function user(){
        //Definindo relação One-To-Many com os usuários (um usuário pode ter vários refunds /  cada refund só tem um usuário)
        return $this->belongsTo(User::class);
    }

    public function status_type(){
        return $this->belongsTo(Status_Type::class);
    }
}
