<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centres = Centre::paginate(10);
        return view("centre.index", compact("centres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centre = new Centre;
        $title = __("Afegir centre");
        $textButton = __("Afegir");
        $route = route("centre.store");
        return view("centre.create", compact("centre", "title", "textButton", "route"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
        ]);
        Centre::create($request->all());
        return redirect(route("centre.index"))
                ->with("success", __("El centre " . $request->nom . " s'ha afegit correctament!"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Centre $centre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centre $centre)
    {
        $update = true;
        $title = __("Editar centre");
        $textButton = __("Actualitzar");
        $route = route("centre.update", ["centre" => $centre]);
        return view("centre.edit", compact("centre", "update", "title", "textButton", "route"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centre $centre)
    {
        $request->validate([
            "nom" => "required",
        ]);
        $centre->update($request->all());
        return back()
            ->with("success", __("El centre " . $request->nom . " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centre $centre)
    {
        $centre->delete();
        return back()->with("success", __("El centre " . $centre->nom . " s'ha eliminat correctament"));
    }
}