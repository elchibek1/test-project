<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecordRequest;
use App\Models\Record;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->validate(['user_id' => ['required', 'bail']]);
        $records = Record::where('user_id', $user_id)->get();
        return view('user.records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('user.records.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        Record::create($validated);
        return redirect()->route('user.records.index')->with('message', 'Новая запись создана');
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
        return view('user.records.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecordRequest $request, Record $record): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $record->update($validated);
        return redirect()->route('user.records.index')->with('message', 'Запись изменена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Record $record): \Illuminate\Http\RedirectResponse
    {
        $record->delete();
        return redirect()->route('user.records.index')->with('message', 'Запись удалена');
    }
}
