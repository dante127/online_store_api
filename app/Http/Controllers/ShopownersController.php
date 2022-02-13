<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopOwner;
class ShopownersController extends Controller
{
    

 //for admin dashboard

 public function getShops()
 {
     $shops = ShopOwner::all();

     $arr['shopowners'] = $shops;

     return view('admin.shopowners.index',$arr);  
 }


 public function details($mobile)
 {
     $shop = ShopOwner::where('mobile',$mobile)->first();
     $arr['shopowner'] = $shop;

     return view('admin.shopowners.details',$arr);

 }


 
 public function add(Request $req)
 {
     if($req->isMethod('post'))
     {
        $a = ShopOwner::where('user_name',$req['user_name'])->first();
        if($a==null)
        {
        ShopOwner::create($req->all());
         return \redirect('shopowner/i');
        }
        else
        {
            return "the username is already found";
        }
        }
     else{
     return view('admin.shopowners.add');
 }
}



 
public function update(Request $req , $mobile)
{

 $p = ShopOwner::where('mobile',$mobile)->first();

 if($req->isMethod('post'))
 {

 $p->update($req->all());
  return redirect('shopowner/i');
 
 }
 else
 {   
     $arr['shopowner'] = $p;
     return view('admin.shopowners.update' , $arr);
 }
}


public function delete($shop_id)
{
 $p = ShopOwner::find($shop_id);

 $p->delete();
 return redirect()->back();
}






}
