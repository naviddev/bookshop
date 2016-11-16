<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

use App\model\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\model\Item;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{

//Super Admin functions
    public function showAdmins()
    {

        $admin = Admin::all();
        return view('admin.superadmin.Admins', compact('admin'));

    }

    public function showAddAdmins()
    {
        return view('admin.superadmin.AddAdmin', compact('admin'));

    }

    public function registerAdmins(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:225',
            'lastName' => 'required|max:255',
            'phone' => 'numeric|required',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();

        }
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->lastName = $request->lastName;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();
        flash('The Admin create successfully', 'success');
        return redirect('/admin/admins');
    }

    public function RemoveAdmins($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->isSuper == 1) {
            flash('can not Delete SuperAdmin', 'Error');
            return back();
        }
        $admin->delete();
        flash('Admin Removed', 'Error');
        return back();
    }


//    Admins function

    public function showAddItem()
    {
        $books=\App\model\Book::count();

        return view('admin.items',compact('books'));

    }

    public function ShowAddBooks()
    {
        $books=\App\model\Book::all();
        return view('admin.addbook',compact('books'));
    }

    public function AddBooks(Request $request)
    {
$admin=$request->user('admin');
        $book=new \App\model\Book;
        $item =new \App\model\Item;
        $item->type='book';
        $item->seen=0;
        $validator=Validator::make($request->all(),[
            'title' => 'required|max:225',
            'detail' => 'required|max:225',
            'body' => 'required|max:500',
            'link' => 'required|max:500|',
            'price' => 'required|numeric',
            'pic' => 'required',
        ]);
        if($validator->fails()){
            flash('Error', 'Error');
            return back()->withErrors($validator)->withInput();

        }
        $book->title=$request->title;
        $book->detail=$request->detail;
        $book->link=$request->link;
        $book->sold=0;
        $book->price=$request->price;
        $book->body=$request->body;
        $admin->items()->save($item);
        $item->book()->save($book);
        Storage::put($request->title.$request->id, $request->pic);
        flash('The book create successfully', 'success');
        return redirect('admin/item/book');
    }

    public function ShowBooksList()
    {
        $books=\App\model\Book::all();
        return view('admin.books',compact('books'));
    }

    public function ShowEditBooks($id)
    {
         $book=\App\model\Book::findOrFail($id);
        return view('admin.edit-book',compact('book'));
    }

    public function EditBooks($id,Request $request)
    {
        if ( $this->admin_auth($id,$request->user('admin'))){
            $book=\App\model\Book::findOrFail($id);
          $this->book_validate($request);
            $book->title=$request->title;
            $book->detail=$request->detail;
            $book->link=$request->link;
            $book->price=$request->price;
            $book->body=$request->body;
          $book->save();
            flash('The book update successfully', 'success');
            return redirect('admin/item/book');

        }
        flash('you can not update the post  only the writer and admin can edit', 'Error');
        return back();



    }
//    helper function
protected function book_validate($request){
    $validator=Validator::make($request->all(),[
        'title' => 'required|max:225',
        'detail' => 'required|max:225',
        'body' => 'required|max:500',
        'link' => 'required|max:225|',
        'price' => 'required|max:225|numeric',
    ]);
    if($validator->fails()){
        flash('Error', 'Error');
        return back()->withErrors($validator)->withInput();

    }
}
    protected function admin_auth($post_id,$admin){
        if ($admin->isSuper==1){
            return true;
        }
        else
        $item=Item::findOrFail($post_id);
        if ($item->admin_id===$admin){
            return true;
        }
        return false;
    }
}
