<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RombelStoreRequest;
use App\Http\Requests\RombelUpdateRequest;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombel::latest()->paginate(5);
        return view('rombels.index', compact('rombels'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rombels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RombelStoreRequest $request): RedirectResponse
    {
        Rombel::create($request->validated());

        return redirect()->route('rombels.index')->with('success', 'Data Rombel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        return view('rombels.show', compact('rombel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombel $rombel)
    {
        return view('rombels.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rombel $rombel)
    {
        return redirect()->route('rombels.index')->with('success', 'Data Rombel berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rombel $rombel)
    {
        $rombel->delete();
        return redirect()->route('rombels.index')->with('success', 'Data Rombel berhasil dihapus.');
    }
}
