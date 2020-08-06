@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Insert CSV</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding: 30px;">
                {!! Form::open(['action' => 'CarController@csvUpload', 'method'=>'POST',
                'enctype'=>'multipart/form-data',
                'class'=>'form'])
                !!}
                <div class="form-group">
                    {{Form::file('file')}}
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