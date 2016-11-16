<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\model\Book;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {

        $books = \App\model\Book::take(5)->get();


        return view('index', compact('books'));

    }


    public function addToShopCard( Request $request,$book_id)
    {
        $book=Book::findOrFail($book_id);
        $request->session()->put('item_id',$book->id);

        if (!auth()->guard('user')->guest()) {
        $this->addToShopCardAjax($request,$book_id);
    }else return view('shop.auth');




        }

        
        
   


    protected  function isSetCard($book_id,$user_id){
        if (user_log_get($user_id, 'shopping-card')) {
            $card = user_log_get($user_id, 'shopping-card');

            $card = unserialize($card);
            if (in_array($book_id, $card)) {
                return TRUE;
            } else return false;
        }
        return false;
    }
    protected function addToShopCardAjax($request,$book_id){
        $user_id=$request->user('user')->id;
        if (!$this->isSetCard($book_id,$user_id)){
            $num = user_log_get($user_id, 'basket');
            user_log_set($user_id, 'basket', $num + 1);
            $card = user_log_get($user_id, 'shopping-card');
            $card=unserialize($card);
            array_push($card, "$book_id");
            $card=serialize($card);
            user_log_set($user_id, 'shopping-card', $card);
        }

        return "ok";
        
    }

    public function bookShow($book_id)
    {
        $book=Book::findOrFail($book_id);
        return view('shop.book',compact('book'));
    }

    public function cardShow(Request $request)
    {
        $user_id=$request->user('user')->id;
       $card=user_log_get($user_id,'shopping-card');
        $card=unserialize($card);
        $book=Book::find($card);

        return view('shop.card',compact('book'));
    }
}

