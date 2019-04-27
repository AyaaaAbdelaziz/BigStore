@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    {!!Form::open(['action'=>'ProductsController@store','method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control','placeholder'=> 'item name'])}}
        </div>
        <div class="form-group">
                {{Form::label('price','Price')}}
                {{Form::text('price','',['class' => 'form-control','placeholder'=> 'item price'])}}
        </div>
        <div class = 'form-group'>
                {{Form::label('description','Description')}}
                {{Form::text('description','',['id'=> 'article-ckeditor','class' => 'form-control','placeholder'=> 'item description'])}}
        </div>
        {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
    {!! Form::close()!!}
@endsection    