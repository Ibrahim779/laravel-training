@extends('layouts.dashboard')
@section('title', 'Forms')
@section('content')
    <div class="content-wrapper">
        @include('dashboard.includes.header', ['title' => 'Forms'])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Forms</h3>
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
                                @foreach($forms as $form)
                                <tr id="formRow_{{$form->id}}">
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$form->name}}
                                    </td>
                                    <td>
                                        <button formId="{{$form->id}}" type="button" class="showEditForm btn btn-primary btn-sm" data-toggle="modal" data-target="#editFormModal"
                                                data-whatever="@getbootstrap">edit
                                        </button>
                                        <button formId="{{$form->id}}" type="submit" class="deleteForm btn btn-danger btn-sm">delete</button>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>

{{--                                <button id="addUser" type="button" class="pr-5 pl-5 btn btn-primary btn-md mt-3">Add</button>--}}
                            <button type="button" class="pr-5 pl-5 btn btn-primary btn-md mt-3" data-toggle="modal" data-target="#addFormModal"
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
     @include('dashboard.forms.create')
     @include('dashboard.forms.edit')
    </div>
@endsection
@section('script')
    @include('dashboard.forms.parts.script')
@endsection
