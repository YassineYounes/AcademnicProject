<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use App\Post;
use App\Specialty;
use App\User;
use App\Mail\PickProject;

use Illuminate\Support\Facades\Auth;



class SubjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * 
     *
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
        //create subject

        $specialties=Specialty::get();        
        return view('subjects.createSubject',compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add subject from form
        Post::create([
            'author_id' => Auth::user()->id,
            'title' => request('title'),
            'body' => request('body'),
            'secialty' => request('specialty')
        ]);
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $subject)
    {
        //show subject/id
        $specialty = Specialty::find($subject->secialty);
        $author = User::find($subject->author_id);
        return view('subjects.showSubject',compact('subject','specialty','author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $subject)
    {
        $specialties=Specialty::get(); 
        return view('subjects.editSubject',compact('subject','specialties'));
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
        // update subject/id from form
        $subject = Post::find($id);
        $subject->title = request('title');
        $subject->body = request('body');
        $subject->secialty= request('specialty');
        $subject->save();
        return $this->show($subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return app('App\Http\Controllers\HomeController')->index();
    }
    public function pick($id){
        $subject = Post::find($id);
        $subject->student_id = Auth::user()->id;
        $user = Auth::user();
        $user->subject_id=$id;
        $subject->save();
        $user->save();
        return app('App\Http\Controllers\HomeController')->index();
    }
}
