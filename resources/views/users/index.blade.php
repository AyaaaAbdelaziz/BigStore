@extends('layouts.app')

@section('content')
<table border="1">
<tr>
<td>ID</td>
<td>Name</td>
<td>Email</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td><a href = '/delete-user/{{ $user->id }}'>Delete</a> </td>
</tr>
@endforeach
</table>
