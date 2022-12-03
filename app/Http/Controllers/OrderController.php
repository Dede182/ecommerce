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
        $order->deliveryOption = $request->delivery;
        $order->payment = $request->Payment;
        $order->status = "Pending";
        $order->update();
        return redirect()->route('front')->with("status" , 'Your Order was confirmed and we will take response back to you soon');
    }


    public function history(){
        return view('front.orderCheck.index');
    }
}
