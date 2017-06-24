@extends('layouts.app')

    @section('content')
    <div class="container" id="bodyContainer">
    <br/> <br/>
    	<p>Hi {{$user->name}}</p>
        @if ($user->role_id == 3)
        	@if ($user->subject_id==null)
        		You did not pick a project yet.
        	@else
        		Your project is: <a href="subjects/{{$subject->id}}">{{$subject->title}}</a>
        	@endif
        @else
            @if ( $subjects )
                Your posted subjects are:
                
                <br/><br/><br/>
                @foreach($subjects as $subject)
                    <a href="/subjects/{{$subject->id}}">{{$subject->title}}</a>
                    @if ($subject->student_id)
                         : Was taken by: <strong>{{App\User::find($subject->student_id)->name}}</strong>
                         Email: <strong>{{App\User::find($subject->student_id)->email}}</strong>
                    @endif
                    <br/> <br/>
                @endforeach
            @endif
        @endif
    </div>
    <br/> <br/>
    <center>
        <a href="/editProfile" ><button type="button" class="btn btn-primary ">Edit Profile</button></a>
    </center>
    @endsection