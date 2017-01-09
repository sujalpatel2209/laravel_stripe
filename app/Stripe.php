<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cartalyst\Stripe\Billing\Laravel\Billable;
use Cartalyst\Stripe\Billing\Laravel\BillableContract;

class User extends Authenticatable
{
    use Billable;



}
