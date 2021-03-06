<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use App\Models\Expense;

class HistoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    } 
    
    public function index() {

        $refunds = Refund::with('user')->with('status_type')->where('status_type_id', 2)->paginate(5);

        return view('history', compact('refunds'));

    }

    public function details($id) {

        $refund = Refund::find($id);

        $expenses = Expense::all()->where('refund_id', $id);

        if(isset($refund)){
            return view('historyDetails', compact('refund'), compact('expenses'));
        }

        return redirect('history');
    }

}
