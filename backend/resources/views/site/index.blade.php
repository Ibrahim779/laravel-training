@extends('layouts.site')
@section('title', 'Home')
@section('content')

    @include('site.parts.slides')

    @include('site.parts.categories')

    @include('site.parts.products')

    @include('site.parts.news')

@endsection
