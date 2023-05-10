<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordsCategorySumController extends Controller
{
    public function categoryIndex(Request $request)
    {
        $category_sum = 0;
        $categories = Category::all();
        if ($request['category_id'])
        {
            $category_id = $request->validate(['category_id' => ['bail', 'numeric']]);
            $category_sum = Record::where('user_id', Auth::id())->where('category_id', $category_id)->get();
            $category_sum->sum('total');
        }
        return view('user.records.data-category', compact('categories', 'category_sum'));
    }
}
