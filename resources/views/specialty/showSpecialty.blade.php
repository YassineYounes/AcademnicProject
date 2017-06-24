@extends('layouts.app')

    @section('content')
        <div class="container" id="bodyContainer" >
            <br/>
            <div class="">
                <h4><strong>Subjects</strong> </h4>
                <br/>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>{{ $specialty->name }}</h1>   
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                        @foreach ($subjects as $subject)
                        @if ($specialty->id == $subject->secialty && $subject->student_id==null)
                            <div class="list-group-item">
                                <a href="/subjects/{{$subject->id}}" >
                                    <strong>{{ $subject->title}}</strong>
                                </a>
                                    <div class="floatingRight">
                                        BY: {{App\User::find($subject->author_id)->firstName}} {{App\User::find($subject->author_id)->name}}
                                        <br/>
                                        {{$subject->created_at}}
                                    </div>
                                <br/><br/>
                            </div>
                            <br/>
                        @endif
                        @endforeach
                        
                            @if (Auth::user()->role_id==2||Auth::user()->role_id==1)
                            <a href="/subject/create"><button type="button" class="btn btn-primary floatingRight">Add subject</button></a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <br/>
        </div>
    @endsection