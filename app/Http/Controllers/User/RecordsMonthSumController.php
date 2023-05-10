<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordsMonthSumController extends Controller
{
    public function monthIndex(Request $request)
    {
        $month_sum_income = 0;
        $month_sum_expense = 0;

        if ($request['month'] && $request['year'])
        {
            $month = $request->validate(['month' => ['bail', 'numeric']]);
            $year = $request->validate(['year' => ['bail', 'numeric']]);
            $month_sum = Record::where('user_id', Auth::id())->whereMonth('date', $month)->whereYear('date', $year)->get();

            $month_sum_income = $month_sum->where('kind', "income")->sum('total');
            $month_sum_expense = $month_sum->where('kind', "expense")->sum('total');
        }
        return view('user.records.data-month',
            compact('month_sum_income',
                'month_sum_expense'));

    }
}
