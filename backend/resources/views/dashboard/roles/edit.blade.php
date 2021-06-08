@extends('layouts.dashboard')
@section('title', 'Roles')
@section('content')
    <div class="content-wrapper">
    @include('dashboard.includes.header', ['title' => 'Role'])
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
                                <h3 class="card-title">Role Create</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('dashboard.roles.update', $role->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
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
                                        <input value="{{old('name')??$role->name}}" name="name" type="text" class="form-control" id="exampleInputName" placeholder="Enter Name">
                                    </div>
                                    <label>Permissions</label>
                                    <div class="form-group">
                                        @foreach($permissions as $permission)
                                            <input {{in_array($permission->name, $role->permissions->pluck('name')->toArray())?'checked':''}} type="checkbox" id="permission_{{$permission->id}}" name="permissions[]" value="{{$permission->name}}">
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
