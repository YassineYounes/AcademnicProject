@extends('layouts.app')

    @section('content')
    
    <div class="container" id="bodyContainer" >
            <br/>
            <div class="">
                <h4><strong>Subjects</strong> </h4>
                <br/>
                @foreach ($specialties as $specialty)

                @if ($specialty->id == Auth::user()->Specialty)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a href="/specialty/{{$specialty->id}}" style="color:#fff"><h2>{{ $specialty->name}} </h2></a>
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
                        @endif
                        @endforeach
                        <br/>
                        <a href="/specialty/{{$specialty->id}}">View All ... <span class="badge">{{$count[$specialty->name]}}</span></a>                      
                        </div>
                    </div>
                </div>
                <br/>
                @endif
                @endforeach
                @foreach ($specialties as $specialty)
                    @if ($specialty->id == Auth::user()->Specialty)
                        @continue
                    @endif
                    @php
                        $i=0;
                    @endphp
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a href="/specialty/{{$specialty->id}}" style="color:#fff"><h2>{{ $specialty->name }}</h2></a>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                        @foreach ($subjects as $subject)
                            @if($i == 2)
                                @break
                            @endif
                        @if ($specialty->id == $subject->secialty && $subject->student_id==null )
                        @php
                            $i=$i+1;
                        @endphp
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
                        <br/>
                        <a href="/specialty/{{$specialty->id}}">View All ... <span class="badge">{{$count[$specialty->name]}}</span></a>
                        @if (Auth::user()->role_id==2||Auth::user()->role_id==1)
                            <a href="/subject/create"><button type="button" class="btn btn-primary floatingRight">Add subject</button></a>
                        @endif
                        </div>
                    </div>
                </div>
                <br/>
                @endforeach
            </div>

            
        
    </div>
    @endsection