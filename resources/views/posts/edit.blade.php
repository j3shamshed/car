@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Car</h1>
    <a href="{{route('home')}}">
        Go Back
    </a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(!empty($car))
            <div class="card" style="padding: 30px;">
                {!! Form::open(['action' => ['CarController@update',$car->id], 'method'=>'POST',
                'enctype'=>'multipart/form-data',
                'class'=>'form'])
                !!}
                <div class="form-group">
                    {{Form::label('manufacturer', 'Manufacturer')}}
                    {{Form::text('manufacturer',$car->manufacturer,['class'=>'form-control', 'placeholder'=>'BMW', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('model', 'Model Name')}}
                    {{Form::text('model',$car->model,['class'=>'form-control', 'placeholder'=>'Model Name', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('year', 'Year')}}
                    {{Form::text('year',$car->year,['class'=>'form-control', 'placeholder'=>'1960', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('country', 'Country Name')}}
                    {{Form::text('country',$car->country,['class'=>'form-control', 'placeholder'=>'Germany', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                    <div class="form-group">
                    </div>
                    {!! Form::close() !!}
                    @endsection
                </div>
            </div>
            @endif;
        </div>
    </div>
</div>