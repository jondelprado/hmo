<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Coverage;

class CoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverageSidebar = array(
          'maintenance_menu' => 'maintenance-open',
          'maintenance_link' => 'maintenance-active',
          'coverage_link' => 'coverage-open'
        );

        $coverages = Coverage::all();
        $categories = Category::all();

        return view('coverage.index')->with('coverages', $coverages)->with('categories', $categories)->with($coverageSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coverageSidebar = array(
          'maintenance_menu' => 'maintenance-open',
          'maintenance_link' => 'maintenance-active',
          'coverage_link' => 'coverage-open'
        );

        $coverages = Coverage::all();
        $categories = Category::all();

        return view('coverage.create')->with('coverages', $coverages)->with('categories', $categories)->with($coverageSidebar);
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
          'coverage_category' => 'required',
          'coverage_name' => 'required',
          'coverage_desc' => 'required',
        ]);

        $coverage = new Coverage;
        $coverage->category_id = $request->input('coverage_category');
        $coverage->coverage = $request->input('coverage_name');
        $coverage->description = $request->input('coverage_desc');
        $coverage->save();

        return redirect('http://localhost/hmo/public/maintenance/coverage/create')->with('success', 'Saved Successfully!');
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

      $coverageSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'coverage_link' => 'coverage-open'
      );

      $coverage = Coverage::find($id);
      $categories = Category::all();

      return view('coverage.edit')->with('coverage', $coverage)->with('categories', $categories)->with($coverageSidebar);

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
        'coverage_name' => 'required',
        'coverage_category' => 'required',
        'coverage_desc' => 'required',
      ]);

      $coverage = Coverage::find($id);
      $coverage->coverage = $request->input('coverage_name');
      $coverage->category_id = $request->input('coverage_category');
      $coverage->description = $request->input('coverage_desc');
      $coverage->save();

      return redirect('http://localhost/hmo/public/maintenance/coverage')->with('success', 'Edited Successfully!');

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
