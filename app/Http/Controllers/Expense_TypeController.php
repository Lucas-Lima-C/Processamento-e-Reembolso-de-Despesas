<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense_Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Expense_TypeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    } 
    
    public function index() {
        return view('refund');
    }

    public function storeTypeInput(Request $request) {

        $sessionUser_id = Auth::id();
        $userInput = false;

        //Checando para ver se teve algum input

        if($request->input("expense_type_name") != "") {
            $expenseType = new Expense_Type();
            $expenseType->user_id = $sessionUser_id;
            $expenseType->name = $request->input("expense_type_name");
            $expenseType->save();
            $userInput = true;
        }

        if($userInput == true){
            return redirect('home')->with('errortype', "Tipo cadastrado com sucesso!");
        } else {
            return redirect('home')->with('errortype', "Nenhum nome foi digitado, por favor tente novamente.");
        }
    }
}
