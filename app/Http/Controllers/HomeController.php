<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('principal.indexpage');
    }
    public function nosotros()
    {
        return view('principal.nosotrospage');
    }
    public function enseña()
    {
        return view('principal.ensenapage');
    }


    public function enterate(){
        return view('principal.enterate.indexenterate');
    }
    public function cumpleanos(){
        return view('principal.enterate.cumpleañosenterate');
    }
    public function novedad(){
        return view('principal.enterate.novedadesenterate');
    }
    public function colaborador(){
        return view('principal.enterate.colaboradorenterate');
    }
    public function convocatoria(){
        return view('principal.enterate.convocatoriasenterate');
    }
    public function identidad(){
        return view('principal.enterate.identidadenterate');
    }


    public function administrativo(){
        return view('principal.directorio.adminstrativodirectorio');    
    }
    public function comercial(){
        return view('principal.directorio.comercialdirectorio');
    }
    
    




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
