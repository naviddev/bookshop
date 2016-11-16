<?php
function flash($message,$type){
    session()->flash('flash_message',$message);
    session()->flash('flash_message_type',$type);
}
function user_log_set($user_id,$type,$value)
{

    if (\App\model\User_log::where('user_id',$user_id)->where('type',$type)->exists()){
        $user=\App\model\User_log::where('user_id',$user_id)->where('type',$type)->first();
            $user->value=$value;
             $user->save();

    }else{
        $log = new \App\model\User_log;
        $log->type = $type;
        $log->user_id=$user_id;
        $log->value = $value;
        $log->save();
    }


}
function user_log_get($user_id,$type){
    if (\App\model\User_log::where('user_id',$user_id)->where('type',$type)->exists()){
        $user=\App\model\User_log::where('user_id',$user_id)->where('type',$type)->first();
      return $user->value;
    }else return false;
}
function basket_count_get($user_id){

    return user_log_get($user_id,'basket');
}
function recent_book(){
    $books = \App\model\Book::orderBy('id', 'DESC')->take(5)->get();
    return $books;
}