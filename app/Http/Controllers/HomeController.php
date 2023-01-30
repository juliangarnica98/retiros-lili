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
    public function fundacion(){
        return view('principal.fundacion.indexfundacion');
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




    public function enyoiadministrativo(){
        return view('principal.enyoiconlili.enyoiadministrativo');
    }
    public function enyoicedi(){
        return view('principal.enyoiconlili.enyoicedi');
    }
    public function enyoicomercial(){
        return view('principal.enyoiconlili.enyoicomercial');
    }
    public function enyoipermisos(){
        return view('principal.enyoiconlili.enyoipermisos');
    }
    public function enyoiprestamos(){
        return view('principal.enyoiconlili.enyoiprestamos');
    }
    public function enyoibienestar(){
        return view('principal.enyoiconlili.enyoibienestar');
    }
    
    
    

    
}