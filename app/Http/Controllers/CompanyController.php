<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Plan;
use App\Standard;
use App\Additional;
use App\PEC;
use App\Membership;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $companySidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'company_link' => 'company-open',
      );

      $companies = Company::all();

      return view('company.index')
        ->with('companies', $companies)
        ->with($companySidebar);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $companySidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'company_link' => 'company-open',
      );

      $companies = Company::all();
      $plans = Plan::all();
      $membership = Membership::where('type', '=', 'Corporate')->first();

      return view('company.create')
        ->with('companies', $companies)
        ->with('plans', $plans)
        ->with('membership', $membership)
        ->with($companySidebar);

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
          'company_name' => 'required',
          'company_address' => 'required',
          'company_plan' => 'required',
          'company_telephone' => 'required',
          'company_mobile' => 'required',
          'company_email' => 'required',
          'company_contract' => 'required',
          'company_endo' => '',
        ]);

        $company = new Company;

        $company->name = $request->input('company_name');
        $company->address = $request->input('company_address');
        $company->plan_id = collect($request->input('company_plan'))->implode(',');
        $company->telephone = $request->input('company_telephone');
        $company->mobile = $request->input('company_mobile');
        $company->email = $request->input('company_email');
        $company->contract = $request->input('company_contract');
        $company->endo = $request->input('company_endo');
        $company->save();

        return redirect('http://localhost/hmo/public/transaction/contract/company/create')->with('success', 'Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $companySidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'company_link' => 'company-open',
      );

      $company = Company::find($id);
      $plans = Plan::all();
      $standards = Standard::all();
      $additionals = Additional::all();
      $pecs = PEC::all();
      $memberships = Membership::all();

      return view('company.view')
        ->with('company', $company)
        ->with('plans', $plans)
        ->with('standards', $standards)
        ->with('additionals', $additionals)
        ->with('pecs', $pecs)
        ->with('memberships', $memberships)
        ->with($companySidebar);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $companySidebar = array(
        'transaction_menu' => 'transaction-open',
        'transaction_link' => 'transaction-active',
        'contract_menu' => 'contract-open',
        'contract_link' => 'contract-active',
        'company_link' => 'company-open',
      );

      $company = Company::find($id);
      $plans = Plan::all();
      $membership = Membership::where('type', '=', 'Corporate')->first();

      return view('company.edit')
        ->with('company', $company)
        ->with('plans', $plans)
        ->with('membership', $membership)
        ->with($companySidebar);
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
        'company_name' => 'required',
        'company_address' => 'required',
        'company_plan' => 'required',
        'company_telephone' => 'required',
        'company_mobile' => 'required',
        'company_email' => 'required',
        'company_contract' => 'required',
        'company_endo' => '',
      ]);

      $company = Company::find($id);

      $company->name = $request->input('company_name');
      $company->address = $request->input('company_address');
      $company->plan_id = collect($request->input('company_plan'))->implode(',');
      $company->telephone = $request->input('company_telephone');
      $company->mobile = $request->input('company_mobile');
      $company->email = $request->input('company_email');
      $company->contract = $request->input('company_contract');
      $company->endo = $request->input('company_endo');
      $company->save();

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
        $company = Company::find($id);
        $company->delete();

        return redirect('http://localhost/hmo/public/transaction/contract/company')->with('success', 'Deleted Successfully!');
    }
}
