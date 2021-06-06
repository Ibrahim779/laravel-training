@extends('layouts.dashboard')
@section('title', 'News')
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
                            <h3 class="card-title">News</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>

                                    @if(app()->getLocale() == 'ar')
                                        <th>Name Arabic</th>
                                        <th>Description Arabic</th>
                                    @else
                                        <th>Name English</th>
                                        <th>Description English</th>
                                    @endif
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $new)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                        @if(app()->getLocale() == 'ar')
                                        <td>
                                            {{$new->title_ar}}
                                        </td>
                                        <td>
                                            {{$new->description_ar}}
                                        </td>
                                        @else
                                        <td>
                                            {{$new->title_en}}
                                        </td>
                                        <td>
                                            {{$new->description_en}}
                                        </td>
                                        @endif
                                    <td>
                                        <img style="width: 50px;height: auto" src="/{{str_contains($new->img, 'news')?'storage/'.$new->img:$new->img}}" alt="category_img">
                                    </td>
                                    <td>
                                        {{optional($new->admin)->name}}
                                    </td>

                                    <td>
                                        <a class="float-left mr-2" href="{{route('dashboard.categories.edit', $new->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm">edit</button>
                                        </a>
                                        <form method="post"  action="{{route('dashboard.categories.destroy', $new)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('dashboard.categories.create')}}">
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
