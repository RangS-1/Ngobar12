<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RayonStoreRequest;
use App\Http\Requests\RayonUpdateRequest;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::latest()->paginate(5);
        return view('rayons.index', compact('rayons'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rayons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RayonStoreRequest $request): RedirectResponse
    {
        Rayon::create($request->validated());

        return redirect()->route('rayons.index')->with('success', 'Data Rayon berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        return view('rayons.show', compact('rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon)
    {
        return view('rayons.edit', compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RayonUpdateRequest $request, Rayon $rayon): RedirectResponse
    {
        $rayon->update($request->validated());

        return redirect()->route('rayons.index')->with('success', 'Data Rayon berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();
        return redirect()->route('rayons.index')->with('success', 'Data Rayon berhasil dihapus.');
    }
}
