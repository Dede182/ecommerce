<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

use App\Models\Orderitem;
use App\Helpers\MbCalculate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where('id',$request->id)->first();
        // return $orders;

        $user = User::where('id',$orders->user_id)->first();

        if(isset($orders->orderitem)){
            $ordering = $orders->orderitem;

            $sum = [];
            foreach($ordering as $key=>$order){

                if(isset($order->product->discount)){
                    $summer =  MbCalculate::discount($order->product->discount, $order->product->price) * $order->quantity;
                }
                else{
                    $summer = $order->product->price * $order->quantity;
                }
               $sum[$key] = $summer;
            }
            $total = array_sum($sum);

        return view('front.order.index',compact('orders','user','total'));
    }

}

    public function store(StoreOrderRequest $request)
    {
        // return $request;

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->admin_id = User::where('role','admin')->first()->id;
        $order->code =   random_int(10000000, 99999999);
        $order->status  = "Pending";
        $order->total = 0;
        $order->save();

        foreach($request->product as $key=>$pro){
            $orderitem = new Orderitem();
            $orderitem->product_id = $pro;
            $orderitem->order_id = $order->id;
            $orderitem->quantity = $request->quantity[$key];
            $orderitem->save();
            // $orderitem->quantity =
        }

        return redirect()->route('order.index',[$order->id])->with('status','Check your Order');
    }


    public function update(UpdateOrderRequest $request, Order $order)
    {
        // return $request;
        $order->deliveryOption = $request->delivery;
        $order->payment = $request->Payment;
        $order->status = "Pending";
        $order->total = $request->total;
        $order->update();
        return redirect()->route('order.success',[$order->id]) ;
    }

    public function success(Request $request,Order $order){
        return view('front.order.ordersuccess',compact('order'));
    }

    public function history(Request $request){
        // return $request;
        if($request->history){
            $time = $request->history;
            $time = Carbon::now()->subDays($time);
            $orders = Order::where('user_id',Auth::user()->id)->where('created_at','>=',$time)->get();
            // return $orders;
        }
        else{
            $orders = Order::where('user_id',Auth::user()->id)->get();
            // return $orders;
        }
        // return $orders;
        return view('front.orderCheck.index',compact('orders'));
    }
}
