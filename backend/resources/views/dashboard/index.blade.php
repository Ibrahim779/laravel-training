@extends('layouts.dashboard')
@section('title', 'main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('dashboard.includes.header', ['title' => 'Main'])
    </div>
@endsection
