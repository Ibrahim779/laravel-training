@extends('layouts.dashboard')
@section('title', 'Products')
@section('content')
    <div class="content-wrapper">
        @include('dashboard.includes.header', ['title' => 'Products'])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
                        </div>
                        <!-- /.card-header -->
                        @livewire('dashboard.product.products')
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
