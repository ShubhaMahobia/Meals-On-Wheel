@section('title')
    Order Meal
@endsection

@extends('Users.Member.layouts.app')

@section('content')
<style type="text/css">
    #createm{
        max-width: 500px;
        padding: 20px;
        height: auto;
        margin: 50px auto;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.1);
    }
</style>
<!-- Start content -->
<div class="container ">
    <div class="row ">
        <div class="col col-md-6">
        <form action={{ Route('member#foodorder') }} method="post">
            @csrf
            <div class="form-group form-floating">
                <input type="text" class="form-control" name="meal_name" value={{$orderMeal->meal_name}} readonly>
                <label for="meal_name">Meal Name</label>
            </div><br />

            <div class="form-group form-floating">
                <br><br><img src="{{asset('uploads/meal/'.$orderMeal->meal_image)}}" class="img-thumbnail" width="150px" height="150px" alt="Images" name="meal_image">
                <label for="name">Meal Image</label>
            </div><br />

            <div class="form-group form-floating">
                <input type="text" class="form-control" name="meal_type" value={{$orderMeal->meal_type}} readonly >
                <label for="meal_type">Meal Type</label>
            </div><br />

            <div class="form-group form-floating">
                <input type="text" class="form-control" name="member_name" value={{auth()->user()->name}} required>
                <label for="name">Member Name</label>
            </div><br />
            <div class="form-group form-floating">
                <input type="text" class="form-control" name="member_phone" value={{auth()->user()->phone}} required>
                <label for="name">Member Phone no.</label>
            </div><br />
            
            <div class="form-group form-floating">
                <input class="form-control" name="member_address" id="address" value={{auth()->user()->address}} onchange="getCoordinates()" required>
                <label for="name"> Member Address <span class="text-muted">(Write the delivery address)</span> </label>
            </div><br />

            <button type="submit" class="btn btn-success col-md-4 btn-lg">Order Now</button>

        </form>    
        
        <?php   
                                    function twopoints_on_earth($Partner_latitude, $Partner_longitude,
                                    $Member_latitude,  $Member_longitude)
                                    {
                                        $long1 = deg2rad($Partner_longitude);
                                        $long2 = deg2rad($Member_longitude);
                                        $lat1 = deg2rad($Partner_latitude);
                                        $lat2 = deg2rad($Member_latitude);
                                        
                                        //Haversine Formula
                                        $dlong = $long2 - $long1;
                   $dlati = $lat2 - $lat1;
                   
                   $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
                   
                   $res = 2 * asin(sqrt($val));
                   
                   $radius = 3958.756;
                   
                   return ($res*$radius);
                }
                
                // latitude and longitude of Two Points
                $Partner_latitude =  $orderMeal->meal_partner_latitude;
                $Partner_longitude = $orderMeal->meal_partner_longitude;
                $Member_latitude = 22.74472222;
                $Member_longitude = 77.73000000;
                
                //print_r(twopoints_on_earth( $Partner_latitude, $Partner_longitude,
              //$Member_latitude,  $Member_longitude)*1.609344.' '.'Km');  
              
              $final_dist = twopoints_on_earth( $Partner_latitude, $Partner_longitude,
              $Member_latitude,  $Member_longitude)*1.609344;
              if($final_dist > "10"){
                  echo "<p style='font-weight: bold'>" . 'NOTE : ' .'Distance from partner to your house is'. ' ' .$final_dist %1000 . ' ' . 'km'.' '. ',hence you will get a Frozen meal. Enjoy your meal. Thank you' . "</p>";
                }else {
                    echo "<p style='font-weight: bold'>" . 'NOTE : ' .'Distance from partner to your house is'. ' ' .$final_dist %1000 . ' ' . 'km'.' '. ',hence you will get a Hot meal. Enjoy your meal. Thank you' . "</p>";
                }
                ?> 
        </div>
    </div>
</div>
<!-- End content-->
@endsection
