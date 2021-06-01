@extends('layouts.dashboard')
@section('title', 'Roles')
@section('content')
    <div class="content-wrapper">
        @include('dashboard.includes.header')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Roles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$role->name}}
                                    </td>
                                    <td>
                                        <a class="float-left mr-2" href="{{route('dashboard.roles.edit', $role->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm">edit</button>
                                        </a>
                                        <form method="post"  action="{{route('dashboard.roles.destroy', $role)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('dashboard.roles.create')}}">
                                <button type="button" class="pr-5 pl-5 btn btn-primary btn-md">Add</button>
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    </div>
    @endsection
