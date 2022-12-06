<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BossController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:boss.index');
        
    }
    public function index()
    {
        return view('boss.index');
    }
   
    public function create()
    {
     }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        return view('boss.collaborator');
    }

    public function edit($id)
    {
        
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
