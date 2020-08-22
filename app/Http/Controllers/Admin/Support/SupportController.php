<?php

namespace App\Http\Controllers\Admin\Support;

use App\Models\User\Messages\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function index()
    {
        $user = Auth::user();
        $messages = $user->notifications;
      //  $messages = Message::all();
      //  return $messages;
        return view('Admin.SupportManagement.Index',compact('messages'));
    }*/

    public function index_messages()
    {
        $user = Auth::user();
        $messages = $user->notifications;
        //  $messages = Message::all();
        //  return $messages;
        return view('Admin.SupportManagement.Index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($messageId)
    {
        $message = Message::findOrfail($messageId);

       // return $message;
        return view('Admin.SupportManagement.Show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
