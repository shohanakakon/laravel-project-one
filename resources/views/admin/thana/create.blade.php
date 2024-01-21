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

{{--        thana--}}
        <div class="row justify-content-center align-items-center mt-3">
            <div class="card card-body col-md-6 text-center">
                <p class="alert-success">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::get('message',null);
                    }
                    ?>
                </p>
                <p class="alert-danger">
                    <?php
                    $message = Session::get('error_message');
                    if($message){
                        echo $message;
                        Session::get('error_message',null);
                    }
                    ?>
                </p>

                <h2>Thana</h2>
                <form action="{{url('/thana/')}}" method="post">
                    @csrf
                    <div class="control-group col-md-12 text-center required">
                        <label for="">Name</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="control-group col-md-12 mt-3 text-center required">
                        <label for="">District</label>
                        <div class="controls">
                            <select name="dic_id" class="control-group col-md-12 text-center">
                                <option value="null">select district</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-actions mt-3">
                        <button type="submit" class="btn btn-primary">Add Thana</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
