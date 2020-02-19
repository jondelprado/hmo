<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Standard;
use App\Coverage;
use App\Category;

class ServicesStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $standardSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'services_menu' => 'services-open',
        'services_link' => 'services-active',
        'standard_link' => 'standard-open'
      );

      $standards = Standard::all();
      $coverages = Coverage::all();

      return view('services.standard.index')
        ->with('standards', $standards)
        ->with('coverages', $coverages)
        ->with($standardSidebar);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standardSidebar = array(
          'maintenance_menu' => 'maintenance-open',
          'maintenance_link' => 'maintenance-active',
          'services_menu' => 'services-open',
          'services_link' => 'services-active',
          'standard_link' => 'standard-open'
        );

        $standards = Standard::all();
        $coverages = Coverage::all();
        $categories = Category::all()->where('classification', '=', 'Standard');

        return view('services.standard.create')
          ->with('standards', $standards)
          ->with('coverages', $coverages)
          ->with('categories', $categories)
          ->with($standardSidebar);
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
          'standard_service' => 'required',
          'standard_coverage' => 'required',
        ]);

        $standard = new Standard;
        $standard->standard = $request->input('standard_service');
        $standard->coverage = collect($request->input('standard_coverage'))->implode(',');
        $standard->save();

        return redirect('http://localhost/hmo/public/maintenance/services/standard/create')->with('success', 'Save Successfully!');

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
      $standardSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'services_menu' => 'services-open',
        'services_link' => 'services-active',
        'standard_link' => 'standard-open'
      );

      $standard = Standard::find($id);
      $coverages = Coverage::all();
      $categories = Category::all()->where('classification', '=', 'Standard');

      return view('services.standard.edit')
        ->with('standard', $standard)
        ->with('coverages', $coverages)
        ->with('categories', $categories)
        ->with($standardSidebar);
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
        'standard_service' => 'required',
        'standard_coverage' => 'required',
        'standard_status' => 'required',
      ]);

      $standard = Standard::find($id);
      $standard->standard = $request->input('standard_service');
      $standard->coverage = collect($request->input('standard_coverage'))->implode(',');
      $standard->save();

      return redirect('http://localhost/hmo/public/maintenance/services/standard')->with('success', 'Edited Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $standard = Standard::find($id);
      $standard->delete();
      return redirect('http://localhost/hmo/public/maintenance/services/standard')->with('success', 'Deleted Successfully!');
    }
}













//
