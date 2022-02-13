<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function getOrdersAndroid ()
    {
        $orders = Order::join('users','orders.user_id','=','users.id')
        ->join('item','orders.item_id','=','item.item_id')
        ->get();
        $arr['orders'] = $orders;
       return json_encode($arr) ;
    }


    //order crud:
    //get orders with username and item name 3 table so we need join 
    public function getOrders()
    {
       
        $orders = Order::join('users','orders.user_id','=','users.id')
        ->join('item','orders.item_id','=','item.item_id')
        ->get();
     
       $arr['orders'] = $orders;
       return view('admin.orders.order',$arr) ;

} 
//this function is to confirm the order and update isConfirmed value 
public function updateOrder(Request $req , $order_id)
{
    if(Session::get('login')==null){
        return redirect('login');
    }
    else
    {
    Order::where('order_id', $order_id)->update(['isConfirmed' => 1]);

    return redirect()->back();
}
}

public function update(Request $req , $order_id)
{
  
    $p = Order::where('order_id',$order_id)->first();

    if($req->isMethod('post'))
    {

    $p->update($req->all());
     return redirect('order/o');
    
    }
    else
    {   
        $arr['order'] = $p;
        return view('admin.orders.update' , $arr);
    }
}

public function delete($order_id)
{
    $p = Order::find($order_id);
    $p->delete();
    return redirect()->back();
}

public function details($order_id)
    {
       $p = Order::join('users','orders.user_id','=','users.id')
       ->join('item','orders.item_id','=','item.item_id')
       ->where('order_id',$order_id)->first();
        $arr['order'] = $p;

        return view('admin.orders.details',$arr);

    }


    public function add(Request $req)
    {
        if($req->isMethod('post'))
        {
            Order::create($req->all());
            return \redirect('order/o');
        }
        return view('admin.orders.add');
    }

//-----------------------------------------------------------------------------------




    //add new order
    public function postOrders(Request $req)
    {

      $item = $req["item_id"];
      $user = $req["user_id"];

      $order = new Order;
      $order->item_id = $item;
      $order ->user_id = $user;
      $order->isConfirmed = 0;
      $order->update();
      $arr['msg'] = "the order is saved and waiting for confirm";
      return json_encode($arr);

}

   public function isConfirmed(Request $req)
   {
    if(Session::get('login')==null){
        return redirect('login');
    }
    else{
       $order = $req['order_id'];
       $orders = Order::where('order_id',$order)->where()->get('isConfirmed',1);
       return json_encode($orders);
   }
}




}
