@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('user.update', $data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Nama :</label>
                <input class="form-control" type="text" name="name" value="{{$data->name}}">
            </div>
            <div class="mb-2">
                <label>Email :</label>
                <input class="form-control" type="email" name="email" value="{{$data->email}}">
            </div>
            <div class="mb-2">
                <label>Password :</label>
                <input class="form-control" type="password" name="password" value="{{$data->password}}">
            </div>
            <div class="mb-2">
                <label>Role :</label>
                <select class="form-control" name="role">
                    <option value="{{$data->role}}" selected>{{$data->role}}</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="user">User</option>
                </select>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection