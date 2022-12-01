<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;



class AreaManagerController extends Controller 
{
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        return back()->with('message','importancion de usuarios completa');
    }
}
