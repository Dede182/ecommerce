<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    public function index(){

        $adminId = Auth::user()->id;
        $orders = Order::
        where('admin_id',$adminId)
        ->latest()
        ->paginate(10)
        ->withQueryString();            ;

        return view('dashboard\orderlList\index',compact('orders'));
    }
}
