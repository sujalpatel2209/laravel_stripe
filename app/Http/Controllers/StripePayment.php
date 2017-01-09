<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

use App\Http\Requests;

class StripePayment extends Controller
{
    public function payment()
    {
        //$stripe = new Stripe();

        $stripe = Stripe::make(env('STRIPE_SECRET'));


        $card_token = $stripe->tokens()->create([
            'card' => [
                'number'    => '4242424242424242',
                'exp_month' => 6,
                'exp_year'  => 2019,
                'cvc'       => 123,
            ],
        ]);

        echo $token = $card_token['id'];

   //     $customer_detail = $stripe->customers()->find($token);

//        echo "<pre>";
//        print_r($customer_detail);
//        exit;


        $customer = $stripe->customers()->create([
            'email' => 'php2.webmob@gmail.com',
            'source' => $token
        ]);

        $stripe_cus_id = $customer['id'];

        $customer = $stripe->customers()->find($stripe_cus_id);

        echo "<pre>";
        print_r($customer);
        exit;


        /*       echo "<pre>";
               print_r($customer['sources']['data'][0]['brand']);
               exit;

               $price = 75;

               $amount = intval($price) * 100;
               $charge = $stripe->charges()->create([
                   'customer' => $stripe_cus_id,
                   'currency' => 'USD',
                   'amount'   => $amount,
                   'capture' => false // for uncapture amount
               ]);


               echo "<pre>";
               print_r($charge);
               exit;

               $price = 40;
               $amount = intval($price);

               $charge = $stripe->charges()->capture('ch_195VFbBVbMQIIL9fakpwK37H',$amount);


               echo "<pre>";
               print_r($charge);

              // echo $charge['id']; */
    }
}
