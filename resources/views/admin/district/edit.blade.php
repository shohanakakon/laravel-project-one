@extends('admin.master')
@section('body')
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

            <h2>Edit District</h2>
            <form  method="post" action="{{url('/district/'.$district->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="control-group col-md-12 text-center required">
                        <label for="">Name</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="name" value="{{$district->name}}">
                        </div>
                    </div>

                    <div class="control-group col-md-12 mt-3 text-center required">
                        <label for="">Division</label>
                        <div class="controls">
                            <select name="div_id" class="control-group col-md-12 text-center">
                                <option value="null">select division</option>
                                @foreach($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-actions mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
