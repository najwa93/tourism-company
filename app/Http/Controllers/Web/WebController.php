<?php

namespace App\Http\Controllers\Web;

use App\Models\Admin\Country\Country;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Web.Main_view');
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
    public function show($id)
    {
        //
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

    // update user profile
    public function editUserProfile()
    {
        $user = Auth::user();
        $countries = Country::all()->pluck('name','id');
        return view('Web.Auth.User.Update',compact(['user','countries']));
    }

    // update users
    public function updateUserProfile(Request $request)
    {
        $user = Auth::user();
        if ($this->check($request->input('c_password'))){
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->user_name = $request->input('user_name');
            $user->phone_number = $request->input('phone_number');
            $user->country = $request->input('country');
            $user->gender = $request->input('gender');
            $user->save();
            if (!is_null($request->input('password')) and ($request->input('password') == $request->input('password_confirmation'))){
                $user->password = Hash::make($request->input('password'));
                $user->save();
            }
            if ($user->role_id != 8){
                return redirect()->route('Main.index');
            }else{
                return redirect()->route('home_page.index');
            }
        }else{
            dd('error');
        }

    }

    protected function check($password){
        if (Hash::check($password,Auth::user()->getAuthPassword())){
            return true;
        }
        return false;
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
