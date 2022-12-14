<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    public function index(){

        $adminId = Auth::user()->id;
        $orders = Order:: when(request('search'),function($q){
                $search = request('search');
                $q->orWhere('code' ,'like',"%$search%");
            })
        ->where('admin_id',$adminId)
        ->latest()
        ->paginate(10)
        ->withQueryString();            ;

        return view('dashboard\orderlList\index',compact('orders'));
    }

    public function show(Order $order){
        $orders = $order;
        $user = User::where('id',$orders->user_id)->first();
        return view('dashboard.orderlList.show',compact('orders','user'));
    }

    public function update(Order $order,Request $request){
        $order->status = "Delivered";
        $order->update();
        return redirect()->back()->with('status','Order was delivered');
    }
}
