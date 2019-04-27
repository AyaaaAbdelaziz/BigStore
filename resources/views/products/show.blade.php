@extends('layouts.app')

@section('content')
        <a href="/products" class="btn btn-default">Go Back</a> 
        <h1>{{$product->name}}</h1>
        <small>Added on {{$product->created_at}}</small>
        <div>
                {!!$product->description!!}
        </div>
@endsection    