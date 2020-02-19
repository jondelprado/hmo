<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Coordinator;
use App\User;


class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

      $coordinatorSidebar = array(
        'utility_menu' => 'utility-open',
        'utility_link' => 'utility-active',
        'coordinator_link' => 'coordinator-open'
      );

      $coordinators = Coordinator::all();

      return view('coordinator.index')
        ->with('coordinators', $coordinators)
        ->with($coordinatorSidebar);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $coordinatorSidebar = array(
        'utility_menu' => 'utility-open',
        'utility_link' => 'utility-active',
        'coordinator_link' => 'coordinator-open'
      );

      $coordinators = Coordinator::all();

      return view('coordinator.create')
        ->with('coordinators', $coordinators)
        ->with($coordinatorSidebar);

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

          'coordinator_first' => 'required',
          'coordinator_last' => 'required',
          'coordinator_middle' => '',
          'coordinator_bday' => 'required',
          'coordinator_age' => 'required',
          'coordinator_gender' => 'required',
          'coordinator_address' => 'required',
          'coordinator_telephone' => '',
          'coordinator_mobile' => 'required',
          'coordinator_email' => '',
          'coordinator_empid' => 'required',

        ]);

        $coordinator = new Coordinator;

        $coordinator->employee_id = $request->input('coordinator_empid');
        $coordinator->firstname = $request->input('coordinator_first');
        $coordinator->lastname = $request->input('coordinator_last');
        $coordinator->middlename = $request->input('coordinator_middle');
        $coordinator->bday = $request->input('coordinator_bday');
        $coordinator->age = $request->input('coordinator_age');
        $coordinator->gender = $request->input('coordinator_gender');
        $coordinator->address = $request->input('coordinator_address');
        $coordinator->telephone = $request->input('coordinator_telephone');
        $coordinator->mobile = $request->input('coordinator_mobile');
        $coordinator->email = $request->input('coordinator_email');
        $coordinator->password = $request->input('coordinator_password');

        $coordinator->save();

        $account = new User;

        $account->employee_id = $request->input('coordinator_empid');
        $account->name = $request->input('coordinator_first');
        $account->email = $request->input('coordinator_email');
        $account->password = Hash::make($request->input('coordinator_password'));
        $account->admin = $request->input('coordinator_user');
        $account->save();

        return redirect('http://localhost/hmo/public/utilities/coordinator/create')->with('success', 'Saved Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $coordinatorSidebar = array(
        'utility_menu' => 'utility-open',
        'utility_link' => 'utility-active',
        'coordinator_link' => 'coordinator-open'
      );

      $coordinator = Coordinator::find($id);

      return view('coordinator.view')
        ->with('coordinator', $coordinator)
        ->with($coordinatorSidebar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $coordinatorSidebar = array(
        'utility_menu' => 'utility-open',
        'utility_link' => 'utility-active',
        'coordinator_link' => 'coordinator-open'
      );

      $coordinator = Coordinator::find($id);

      return view('coordinator.edit')
        ->with('coordinator', $coordinator)
        ->with($coordinatorSidebar);

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
          "coordinator_first" => "required",
          "coordinator_last" => "required",
          "coordinator_middle" => "",
          "coordinator_bday" => "required",
          "coordinator_age" => "required",
          "coordinator_gender" => "required",
          "coordinator_address" => "required",
          "coordinator_telephone" => "",
          "coordinator_mobile" => "required",
          "coordinator_email" => "",
          "coordinator_empid" => "required",
        ]);

        $coordinator = Coordinator::find($id);

        $coordinator->firstname = $request->input('coordinator_first');
        $coordinator->lastname = $request->input('coordinator_last');
        $coordinator->middlename = $request->input('coordinator_middle');
        $coordinator->bday = $request->input('coordinator_bday');
        $coordinator->age = $request->input('coordinator_age');
        $coordinator->gender = $request->input('coordinator_gender');
        $coordinator->address = $request->input('coordinator_address');
        $coordinator->telephone = $request->input('coordinator_telephone');
        $coordinator->mobile = $request->input('coordinator_mobile');
        $coordinator->email = $request->input('coordinator_email');
        $coordinator->employee_id = $request->input('coordinator_empid');
        $coordinator->save();

        return redirect()->back()->with('success', 'Edited Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $coordinator = Coordinator::find($id);
      $coordinator->delete();

      $account = User::where('employee_id', $request->input('emp_id'))->delete();
      
      return redirect('http://localhost/hmo/public/utilities/coordinator')->with('success', 'Deleted Successfully!');
    }
}








//
