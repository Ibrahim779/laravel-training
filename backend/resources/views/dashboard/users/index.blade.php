@extends('layouts.dashboard')
@section('title', 'Users')
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
                            <h3 class="card-title">Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr id="userRow_{{$user->id}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td id="editName">
                                        {{$user->full_name}}
                                    </td>
                                    <td>
                                        <img id="editImage" style="width: 50px;height: auto" src="{{url('storage/'.$user->img)}}" alt="user_name">
                                    </td>
                                    <td id="editEmail">
                                        {{$user->email}}
                                    </td>
                                    <td id="editPhone">
                                        {{$user->phone}}
                                    </td>
                                    <td>
                                        <button userId="{{$user->id}}"  type="button" class="editUser btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"
                                                data-whatever="@getbootstrap">edit
                                        </button>
                                        <button userId="{{$user->id}}" type="submit" class="deleteUser btn btn-danger btn-sm">delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr id="newUserRow" style="display: none">
                                    <td>{{count($users)+1}}</td>
                                    <td id="name">
                                    </td>
                                    <td>
                                        <img id="img" style="width: 50px;height: auto" src="" alt="user_name">
                                    </td>
                                    <td id="email">

                                    </td>
                                    <td id="phone">
                                    </td>
                                    <td>
                                        <button id="edit" userId="" type="button" class="editUser btn btn-primary btn-sm" data-toggle="modal"
                                                 data-target="#editModal"
                                                data-whatever="">edit
                                        </button>
                                        <button id="delete" userId="" type="submit" class="deleteUser btn btn-danger btn-sm">delete</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

{{--                                <button id="addUser" type="button" class="pr-5 pl-5 btn btn-primary btn-md mt-3">Add</button>--}}
                            <button id="addUser" type="button" class="pr-5 pl-5 btn btn-primary btn-md mt-3" data-toggle="modal" data-target="#exampleModal"
                                    data-whatever="@getbootstrap">Add
                            </button>

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
      <!-- Form content -->
     @include('dashboard.users.parts.addForm')
     @include('dashboard.users.parts.editForm')
    </div>
@endsection
@section('script')
    @include('dashboard.users.parts.script')
@endsection
