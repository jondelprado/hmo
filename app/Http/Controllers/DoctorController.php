<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DoctorClaim;
use App\DoctorPatient;
use App\DoctorService;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorSidebar = array(
          'claims_menu' => 'claims-open',
          'claims_link' => 'claims-active',
          'doctor_link' => 'doctor-open'
        );

        return view('coordinator.claims.doctor.index')->with($doctorSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $doctorSidebar = array(
        'claims_menu' => 'claims-open',
        'claims_link' => 'claims-active',
        'doctor_link' => 'doctor-open'
      );

      return view('coordinator.claims.doctor.create')->with($doctorSidebar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // $this->validate($request, [
      //   'doctor_first' => 'required',
      //   'doctor_last' => 'required',
      //   'hospital_name' => 'required',
      //   'hospital_address' => 'required',
      //   'doctor_mobile' => 'required',
      //   'patient_first' => 'required',
      //   'patient_last' => 'required',
      //   'patient_card' => 'required',
      //   'patient_service' => 'required',
      //   'patient_amount' => 'required',
      //   'claim_id' => 'required',
      //   'patient_id' => 'required',
      // ]);
      //
      // $doctor_claim = new DoctorClaim;
      // $doctor_claim->firstname = $request->input('doctor_first');
      // $doctor_claim->lastname = $request->input('doctor_last');
      // $doctor_claim->middlename = $request->input('doctor_middle');
      // $doctor_claim->telephone = $request->input('doctor_telephone');
      // $doctor_claim->mobile = $request->input('doctor_mobile');
      // $doctor_claim->hospital_name = $request->input('hospital_name');
      // $doctor_claim->hospital_address = $request->input('hospital_address');
      // $doctor_claim->coordinator_id = "123";
      // $doctor_claim->claim_id = $request->input('claim_id');
      // $doctor_claim->status = "1";
      //
      // $doctor_claim->save();

      $info = [];

      // $info = [
      //   'patient_id' => $request->input('patient_id')
      // ];

      foreach ($request->input('patient_id') as $p) {
        foreach ($request->input('patient_first') as $f) {

          $info[] = [
            'patient_id' => $p,
            'patient_first' => $f
          ];

        }
      }


      // return redirect('http://localhost/hmo/public/claims/doctor/create');

      echo '<pre>' , var_dump($info) , '</pre>';

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
        //
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
