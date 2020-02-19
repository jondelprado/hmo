<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Standard;
use App\Additional;
use App\PEC;
use App\Membership;
use App\Coverage;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $planSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'plan_link' => 'plan-open'
      );

      $plans = Plan::all();
      $memberships = Membership::all();

      return view('plan.index')
        ->with('plans', $plans)
        ->with('memberships', $memberships)
        ->with($planSidebar);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $planSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'plan_link' => 'plan-open'
      );

      $plans = Plan::all();
      $standards = Standard::all();
      $additionals = Additional::all();
      $pecs = PEC::all();
      $memberships = Membership::all();

      return view('plan.create')
        ->with('plans', $plans)
        ->with('standards', $standards)
        ->with('additionals', $additionals)
        ->with('pecs', $pecs)
        ->with('memberships', $memberships)
        ->with($planSidebar);

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
          'plan_name' => 'required',
          'plan_hospital' => 'required',
          'plan_standard' => 'required',
          'plan_additional' => '',
          'plan_pec' => '',
          'plan_membership' => 'required',
          'plan_benefit' => 'required',
          'plan_annual' => 'required',
        ]);

        $plan = new Plan;
        $plan->plan = $request->input('plan_name');
        $plan->hospital = collect($request->input('plan_hospital'))->implode(',');
        $plan->standard_id = collect($request->input('plan_standard'))->implode(',');
        $plan->additional_id = collect($request->input('plan_additional'))->implode(',');
        $plan->pec_id = collect($request->input('plan_pec'))->implode(',');
        $plan->membership_id = collect($request->input('plan_membership'))->implode(',');
        $plan->benefit = $request->input('plan_benefit');
        $plan->annual = $request->input('plan_annual');
        $plan->save();

        return redirect('http://localhost/hmo/public/maintenance/plan/create')->with('success', 'Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $planSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'plan_link' => 'plan-open'
      );

      $plan = Plan::find($id);
      $coverages = Coverage::all();
      $standards = Standard::all();
      $additionals = Additional::all();
      $pecs = PEC::all();
      $memberships = Membership::all();

      return view('plan.view')
        ->with('plan', $plan)
        ->with('coverages', $coverages)
        ->with('standards', $standards)
        ->with('additionals', $additionals)
        ->with('pecs', $pecs)
        ->with('memberships', $memberships)
        ->with($planSidebar);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $planSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'plan_link' => 'plan-open'
      );

      $plan = Plan::find($id);
      $standards = Standard::all();
      $additionals = Additional::all();
      $pecs = PEC::all();
      $memberships = Membership::all();

      return view('plan.edit')
        ->with('plan', $plan)
        ->with('standards', $standards)
        ->with('additionals', $additionals)
        ->with('pecs', $pecs)
        ->with('memberships', $memberships)
        ->with($planSidebar);
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
        'plan_name' => 'required',
        'plan_hospital' => 'required',
        'plan_standard' => 'required',
        'plan_additional' => '',
        'plan_pec' => '',
        'plan_membership' => 'required',
        'plan_benefit' => 'required',
        'plan_annual' => 'required',
      ]);

      $plan = Plan::find($id);
      $plan->plan = $request->input('plan_name');
      $plan->hospital = collect($request->input('plan_hospital'))->implode(',');
      $plan->standard_id = collect($request->input('plan_standard'))->implode(',');
      $plan->additional_id = collect($request->input('plan_additional'))->implode(',');
      $plan->pec_id = collect($request->input('plan_pec'))->implode(',');
      $plan->membership_id = collect($request->input('plan_membership'))->implode(',');
      $plan->benefit = $request->input('plan_benefit');
      $plan->annual = $request->input('plan_annual');
      $plan->save();

      return redirect('http://localhost/hmo/public/maintenance/plan')->with('success', 'Saved Successfully!');
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
