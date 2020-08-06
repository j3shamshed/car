@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Model</th>
                            <th scope="col">Year</th>
                            <th scope="col">Country</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($cars))
                        @foreach($cars as $car)
                        <tr>
                            <th scope="row">{{$car->manufacturer}}</th>
                            <td>{{$car->model}}</td>
                            <td>{{$car->year}}</td>
                            <td>{{$car->country}}</td>
                            <td>
                                <form method="post" action="{{ route('cars.destroy', $car->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td><a class="btn btn-primary" href="{{ route('cars.edit', $car->id) }}">
                                    Edit
                                </a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            No data found
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection