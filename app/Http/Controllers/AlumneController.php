<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;
use App\Models\Centre;
use App\Models\Ensenyament;

class AlumneController extends Controller
{
    public function index()
    {
        $alumnes = Alumne::paginate(10);
        return view("alumne", compact("alumnes"));
    }

    public function create()
    {
        $alumne = new Alumne;
        $title = __("Afegir alumne");
        $textButton = __("Afegir");
        $route = route("alumne.store");
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        return view("alumne.create", compact("alumne", "title", "textButton", "route", "centres", "ensenyaments"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "cognoms" => "required",
            "data_naixement" => "required|date",
            "centre_id" => "required",
            "ensenyament_id" => "nullable",
        ]);
        Alumne::create($request->all());
        return redirect(route("alumne.index"))
                ->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha afegit correctament!"));
    }

    public function show(Alumne $alumne)
    {
        return view("alumne.show", compact("alumne"));
    }

    public function edit(Alumne $alumne)
    {
        $update = true;
        $title = __("Editar alumne");
        $textButton = __("Actualitzar");
        $route = route("alumne.update", ["alumne" => $alumne]);
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        return view("alumne.edit", compact("alumne", "update", "title", "textButton", "route", "centres", "ensenyaments"));
    }

    public function update(Request $request, Alumne $alumne)
    {
        $request->validate([
            "nom" => "required",
            "cognoms" => "required",
            "data_naixement" => "required|date",
            "centre_id" => "required",
            "ensenyament_id" => "nullable",
        ]);
        $alumne->update($request->all());
        return back()
            ->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha actualitzat correctament!"));
    }

    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        return back()->with("success", __("L'alumne " . $alumne->nom . " " . $alumne->cognoms . " s'ha eliminat correctament"));
    }
}