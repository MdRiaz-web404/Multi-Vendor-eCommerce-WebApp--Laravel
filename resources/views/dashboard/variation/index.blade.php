@extends('layouts.dashboardmaster')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @livewire('size')
            </div>
            <div class="col-md-6">
                @livewire('color')
            </div>
        </div>
    </div>
@endsection
