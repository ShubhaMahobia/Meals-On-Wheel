<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\User;
use App\Models\Member;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\MemberOrder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function index()
    {
        $mealData = Meal::paginate(4);
        return view('Users.Member.memberIndex')->with(['mealData' => $mealData]);
    }

    // public function index2()
    // {
    //     $memberData = Member::paginate(4);
    //     return view('Users.Member.memberIndex')->with(['memberData' => $memberData]);
    // }

    public function detailsMeal($id){
        $mealData = Meal::where('id', $id)->first();
        //$mealData = Meal::FindorFail($id);
        //dd($mealData);
        return view('Users.Member.memberIndex')->with(['mealData' => [$mealData]]);
    }

    public function orderConfirm(){
        return view('Users.Member.OrderConfirm');
    }

    public function partnerDetails($id)
    {
        $partnerData = Partner::where('id', $id)->first();
        return view('Users.Member.memberIndex')->with(['partnerData' => $partnerData]);
    }

    public function memberDetails($id)
    {
        $memberData = Member::where('id', $id)->first();
        return view('Users.Member.memberIndex')->with(['memberData' => $memberData]);
    }


    public function orderMeal($id)
    {
        $memberData = Member::get();
        $partner_data =  Partner::get();

        $user_data = Member::get();
        
        $orderMeal = Meal::where ('id', $id)
                    ->first();
        return view('Users.Member.Order')->with(['orderMeal' => $orderMeal, 'userData' => $user_data, 'partnerData' => $partner_data, 'memberData' => $memberData]);
    }



    public function placeOrder(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'meal_name' => 'required',
            'meal_type' => 'required',
            'meal_image' => 'required',
            'member_address' => 'required',
            'member_name' => 'required',
            'member_phone' => 'required',
            
            
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $memberOrder = new MemberOrder();

        if($request->hasfile('meal_image')){

            $imageFile = $request->file('meal_image');
            $imageName = uniqid().'_'.$imageFile->getClientOriginalName();
            $imageFile->move(public_path().'./uploads/meal', $imageName);

            $memberOrder->meal_image = $imageName;
        }

        $memberOrder->meal_name = $request->input('meal_name');
        $memberOrder->meal_type = $request->input('meal_type');
        $memberOrder->member_name = $request->input('member_name');
        $memberOrder->member_address = $request->input('member_address');
        $memberOrder->member_phone = $request->input('member_phone');
        $memberOrder->meal_image = $request->input($imageName);
        $memberOrder->save();
        return redirect()->route('/')->with(['success', 'Order Placed Sucessfully']);
    }

    public function orderFood(Request $request)
    {
        // Adding the food ordering details in member_orders table
        $member_order = new MemberOrder();

        $file_name='';

        if ($request->hasfile('meal_image')) {

            $imageFile = $request->file('meal_image');
            $imageName = uniqid() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path() . './uploads/meal', $imageName);

            $member_order->meal_image = $imageName;
            $file_name == $imageName;
        }

        $member_order->member_name = $request->input('member_name');
        $member_order->member_address = $request->input('member_address');
        $member_order->member_phone = $request->input('member_phone');
        $member_order->meal_name = $request->input('meal_name');
        $member_order->meal_type = $request->input('meal_type');
        $member_order->meal_image = $file_name;
        $member_order->save();

        return redirect('/member/orderConfirm')->with('success', 'Order Placed successfully');
    }

    
}
