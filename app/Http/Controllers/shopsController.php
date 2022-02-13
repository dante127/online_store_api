<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop;
use App\item;
class shopsController extends Controller
{
    
    //get all shops
    public function getAllShops()
    {
        $shops = shop::all();

        $arr['shop'] = $shops;

        return json_encode($arr);
    }


    //get all products inside this shop
     public function getItemInsideShop(Request $req)
     {
         $sid = $req['shop_id'];

        $shops = item::where('shop_id',$sid)->get(); 
        return json_encode($shops);
    }

// get all item details 
    public function itemDetails(Request $req)
    {
        $itemid = $req['item_id'];
        $item = item::where('item_id',$itemid)->get();
        $arr['item'] = $item;
        return json_encode($arr);
    }

//get all shpos in this area
    public function areaShop(Request $req)
    {
        $area = $req['area'];

        $shops  = shop::where('area',$area)->get();

        $arr['shop'] = $shops;
        return json_encode($arr);
    }
    
    //get all areas with number of shops in that area
    public function getAreas()
        {
            $shops = Shop::groupBy('area')->selectRaw('count(*) as shopNumber,area')->get();

            return \json_encode($shops);
        }

    
    //for admin dashboard

    public function getShops()
    {
        $shops = Shop::all();

        $arr['shops'] = $shops;

        return view('admin.shops.index',$arr);  
    }




    public function details($shop_id)
    {
        $shop = Shop::where('shop_id',$shop_id)->first();
        $arr['shop'] = $shop;

        return view('admin.shops.details',$arr);

    }


    
    public function add(Request $req)
    {
        if($req->isMethod('post'))
        {
            $ss = Shop::get()->last();
            $req['shop_id'] = $ss->shop_id + 1;
            Shop::create($req->all());
            return \redirect('shop/i');
        }
        else{
        return view('admin.shops.add');
    }
}



    
public function update(Request $req , $shop_id)
{
  
    $p = Shop::where('shop_id',$shop_id)->first();

    if($req->isMethod('post'))
    {

    $p->update($req->all());
     return redirect('shop/i');
    
    }
    else
    {   
        $arr['shop'] = $p;
        return view('admin.shops.update' , $arr);
    }
}


public function delete($shop_id)
{
    $p = Shop::find($shop_id);

    $p->delete();
    return redirect()->back();
}

//update the rate of shop
public function updateRate(Request $req)
{
    $shop_id = $req['shop_id'];
    $rate = $req['rate'];
    $item = Shop::where('shop_id',$shop_id)->update(['rate'=>$rate]);
    $arr['msg'] = 'updated';
    return json_encode($arr);

}



}