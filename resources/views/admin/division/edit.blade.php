@extends('admin.master')
@section('body')
    <div class="row justify-content-center align-items-center mt-3">
        <div class="card card-body col-md-6 text-center">
            <div class="box span12">
                <p class="alert-success">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::get('message',null);
                    }
                    ?>
                </p>
                <h2>Edit Division</h2>
                <form action="{{url('/division/'.$division->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="control-group col-md-12 text-center required">
                        <label for="">Name</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="name" value="{{$division->name}}">
                        </div>
                    </div>

                    <div class="form-actions mt-3">
                        <button type="submit" class="btn btn-primary">Add division</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
