@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Insert Car</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding: 30px;">
                {!! Form::open(['action' => 'CarController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data',
                'class'=>'form'])
                !!}
                <div class="form-group">
                    {{Form::label('manufacturer', 'Manufacturer')}}
                    {{Form::text('manufacturer','',['class'=>'form-control', 'placeholder'=>'BMW', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('model', 'Model Name')}}
                    {{Form::text('model','',['class'=>'form-control', 'placeholder'=>'Model Name', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('year', 'Year')}}
                    {{Form::text('year','',['class'=>'form-control', 'placeholder'=>'1960', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('country', 'Country Name')}}
                    {{Form::text('country','',['class'=>'form-control', 'placeholder'=>'Germany', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    <div class="form-group">
                    </div>
                    {!! Form::close() !!}
                    @endsection
                </div>
            </div>
        </div>
    </div>
</div>