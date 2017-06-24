@extends('layouts.app')

    @section('content')
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
            </div>
        </div>
    </div>
    @endsection