@extends('layouts.dashboard')
@section('title', 'Categories')
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
                                <h3 class="card-title">Category Create</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('dashboard.roles.store')}}" method="post" enctype="multipart/form-data">
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
                                        <label for="exampleInputEmail1">Name</label>
                                        <input name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Arabic Name">
                                    </div>
                                    <div class="form-group">
                                    @foreach($permissions as $permission)
                                            <input  type="checkbox" id="permission_{{$permission->id}}" name="permission_id" value="{{$permission->id}}">
                                        <label for="permission_{{$permission->id}}">{{$permission->name}}</label><br>
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
