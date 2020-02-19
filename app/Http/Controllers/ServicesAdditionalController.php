<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Additional;
use App\Coverage;
use App\Category;

class ServicesAdditionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $additionalSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'services_menu' => 'services-open',
        'services_link' => 'services-active',
        'additional_link' => 'additional-open'
      );

      $additionals = Additional::all();
      $coverages = Coverage::all();

      return view('services.additional.index')
        ->with('additionals', $additionals)
        ->with('coverages', $coverages)
        ->with($additionalSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $additionalSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'services_menu' => 'services-open',
        'services_link' => 'services-active',
        'additional_link' => 'additional-open'
      );

      $additionals = Additional::all();
      $coverages = Coverage::all();
      $categories = Category::all()->where('classification', '=', 'Additional');

      return view('services.additional.create')
        ->with('additionals', $additionals)
        ->with('coverages', $coverages)
        ->with('categories', $categories)
        ->with($additionalSidebar);

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
        'additional_service' => 'required',
        'additional_coverage' => 'required',
      ]);

      $additional = new Additional;
      $additional->additional = $request->input('additional_service');
      $additional->coverage = collect($request->input('additional_coverage'))->implode(',');
      $additional->save();

      return redirect('http://localhost/hmo/public/maintenance/services/additional/create')->with('success', 'Save Successfully!');
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
      $additionalSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'services_menu' => 'services-open',
        'services_link' => 'services-active',
        'additional_link' => 'additional-open'
      );

      $additional = Additional::find($id);
      $coverages = Coverage::all();
      $categories = Category::all()->where('classification', '=', 'Additional');

      return view('services.additional.edit')
        ->with('additional', $additional)
        ->with('coverages', $coverages)
        ->with('categories', $categories)
        ->with($additionalSidebar);
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
        'additional_service' => 'required',
        'additional_coverage' => 'required',
      ]);

      $additional = Additional::find($id);
      $additional->additional = $request->input('additional_service');
      $additional->coverage = collect($request->input('additional_coverage'))->implode(',');
      $additional->save();

      return redirect('http://localhost/hmo/public/maintenance/services/additional')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $additional = Additional::find($id);
      $additional->delete();

      return redirect('http://localhost/hmo/public/maintenance/services/additional')->with('success', 'Deleted Successfully!');
    }
}
