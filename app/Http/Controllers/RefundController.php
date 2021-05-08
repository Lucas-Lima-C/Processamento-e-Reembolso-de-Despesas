<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refund;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RefundController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('refund');
    }

    public function newRefund()
    {
        return view('newRefund');
    }

    public function store(Request $request){

        $sessionRefund_id = 0;
        $sessionUser_id = 0;
        $totalValue = 0;

        //Conferindo se existe um Refund e criando o valor de ID para ser utilizado pelo Expense

        $count = DB::table('refunds')->count();

        if($count == 0 ){
            $sessionRefund_id = 1;
        } else {
            $sessionRefund_id = $count + 1;
        } 

        //Pegando o ID do usuário ativo

        $sessionUser_id = Auth::id();

        //Criando os dados do novo Refund que ainda não vao ser inseridos na DB

        session(['refund' => [
            'id' => $sessionRefund_id,
            'user_id' => $sessionUser_id,
            'totalValue' => 0,
            'status' => 0
        ]]);

        //Inserindo dados iniciais do Reembolso

        $refund = new Refund();
        $refund->id = $sessionRefund_id;
        $refund->user_id = $sessionUser_id;
        $refund->totalValue = 0;
        $refund->status = 0;
        $refund->save();


        //Inserindo as despesas na DB

        for($i = 0; $i < 4; $i++){
            //Checando se tem algum valor inserido
            if($request->input("expensevalue{$i}") != 0){
                $expense = new Expense();
                $expense->refund_id = $refund->id;
                $expense->value = $request->input("expensevalue{$i}");
                $totalValue += $request->input("expensevalue{$i}");
                $expense->expense_type = $request->input("expensetype{$i}");
                $expense->save();
            }
        }

        //Inserindo valor total do Reembolso e salvando

        $refund->totalValue = $totalValue;
        $refund->save();

        return redirect('home/Success');

    }

    public function Success(){
        return view('Success');
    }
}
