@extends('layouts.dashboard')
@section('title', 'Admins')
@section('content')
    <div class="content-wrapper">
    @include('dashboard.includes.header')
    <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Admin Create</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('dashboard.admins.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">&times;</i>
                                        </button>
                                        <span>
                                            {{$errors->first()}}
                                        </span>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleInputName" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email</label>
                                        <input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Password</label>
                                        <input value="{{old('password')}}" name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                                    </div>
                                    <label>Role</label>
                                    <div class="form-group">
                                        @foreach($roles as $role)
                                            <input type="checkbox" id="role_{{$role->id}}" name="roles[]" value="{{$role->name}}">
                                            <label for="role_{{$role->id}}">{{$role->name}}</label><br>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
