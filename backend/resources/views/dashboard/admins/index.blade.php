@extends('layouts.dashboard')
@section('title', 'Categories')
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
                            <h3 class="card-title">Admins</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$admin->name}}
                                    </td>
                                    <td>
                                        {{$admin->email}}
                                    </td>
                                    <td>
                                        @if(count($admin->getRoleNames())>0)
                                            @foreach($admin->getRoleNames() as $role)
                                            {{$role}} ,
                                            @endforeach
                                          @else
                                            No Role
                                        @endif

                                    </td>
                                    <td>
                                        <a class="float-left mr-2" href="{{route('dashboard.admins.edit', $admin->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm">edit</button>
                                        </a>
                                        <form method="post"  action="{{route('dashboard.admins.destroy', $admin)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('dashboard.admins.create')}}">
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
