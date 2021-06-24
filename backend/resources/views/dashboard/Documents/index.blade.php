@extends('layouts.dashboard')
@section('title', 'Documents')
@section('content')
    <div class="content-wrapper">
        @include('dashboard.includes.header', ['title' => 'Documents'])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Documents</h3>
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
                                @foreach($documents as $document)
                                <tr id="docRow_{{$document->id}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$document->name}}
                                    </td>
                                    <td>
                                        <button docId="{{$document->id}}" type="button" class="showEditDoc btn btn-primary btn-sm" data-toggle="modal" data-target="#editDocModal"
                                                data-whatever="@getbootstrap">edit
                                        </button>
                                        <button docId="{{$document->id}}" type="submit" class="deleteDoc btn btn-danger btn-sm">delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

{{--                                <button id="addUser" type="button" class="pr-5 pl-5 btn btn-primary btn-md mt-3">Add</button>--}}
                            <button type="button" class="pr-5 pl-5 btn btn-primary btn-md mt-3" data-toggle="modal" data-target="#addDocModal"
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
     @include('dashboard.documents.create')
     @include('dashboard.documents.edit')
    </div>
@endsection
@section('script')
    @include('dashboard.documents.parts.script')
@endsection
