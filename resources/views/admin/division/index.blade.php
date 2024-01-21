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
                <th style="width:20%">Name</th>
                <th style="width:20%">slug</th>
                <th style="width:30%">Status</th>
                <th style="width:30%">Actions</th>
            </tr>
            </thead>
            @foreach($divisions as $division)
            <tbody>
                <tr>
                    <td>{{$division->name}}</td>

                    <td>{{$division->slug}}</td>

                    <td class="center">
                        @if($division->status==1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-warning">Deactive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3"></div>
                        <div class="span2">
                          <a href="{{url('/div-status/'.$division->id)}}" class="btn @if($division->status==1) btn-success  @else btn-danger  @endif" >
                              <i class="fa-solid @if($division->status==1) fa-thumbs-up @else  fa-thumbs-down @endif"></i>
                          </a>
                        </div>
                        <div class="span2">
                           <a href="{{url('/division/'.$division->id.'/edit')}}" class="btn btn-info" >
                                <i class="fa-solid fa-pen-to-square"></i>
                           </a>
                        </div>
                        <div class="span2">
                           <form method="post" action="{{url('/division/'.$division->id)}}">
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
