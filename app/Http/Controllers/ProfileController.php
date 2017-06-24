<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;

class ProfileController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show()
    {
        $user=Auth::user();
        if ($user->role_id == 3){
            if ($user->subject_id){
                $subject = Post::find($user->subject_id);
                return view('profile.profile',compact('user','subject'));
            }
        }
        else{

            $subjects = Post::where('author_id', $user->id)->get();
            return view('profile.profile',compact('user','subjects'));
        }
        return view('profile.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user=Auth::user();
        return view('profile.editProfile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = request('lastName');
        $user->firstName = request('firstName');
        $user->email = request('email');
        if(request('password'))
            $user->password = bcrypt(request('password'));
        $user->save();
        return $this->show();
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'firstName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
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
