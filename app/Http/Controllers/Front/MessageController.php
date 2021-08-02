<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('back.message.index');
    }
    public function view(Message $message,$status)
    {

          if($status == '1')
          {
            $message->status =$status;
            $message->save();
            $question = $message;
            $notification=array('message'=>'message seen',
                                 'alert-type'=>'success');
       return view('back.message.view',compact('question'))->with(compact('question'))
       ->with($notification);
          }
          else{
            $question = $message;
            $notification=array('message'=>'message alerady  seen',
                                 'alert-type'=>'warning');
                                 return view('back.message.view',compact('question'))->with(compact('question'))
                                 ->with($notification);
          }

          
           
    }


    public function frontview(Message $message,$status)
    {
        if($status == '1')
        {
          $message->status =$status;
          $message->save();
          $question = $message;
          $notification=array('message'=>'message seen',
                               'alert-type'=>'success');
     return view('front.message.view',compact('question'))->with(compact('question'))
     ->with($notification);
        }
        else{
          $question = $message;
          $notification=array('message'=>'message alerady  seen',
                               'alert-type'=>'warning');
                               return view('front.message.view',compact('question'))->with(compact('question'))
                               ->with($notification);
        }


    }


    public function sellermessage()
    {
        $messages =Message::where('vendor_id',auth()->user()->id)->get();
        return view('front.message.index',compact('messages'));
    }

    public function delete(Message $message)
    {
        $message->delete();
        $notification =array('message'=>'Messsage deleted',
                              'alert-type','success');
        return back()->with($notification);
    }
}
