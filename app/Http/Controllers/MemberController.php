<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Membership;
use App\Company;
use App\Plan;
use App\Standard;
use App\Additional;
use App\PEC;
use App\Dependent;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $memberSidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'member_link' => 'member-open',
      );

      $members = Member::all();

      return view('member.index')
        ->with('members', $members)
        ->with($memberSidebar);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $memberSidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'member_link' => 'member-open',
      );

      $members = Member::all('firstname', 'lastname', 'middlename', 'created_at');
      $memberships = Membership::all();
      $pecs = PEC::all();

      return view('member.create')
        ->with('members', $members)
        ->with('memberships', $memberships)
        ->with('pecs',$pecs)
        ->with($memberSidebar);
    }

    //FOR AJAX REQUESTS
    public function retrieveMembership(Request $request){

      $id = $request->membership_id;
      $type = $request->membership_type;

      if ($type == "Corporate") {
        $companies = Company::all('id', 'name', 'plan_id');
        return response()->json($companies);
      }
      else {
        $plans = Plan::where('membership_id', 'like', '%'.$id.'%')->get();
        return response()->json($plans);
      }


    }

    public function retrieveCompanyPlan(Request $request){

      $id = explode(',',$request->company_plan);

      $plans = Plan::whereIn('id', $id)->get();

      return response()->json($plans);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = (array)$request->name;

        if (!empty($name)) {

          $dependents = array();

          for ($i=0; $i < count($name); $i++) {
            $dependents[] = [
              'dependent_id' => $request->id,
              'name' => $request->name[$i],
              'bday' => $request->bday[$i],
              'relationship' => $request->relationship[$i],
              'civil' => $request->civil[$i]
            ];
          }

          Dependent::insert($dependents);

        }

        $this->validate($request, [
          'member_first' => 'required',
          'member_last' => 'required',
          'member_middle' => '',
          'member_bday' => 'required',
          'member_age' => 'required',
          'member_height' => 'required',
          'member_weight' => 'required',
          'member_gender' => 'required',
          'member_civil' => 'required',
          'member_address' => 'required',
          'member_occupation' => 'required',
          'member_telephone' => '',
          'member_mobile' => 'required',
          'member_email' => 'required',
          'member_membership' => 'required',
          'member_company' => '',
          'member_plan' => 'required',
          'member_frequency' => '',
          'member_payment' => '',
          'member_endo' => 'required',
          'member_pec' => '',
        ]);

        $member = new Member;

        $explode_membership = explode('|', $request->input('member_membership'));
        $explode_company = explode('|', $request->input('member_company'));
        $explode_plan = explode('|', $request->input('member_plan'));
        $explode_frequency = explode('|', $request->input('member_frequency'));

        $member->firstname = $request->input('member_first');
        $member->lastname = $request->input('member_last');
        $member->middlename = $request->input('member_middle');
        $member->bday = $request->input('member_bday');
        $member->age = $request->input('member_age');
        $member->height = $request->input('member_height');
        $member->weight = $request->input('member_weight');
        $member->gender = $request->input('member_gender');
        $member->civil = $request->input('member_civil');
        $member->address = $request->input('member_address');
        $member->occupation = $request->input('member_occupation');
        $member->telephone = $request->input('member_telephone');
        $member->mobile = $request->input('member_mobile');
        $member->email = $request->input('member_email');
        $member->membership_id = $explode_membership[0];
        $member->company_id = $explode_company[0];
        $member->plan_id = $explode_plan[2];
        $member->frequency = $explode_frequency[0];
        $member->payment = $request->input('member_payment');
        $member->endo = $request->input('member_endo');
        $member->pec_id = collect($request->input('member_pec'))->implode(',');
        $member->dependent_id = $request->input('dependent_id');
        $member->save();



        return redirect('http://localhost/hmo/public/transaction/contract/member/create')->with('success', 'Saved Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $memberSidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'member_link' => 'member-open',
      );

      $member = Member::find($id);
      $membership = Membership::find($member->membership_id);
      $company = Company::find($member->company_id);
      $plan = Plan::find($member->plan_id);
      $dependents = Dependent::where('dependent_id', $member->dependent_id)->get();

      $explode_plan_standard = explode(',', $plan->standard_id);
      $explode_plan_additional = explode(',', $plan->additional_id);
      $explode_plan_pec = explode(',', $plan->pec_id);
      $explode_member_pec = explode(',', $member->pec_id);

      $standards = Standard::whereIn('id', $explode_plan_standard)->get();
      $additionals = Additional::whereIn('id', $explode_plan_additional)->get();
      $pecs = PEC::whereIn('id', $explode_plan_pec)->get();
      $memberpecs = PEC::whereIn('id', $explode_member_pec)->get();

      return view('member.view')
        ->with('member', $member)
        ->with('membership', $membership)
        ->with('company', $company)
        ->with('plan', $plan)
        ->with('standards', $standards)
        ->with('additionals', $additionals)
        ->with('pecs', $pecs)
        ->with('memberpecs', $memberpecs)
        ->with('dependents', $dependents)
        ->with($memberSidebar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $memberSidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'member_link' => 'member-open',
      );

      $member = Member::find($id);
      $memberships = Membership::all();
      $pecs = PEC::all();
      $dependents = Dependent::where('dependent_id', $member->dependent_id)->get();

      return view('member.edit')
        ->with('member', $member)
        ->with('memberships', $memberships)
        ->with('pecs',$pecs)
        ->with('dependents', $dependents)
        ->with($memberSidebar);
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

      $counter = (array)$request->input('dependent_row_id');

      if (!empty($counter)) {
        for ($i=0; $i < count($counter); $i++) {
          $row = $request->input('dependent_row_id')[$i];
          $name = $request->input('current_dependent_name')[$i];
          $bday = $request->input('current_dependent_bday')[$i];
          $relationship = $request->input('current_dependent_relationship')[$i];
          $civil = $request->input('current_dependent_civil')[$i];

          Dependent::where('id', $row)->update(array('name' => $name, 'bday' => $bday, 'relationship' => $relationship, 'civil' => $civil));
        }
      }

      if (!empty($request->input('dependent_id'))) {

        $dependent_id = $request->input('dependent_id');

        Member::where('id', $id)->update(['dependent_id' => $dependent_id]);
      }

      $this->validate($request, [
        'member_first' => 'required',
        'member_last' => 'required',
        'member_middle' => '',
        'member_bday' => 'required',
        'member_age' => 'required',
        'member_height' => 'required',
        'member_weight' => 'required',
        'member_gender' => 'required',
        'member_civil' => 'required',
        'member_address' => 'required',
        'member_occupation' => 'required',
        'member_telephone' => '',
        'member_mobile' => 'required',
        'member_email' => 'required',
        'member_membership' => 'required',
        'member_company' => '',
        'member_plan' => 'required',
        'member_frequency' => '',
        'member_payment' => '',
        'member_endo' => 'required',
        'member_pec' => '',
      ]);

      $member = Member::find($id);

      $explode_membership = explode('|', $request->input('member_membership'));
      $explode_company = explode('|', $request->input('member_company'));
      $explode_plan = explode('|', $request->input('member_plan'));
      $explode_frequency = explode('|', $request->input('member_frequency'));

      $member->firstname = $request->input('member_first');
      $member->lastname = $request->input('member_last');
      $member->middlename = $request->input('member_middle');
      $member->bday = $request->input('member_bday');
      $member->age = $request->input('member_age');
      $member->height = $request->input('member_height');
      $member->weight = $request->input('member_weight');
      $member->gender = $request->input('member_gender');
      $member->civil = $request->input('member_civil');
      $member->address = $request->input('member_address');
      $member->occupation = $request->input('member_occupation');
      $member->telephone = $request->input('member_telephone');
      $member->mobile = $request->input('member_mobile');
      $member->email = $request->input('member_email');
      $member->membership_id = $explode_membership[0];
      $member->company_id = $explode_company[0];
      $member->plan_id = $explode_plan[2];
      $member->frequency = $explode_frequency[0];
      $member->payment = $request->input('member_payment');
      $member->endo = $request->input('member_endo');
      $member->pec_id = collect($request->input('member_pec'))->implode(',');
      $member->save();

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
        $member = Member::find($id);
        $dependent = Dependent::where('dependent_id', $member->dependent_id)->delete();

        $member->delete();

        return redirect('http://localhost/hmo/public/transaction/contract/member')->with('success', 'Deleted Successfully!');
    }
}
