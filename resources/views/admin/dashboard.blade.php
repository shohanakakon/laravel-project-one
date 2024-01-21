@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body h-100 bg-info border-0 text-white">
                    <a href="{{url('/division/create')}}">
                        <h4>Division</h4>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body h-100 bg-info border-0 text-white">
                    <a href="{{url('/district/create')}}">
                        <h4>District</h4>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body h-100 bg-info border-0 text-white">
                    <a href="{{url('/thana/create')}}">
                        <h4>Thana</h4>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body h-100 bg-info border-0 text-white">
                    <a href="{{url('/upazilla/create')}}">
                        <h4>Upazilla</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
