<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PEC;

class PECController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pecSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'pec_link' => 'pec-open'
      );

      $pecs = PEC::all();

      return view('pec.index')
        ->with('pecs', $pecs)
        ->with($pecSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pecSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'pec_link' => 'pec-open'
      );

      $pecs = PEC::all();

      return view('pec.create')
        ->with('pecs', $pecs)
        ->with($pecSidebar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'pec_name' => 'required',
        'pec_desc' => 'required',
      ]);

      $pecs = new PEC;
      $pecs->condition = $request->input('pec_name');
      $pecs->description = $request->input('pec_desc');
      $pecs->save();

      return redirect('http://localhost/hmo/public/maintenance/pre-existing-condition/create')->with('success', 'Saved Successfully!');
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
      $pecSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'pec_link' => 'pec-open'
      );

      $pec = PEC::find($id);

      return view('pec.edit')
        ->with('pec', $pec)
        ->with($pecSidebar);
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
      $this->validate($request, [
        'pec_name' => 'required',
        'pec_desc' => 'required',
      ]);

      $pec = PEC::find($id);
      $pec->condition = $request->input('pec_name');
      $pec->description = $request->input('pec_desc');
      $pec->save();

      return redirect('http://localhost/hmo/public/maintenance/pre-existing-condition')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pec = PEC::find($id);
      $pec->delete();
      return redirect('http://localhost/hmo/public/maintenance/pre-existing-condition')->with('success', 'Deleted Successfully!');
    }
}
