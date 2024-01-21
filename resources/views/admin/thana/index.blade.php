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
                <th style="width:15%">thana name</th>
                <th style="width:15%">district</th>
                <th style="width:15%">Division</th>
                <th style="width:15%">slug</th>
                <th style="width:10%">Status</th>
                <th style="width:25%">Actions</th>
            </tr>
            </thead>
            @foreach($thanas as $thana)
                <tbody>
                <tr>
                    <td>{{$thana->name}}</td>
                    <td>{{$thana->district->name}}</td>
                    <td>{{$thana->district->division->name}}</td>


                    <td>{{$thana->slug}}</td>

                    <td class="center">
                        @if($thana->status==1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-warning">Deactive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3"></div>
                        <div class="span2">
                            <a href="{{url('/than-status/'.$thana->id)}}" class="btn @if($thana->status==1) btn-success  @else btn-danger  @endif" >
                                <i class="fa-solid @if($thana->status==1) fa-thumbs-up @else  fa-thumbs-down @endif"></i>
                            </a>
                        </div>
                        <div class="span2">
                            <a href="{{url('/thana/'.$thana->id.'/edit')}}" class="btn btn-info" >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                        <div class="span2">
                            <form method="post" action="{{url('/thana/'.$thana->id)}}">
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
