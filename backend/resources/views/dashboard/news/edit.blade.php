@extends('layouts.dashboard')
@section('title', 'News')
@section('content')
    <div class="content-wrapper">
    @include('dashboard.includes.header', ['title' => 'News'])
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
                                <h3 class="card-title">News Edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('dashboard.news.update', $news->id)}}" method="post" enctype="multipart/form-data">
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
                                        <label for="exampleInputTitle">Arabic Title</label>
                                        <input name="title_ar" value="{{attrValue('title_ar', $news)}}" type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Arabic Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputTitle1">English Title</label>
                                        <input  name="title_en" value="{{attrValue('title_en', $news)}}" type="text" class="form-control" id="exampleInputTitle1" placeholder="Enter English Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputDescription">Arabic Description</label>
                                        <textarea name="description_ar"
                                                  class="form-control"
                                                  id="exampleInputDescription">{{attrValue('description_ar', $news)}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputDescription1">English Description</label>
                                        <textarea  name="description_en"
                                                   class="form-control"
                                                   id="exampleInputDescription1">{{attrValue('description_en', $news)}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="img" type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
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
