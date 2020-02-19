<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $requirementSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'requirement_link' => 'requirement-open'
      );

      $requirements = Requirement::all();

      return view('requirement.index')
        ->with('requirements', $requirements)
        ->with($requirementSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $requirementSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'requirement_link' => 'requirement-open'
      );

      $requirements = Requirement::all();

      return view('requirement.create')
        ->with('requirements', $requirements)
        ->with($requirementSidebar);
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
          'requirement_name' => 'required',
          'requirement_type' => 'required',
          'requirement_desc' => 'required',
        ]);

        $requirement = new Requirement;
        $requirement->requirement = $request->input('requirement_name');
        $requirement->type = $request->input('requirement_type');
        $requirement->description = $request->input('requirement_desc');
        $requirement->save();

        return redirect('http://localhost/hmo/public/maintenance/requirement/create')->with('success', 'Saved Successfully!');
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
      $requirementSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'requirement_link' => 'requirement-open'
      );

      $requirement = Requirement::find($id);

      return view('requirement.edit')
        ->with('requirement', $requirement)
        ->with($requirementSidebar);
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
        'requirement_name' => 'required',
        'requirement_type' => 'required',
        'requirement_desc' => 'required',
      ]);

      $requirement = Requirement::find($id);
      $requirement->requirement = $request->input('requirement_name');
      $requirement->type = $request->input('requirement_type');
      $requirement->description = $request->input('requirement_desc');
      $requirement->save();

      return redirect('http://localhost/hmo/public/maintenance/requirement')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requirement = Requirement::find($id);
        $requirement->delete();

        return redirect('http://localhost/hmo/public/maintenance/requirement')->with('success', 'Edited Successfully!');
    }
}
