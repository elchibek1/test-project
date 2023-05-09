<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecordRequest;
use App\Models\Category;
use App\Models\Record;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $records = Record::where('user_id', Auth::id())->orderBy('date', 'DESC')->paginate(8);
        return view('user.records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $categories = Category::all();
        return view('user.records.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        Record::create(array_merge($validated, ['user_id' => $request->user()->id]));
        return redirect()->route('records.index')->with('message', 'Новая запись создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $categories = Category::all();
        return view('user.records.edit', compact('record', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecordRequest $request, Record $record): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $record->update(array_merge($validated, ['user_id' => $request->user()->id]));
        return redirect()->route('records.index')->with('message', 'Запись изменена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record): \Illuminate\Http\RedirectResponse
    {
        $record->delete();
        return redirect()->route('records.index')->with('message', 'Запись удалена');
    }
}
