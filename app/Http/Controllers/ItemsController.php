<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Comment;
class ItemsController extends Controller
{
    public function getItems()
    {
        $items = Item::all();

        $arr['items'] = $items;

        return view('admin.items.index',$arr);
    }




    public function details($item_id)
    {
        $item = Item::where('item_id',$item_id)->first();
        $arr['item'] = $item;

        return view('admin.items.details',$arr);

    }


    
    public function add_item(Request $req)
    {
        if($req->isMethod('post'))
        {
            Item::create($req->all());
            return \redirect('item/i');
        }
        return view('admin.items.add');
    }



    
public function update(Request $req , $item_id)
{
  
    $p = Item::where('item_id',$item_id)->first();

    if($req->isMethod('post'))
    {

    $p->update($req->all());
     return redirect('item/i');
    
    }
    else
    {   
        $arr['item'] = $p;
        return view('admin.items.update' , $arr);
    }
}


public function delete($item_id)
{
    $p = Item::find($item_id);
    $p->delete();
    return redirect()->back();
}


//update the rate of item
public function updateRate(Request $req)
{
    $item_id = $req['item_id'];
    $rate = $req['rate'];
    $item = Item::where('item_id',$item_id)->update(['rate'=>$rate]);
    $arr['msg'] = 'updated';
    return json_encode($arr);

}


//add new comment
public function addComment(Request $req)
{
    $date = now();
    $comment = new Comment;
    $comment->user_id = $req['user_id'];
    $comment->item_id = $req['item_id'];
    $comment->date= $date;
    $comment->comment = $req['comment'];
    $comment->save();
    $arr['msg'] = "the comment is inserted";

    return \json_encode($arr);
}


//insert new comment
public function getComment(Request $req)
{
    $item_id = $req['item_id'];
    $comment = Comment::where('item_id',$item_id)->get();
    if($comment!=null)
    {
        $arr['msg'] = $comment;
    }

    else
    {
        $arr['msg'] = "no comment for this item yet";
       
    }
    return \json_encode($arr);
}


}
