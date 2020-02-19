<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use Carbon\Carbon;
use App\Coordinator;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalSidebar = array(
          'transaction_menu' => 'transaction-open',
          'transaction_link' => 'transaction-active',
          'contract_menu' => 'contract-open',
          'contract_link' => 'contract-active',
          'hospital_link' => 'hospital-open',
        );

        $hospitals = Hospital::all();

        return view('hospital.index')
          ->with('hospitals', $hospitals)
          ->with($hospitalSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $hospitalSidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'hospital_link' => 'hospital-open',
      );

      $currentDate = Carbon::now();
      $hospitals = Hospital::all();
      $coordinators = Coordinator::all();

      return view('hospital.create')
        ->with('hospitals', $hospitals)
        ->with('coordinators', $coordinators)
        ->with('currentDate', $currentDate)
        ->with($hospitalSidebar);
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
          'hospital_name' => 'required',
          'hospital_coordinator' => 'required',
          'hospital_region' => 'required',
          'hospital_address' => 'required',
          'hospital_specification' => 'required',
          'hospital_contract' => 'required',
          'hospital_end_date' => '',
        ]);

        $hospital = new Hospital;
        $hospital->name = $request->input('hospital_name');
        $hospital->coordinator_id = $request->input('hospital_coordinator');
        $hospital->region = $request->input('hospital_region');
        $hospital->address = $request->input('hospital_address');
        $hospital->specification = $request->input('hospital_specification');
        $hospital->contract = $request->input('hospital_contract');
        $hospital->endo = $request->input('hospital_end_date');
        $hospital->save();

        return redirect('http://localhost/hmo/public/transaction/contract/hospital/create')->with('success', 'Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $hospitalSidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'hospital_link' => 'hospital-open',
      );

      $hospital = Hospital::find($id);

      $coordinator = Coordinator::where('employee_id', $hospital->coordinator_id)->get();

      return view('hospital.view')
        ->with('hospital', $hospital)
        ->with('coordinator', $coordinator)
        ->with($hospitalSidebar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $hospitalSidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'hospital_link' => 'hospital-open',
      );

      $hospital = Hospital::find($id);
      $coordinators = Coordinator::all();

      return view('hospital.edit')
        ->with('hospital', $hospital)
        ->with('coordinators', $coordinators)
        ->with($hospitalSidebar);
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
        'hospital_name' => 'required',
        'hospital_coordinator' => 'required',
        'hospital_region' => 'required',
        'hospital_address' => 'required',
        'hospital_specification' => 'required',
        'hospital_contract' => 'required',
        'hospital_end_date' => '',
      ]);

      $hospital = Hospital::find($id);
      $hospital->name = $request->input('hospital_name');
      $hospital->coordinator_id = $request->input('hospital_coordinator');
      $hospital->region = $request->input('hospital_region');
      $hospital->address = $request->input('hospital_address');
      $hospital->specification = $request->input('hospital_specification');
      $hospital->contract = $request->input('hospital_contract');
      $hospital->endo = $request->input('hospital_end_date');
      $hospital->save();

      return redirect()->back()->with('success', 'Edited Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();

        return redirect('http://localhost/hmo/public/transaction/contract/hospital')->with('success', 'Deleted Successfully!');
    }
}
