<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\DpsStatus;
use App\Enums\FdrStatus;
use App\Enums\LoanStatus;
use App\Http\Controllers\Controller;
use App\Models\DpsTransaction;
use App\Models\FDRTransaction;
use App\Models\LoanTransaction;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('frontend.foodzza.user.dashboard');
    }

    public function orders()
    {
        $orders = Order::where('user_id',Auth::id())->get();

        return view('frontend.foodzza.user.dashboard',compact('orders'));
    }
}
