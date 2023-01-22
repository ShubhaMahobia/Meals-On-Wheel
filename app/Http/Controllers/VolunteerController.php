<?php

namespace App\Http\Controllers;

use App\Models\MemberOrder;
use Illuminate\Http\Request;
use App\Models\VolunteerMember;

class VolunteerController extends Controller
{
    //index
    public function index(){
        $mealOrder = MemberOrder::get();
        return view('Users.Volunteer.volunteerIndex')->with(['order' => $mealOrder]);
    }

    //volunteer details page
    public function volunteerDetails($id){
        $mealData = MemberOrder::where('id', $id)->first();
        return view('Users.Volunteer.volunteerDetails')->with(['meal' => $mealData]);
    }

    //volunteer choosing member
    public function volunteerMember(Request $request){
        $volunteerMember = new VolunteerMember();

        $volunteerMember->member_name = $request->input('member_name');
        $volunteerMember->member_address = $request->input('member_address');
        $volunteerMember->meal_name = $request->input('meal_name');
        $volunteerMember->meal_type = $request->input('meal_type');
        $volunteerMember->partner_organizations = $request->input('partner_organizations');
        $volunteerMember->partner_address = $request->input('partner_address');
        $volunteerMember->type_of_meal = $request->input('type_of_meal');
        $volunteerMember->volunteer_name = $request->input('volunteer_name');
        $volunteerMember->save();

        return redirect()->route('volunteer#index');
    }
}
