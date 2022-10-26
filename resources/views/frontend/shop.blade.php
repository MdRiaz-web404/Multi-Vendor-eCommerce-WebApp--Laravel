@extends('layouts.frontendmaster')
@section('content')
<!-- breadcrumb_section - start
================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{route('index')}}">Home</a></li>
            <li>Shop</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
================================================== -->
@include('frontend.components.shopgrid')

@endsection
