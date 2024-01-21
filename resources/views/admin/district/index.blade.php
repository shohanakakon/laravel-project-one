@extends('admin.master')
@section('body')
    <div class="card-body table-responsive">
        <p class="alert-success">
            <?php
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::get('message',null);
            }
            ?>
        </p>
        <table class="table table-hover text-nowrap">
            <thead class="text-white bg-dark">
            <tr>
                <th style="width:20%">District name</th>
                <th style="width:20%">Division</th>
                <th style="width:20%">slug</th>
                <th style="width:10%">Status</th>
                <th style="width:30%">Actions</th>
            </tr>
            </thead>
            @foreach($districts as $district)
                <tbody>
                <tr>
                    <td>{{$district->name}}</td>
                    <td>{{$district->division->name}}</td>


                    <td>{{$district->slug}}</td>

                    <td class="center">
                        @if($district->status==1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-warning">Deactive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3"></div>
                        <div class="span2">
                            <a href="{{url('/dic-status/'.$district->id)}}" class="btn @if($district->status==1) btn-success  @else btn-danger  @endif" >
                                <i class="fa-solid @if($district->status==1) fa-thumbs-up @else  fa-thumbs-down @endif"></i>
                            </a>
                        </div>
                        <div class="span2">
                            <a href="{{url('/district/'.$district->id.'/edit')}}" class="btn btn-info" >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                        <div class="span2">
                            <form method="post" action="{{url('/district/'.$district->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                        </div>
                        <div class="span3"></div>
                    </td>
                </tr>
                </tbody>
                @endforeach


        </table>
    </div>


@endsection
