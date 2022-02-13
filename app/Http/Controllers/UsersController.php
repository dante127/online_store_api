<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Shop;
use App\Order;
use App\Item;
class UsersController extends Controller
{


    public function dashboard()
    {
      
        return view ('admin.index');
        
    }


    //this register is Api
    public function register(Request $req)
    {

        $username = $req['username'];
     
        $u = User::where('username', $username)->first();
         if($u==null)
         {
          User::create($req->all());
          $arr['msg'] = "register done";  
         }   
         else
         {
          $arr['msg'] = "username is already exsist";  

         }

        return json_encode($arr);
    }

    //this Login Api
        public function Login(Request $req)
        {
            $username = $req['username'];
            $pass = $req['password'];
    
        $l  = User::where('username', $username)->first();
            if($l==null)
            {
                $arr['msg'] = "invalid username";
            }
    

        else{
        $q = User::where('username', $username)->where('password',$pass)->first();
                if($q==null)
                {
                    $arr['msg'] = "invalid password";
                }
                else
                
                $arr['msg'] = $q->id;
            }
    
            return json_encode($arr);
    
        }


        //for admin
        public function getlogin()
        {
            return view("admin.login");
        }

 //for admin

        public function index()
        {
            
            if(Session::get('login')==null){
                return redirect('login')->with('alert','you did not login');
            }
            else
            {
                $orders = Order::count();
                $shops  = Shop::count();
                $users = User::count();
                $items = Item::count();
                $arr['count'] = $orders;
                $arr['shops'] = $shops;
                $arr['users']  = $users;
                $arr['items'] = $items;
                return view('admin.index',$arr);
            }
        }
          //for admin
                public function postlogout()
                {
                    Session::flush();
                    Session::put('login',null);

                    return redirect('login');
                }


        //for admin
        public function postlogin(Request $req)
        {
         

            $user = $req['username'];
            $pass = $req['password'];

            $u = User::where('username',$user)->where('password',$pass)->first();
             
            if($u==null)
              {
                return "invalid username or pass";
              }
            
            else
                {
                Session::put('login','yes');
                return redirect ('index');
                }
            }
        




        public function userInfo(Request $req)
        {
            $id = $req['id'];
            $user = User::where('id',$id)->first();
            $arr['user'] = $user;

            return \json_encode($arr);

        }
    }

