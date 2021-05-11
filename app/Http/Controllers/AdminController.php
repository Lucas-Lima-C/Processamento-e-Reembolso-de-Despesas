<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    } //Dentro desse middleware você pode controlar onde o "admin" pode acessar de acordo com o arquivo auth e seus guardas
    
    public function index() {
        //Pegando os Refunds com o Usuário e Status
            $refunds = Refund::with('user')->with('status_type')->where('status_type_id', 1)->paginate(5);
            return view('admin', compact('refunds'));
    }

    public function approve($id) {
        $refund = Refund::all()->find($id); //Encontrando o Refund
        $status_Type_Approved = DB::table('status_types')->where('id', 2)->value('id'); //Encontrando o status Aprovado


        $refund->status_type_id = $status_Type_Approved; //Alterando o status
        $refund->save();
       
        return redirect('admin');
    }

    public function deny($id) {
        $refund = Refund::all()->find($id); //Encontrando o Refund
        $status_Type_Denied = DB::table('status_types')->where('id', 3)->value('id'); //Encontrando o status Aprovado


        $refund->status_type_id = $status_Type_Denied; //Alterando o status
        $refund->save();
       
        return redirect('admin');
    }

    public function details($id) {

        $refund = Refund::find($id);

        $expenses = Expense::all()->where('refund_id', $id);

        if(isset($refund)){
            return view('details', compact('refund'), compact('expenses'));
        }

        return redirect('admin');
    }
}
