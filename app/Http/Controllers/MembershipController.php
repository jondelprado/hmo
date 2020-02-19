<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $membershipSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'membership_link' => 'membership-open'
      );

      $memberships = Membership::all();

      return view('membership.index')
        ->with('memberships', $memberships)
        ->with($membershipSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $membershipSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'membership_link' => 'membership-open'
      );

      $memberships = Membership::all();

      return view('membership.create')
        ->with('memberships', $memberships)
        ->with($membershipSidebar);
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
        'membership_type' => 'required',
        'membership_interest' => 'required',
        'membership_desc' => 'required',
      ]);

      $membership = new Membership;
      $membership->type = $request->input('membership_type');
      $membership->interest = $request->input('membership_interest');
      $membership->description = $request->input('membership_desc');
      $membership->save();

      return redirect('http://localhost/hmo/public/maintenance/membership/create')->with('success', 'Saved Successfully!');
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
      $membershipSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'membership_link' => 'membership-open'
      );

      $membership = Membership::find($id);

      return view('membership.edit')
        ->with('membership', $membership)
        ->with($membershipSidebar);
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
        'membership_type' => 'required',
        'membership_interest' => 'required',
        'membership_desc' => 'required',
      ]);

      $membership = Membership::find($id);
      $membership->type = $request->input('membership_type');
      $membership->interest = $request->input('membership_interest');
      $membership->description = $request->input('membership_desc');
      $membership->save();

      return redirect('http://localhost/hmo/public/maintenance/membership')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::find($id);
        $membership->delete();

        return redirect('http://localhost/hmo/public/maintenance/membership')->with('success', 'Deleted Successfully!');
    }
}
