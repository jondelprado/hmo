<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoctorClaim;
use App\DoctorPatient;
use App\DoctorService;
use App\Coordinator;

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

        $doctorClaims = DoctorClaim::all();

        return view('coordinator.claims.doctor.index')
          ->with('claims', $doctorClaims)
          ->with($doctorSidebar);
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

      $doctorClaims = DoctorClaim::all();

      return view('coordinator.claims.doctor.create')
        ->with('claims', $doctorClaims)
        ->with($doctorSidebar);

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
        'doctor_first' => 'required',
        'doctor_last' => 'required',
        'hospital_name' => 'required',
        'hospital_address' => 'required',
        'doctor_mobile' => 'required',
        'patient_first' => 'required',
        'patient_last' => 'required',
        'patient_card' => 'required',
        'patient_service' => 'required',
        'patient_amount' => 'required',
        'claim_id' => 'required',
        'patient_id' => 'required',
      ]);

      $doctor_claim = new DoctorClaim;
      $doctor_claim->firstname = $request->input('doctor_first');
      $doctor_claim->lastname = $request->input('doctor_last');
      $doctor_claim->middlename = $request->input('doctor_middle');
      $doctor_claim->telephone = $request->input('doctor_telephone');
      $doctor_claim->mobile = $request->input('doctor_mobile');
      $doctor_claim->hospital_name = $request->input('hospital_name');
      $doctor_claim->hospital_address = $request->input('hospital_address');
      $doctor_claim->coordinator_id = "123";
      $doctor_claim->claim_id = $request->input('claim_id');
      $doctor_claim->status = "1";

      $doctor_claim->save();

      foreach ($request->input('patient_id') as $patient_id => $id) {

        $patient = new DoctorPatient();

        $patient->firstname = $request->input('patient_first')[$patient_id];
        $patient->lastname = $request->input('patient_last')[$patient_id];
        $patient->middlename = $request->input('patient_middle')[$patient_id];
        $patient->card_id = $request->input('patient_card')[$patient_id];
        $patient->patient_id = $request->input('patient_id')[$patient_id];
        $patient->claim_id = $request->input('claim_id');
        $patient->amount = $request->input('patient_amount')[$patient_id];

        $patient->save();

        foreach ($request->input('patient_service') as $patient_service => $service) {

          $service = new DoctorService();

          $service->service_name = $request->input('patient_first')[$patient_service];
          $service->patient_id = $request->input('patient_id')[$patient_service];

          $service->save();

        }
      }


      return redirect('http://localhost/hmo/public/claims/doctor/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $doctorSidebar = array(
        'claims_menu' => 'claims-open',
        'claims_link' => 'claims-active',
        'doctor_link' => 'doctor-open'
      );

      $doctor = DoctorClaim::find($id);

      $coordinator = Coordinator::where('employee_id', $doctor->coordinator_id)->get();
      $patient = DoctorPatient::where('claim_id', $doctor->claim_id)->get();

      $patientID = [];

      foreach ($patient as $pat) {
        $patientID[] = $pat->patient_id;
      }

      $services = DoctorService::whereIn('patient_id', $patientID)->get();


      // echo '<pre>';
      // echo var_dump($patientID);
      // echo '</pre>';

      return view('coordinator.claims.doctor.view')
        ->with('doctor', $doctor)
        ->with('patient', $patient)
        ->with('services', $services)
        ->with('coordinator', $coordinator)
        ->with($doctorSidebar);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $doctorSidebar = array(
        'claims_menu' => 'claims-open',
        'claims_link' => 'claims-active',
        'doctor_link' => 'doctor-open'
      );

      return view()


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
