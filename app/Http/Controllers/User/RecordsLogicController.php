<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordsLogicController extends Controller
{
    public function data()
    {
        $income = $this->income();
        $expense = $this->expense();
        $report = $this->report();
        return view('user.records.data', compact('income', 'expense', 'report'));
    }

    public function income()
    {
        $incomes = Record::where('user_id', Auth::id())->where('kind', 'income')->get();
        return $incomes->sum("total");
    }

    public function expense()
    {
        $expenses = Record::where('user_id', Auth::id())->where('kind', 'expense')->get();
        return $expenses->sum("total");
    }

    public function report()
    {
        return $this->income() - $this->expense();
    }
}
