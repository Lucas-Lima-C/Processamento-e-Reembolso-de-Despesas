<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Refund;
use App\Models\Expense;

class HistoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    } 
    
    public function index() {
        $refunds = Refund::with('user')->with('status_type')->get();
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
