<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refund;
use App\Models\Expense;
use App\Models\Expense_Type;
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
        $expense_types = Expense_Type::all();
        return view('refund', compact('expense_types'));
    }

    public function storeRefund(Request $request){

        $sessionRefund_id = 0; //Para Expense - count
        $totalValue = 0; //Para Refund
        $userInput = true;
        $userEmptyInput = 0;

        //Conferindo se existe um Refund e criando o valor de ID para ser utilizado pelo Expense (O expense depende de um Refund para ser criado)

        $count = DB::table('refunds')->count();

        if($count == 0 ){
            $sessionRefund_id = 1;
        } else {
            $sessionRefund_id = $count + 1;
        } 

        //Pegando o ID do usuário ativo

        $sessionUser_id = Auth::id();

        //Pegando o ID do status "Pending"

        $status_Types = DB::table('status_types')->where('id', 1)->value('id');

        //Checando se todos os valores foram inseridos corretamente

        for($i = 0; $i < 4; $i++){
            //Se ele colocou um valor mas não colocou um Tipo
            if($request->input("expensevalue{$i}") != 0 && $request->input("expensetype{$i}") == "Tipo") {
                $userInput = false;
                $i = 4;
            } //Se ele colocou um Tipo mas não colocou um valor (0 ou NaN)
            else if($request->input("expensevalue{$i}") == 0 && $request->input("expensetype{$i}") != "Tipo"){
                $userInput = false;
                $i = 4;
            } //Se ele não colocou nenhum valor
            else if($request->input("expensevalue{$i}") == 0 && $request->input("expensetype{$i}") == "Tipo"){
                $userEmptyInput++;
            }
        }

        if($userEmptyInput == 4){
            $userInput = false;
        }

        //Inserindo dados iniciais do -reembolso
        if($userInput == true){
            for($i = 0; $i < 4; $i++){
            //Checando se valores foram digitados na linha
                if($request->input("expensevalue{$i}") != 0 && $request->input("expensetype{$i}") != "Tipo"){
                    $refund = new Refund();
                    $refund->id = $sessionRefund_id;
                    $refund->user_id = $sessionUser_id;
                    $refund->totalValue = 0;
                    $refund->status_type_id = $status_Types;
                    $refund->save();
                    $i = 4;
                }
            }
        }

        //Inserindo as -despesas- na DB
        if($userInput == true){
            for($i = 0; $i < 4; $i++){
            //Checando se valores foram digitados na linha
            if($request->input("expensevalue{$i}") != 0 && $request->input("expensetype{$i}") != "Tipo"){
                    $expense = new Expense();
                    $expense->refund_id = $refund->id;
                    $expense->value = $request->input("expensevalue{$i}");
                    $totalValue += $request->input("expensevalue{$i}");
                    $expense->expense_type_id = $request->input("expensetype{$i}");
                    $expense->save();
                }
            }
        }

        //Inserindo valor total do Reembolso e salvando

        if($userInput == true){
            $refund->totalValue = $totalValue;
            $refund->save();

            return redirect('home')->with('error', "Solicitação de reembolso enviada com sucesso!");
        } else {
            return redirect('home')->with('error', "Houve um erro na sua solicitação, por favor tente novamente.");
        }
    }
}
