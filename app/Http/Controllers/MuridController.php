<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MuridStoreRequest;
use App\Http\Requests\MuridUpdateRequest;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $murids = Murid::latest()->paginate(5);
        return view('murids.index', compact('murids'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('murids.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MuridStoreRequest $request)
    {
        Murid::create($request->validated());
        return redirect()->route('murids.index')->with('success', 'Data Murid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(murid $murid):View
    {
        return view('murids.show', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(murid $murid):View
    {
        return view('murids.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MuridUpdateRequest $request, murid $murid):RedirectResponse
    {
        $murid->update($request->validated());
        return redirect()->route('murids.index')->with('success', 'Data Murid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(murid $murid):RedirectResponse
    {
        $murid->delete();
        return redirect()->route('murids.index')
        ->with('success', 'Data Murid berhasil dihapus.');
    }
}
