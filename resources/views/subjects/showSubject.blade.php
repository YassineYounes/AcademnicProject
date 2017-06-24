@extends('layouts.app')

    @section('content')
    @if($subject->student_id != null)
        <center><STRONG style="color: red;">This subject is no longer available.</STRONG></center>
        <br/>
    @endif
    <div class="container">
        <div class="page-content container">
            <div class="panel panel-success">
                <div class="panel-heading">
                <h3>
                    {{$subject->title}}
                    <small class="text-muted">Specialty: {{$specialty->name}}</small>
                    
                </h3>
                </div>
                <div class="panel-body">
                    {{$subject->body}}
                </div>
                <div class="panel-footer">
                    Posted {{$subject->created_at}} <br/> <strong>By: {{$author->name}}</strong>

                </div>
            </div>
        </div>
        <br/>
        
            <center>
                @if(Auth::user()->id == $subject->author_id)
                <a href="editSubject/{{$subject->id}}" ><button type="button" class="btn btn-primary ">Edit</button></a>
                @endif
                @if(Auth::user()->id == $subject->author_id || Auth::user()->role_id == 1 )
                    <a href="delete/{{$subject->id}}" onclick="return confirm('Are you sure you want to delete this project?');"><button type="button" class="btn btn-danger ">Delete</button></a>
                @endif
                @if(Auth::user()->role_id == 3 && $subject->student_id == null && Auth::user()->subject_id == null)
                <a href="pick/{{$subject->id}}" onclick="return confirm('Are you sure you want to take this project?');" ><button type="button" class="btn btn-primary ">Take Project</button></a>
                @endif
            </center>
    </div>
    @endsection