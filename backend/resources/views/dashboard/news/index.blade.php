@extends('layouts.dashboard')
@section('title', 'News')
@section('content')
    <div class="content-wrapper">
        @include('dashboard.includes.header', ['title' => 'News'])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">News</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $new)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$new->title}}
                                    </td>
                                    <td>
                                        {{$new->description}}
                                    </td>
                                    <td>
                                        <img src="{{$new->image}}" alt="category_img" style="width: 50px;height: auto">
                                    </td>
                                    <td>
                                        {{optional($new->admin)->name}}
                                    </td>

                                    <td>
                                        <a class="float-left mr-2" href="{{route('dashboard.news.edit', $new->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm">edit</button>
                                        </a>
                                        <form method="post"  action="{{route('dashboard.news.destroy', $new)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('dashboard.news.create')}}">
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
