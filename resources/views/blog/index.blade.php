@extends('template.master')
@section('title') Blog Create @stop
@section('content')

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-8">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
               <table class="table table-bordered align-middle">
                   <thead>
                   <tr>
                       <th>#</th>
                       <th>title</th>
{{--                       <th>Description</th>--}}
                       <th>Controls</th>
                       <th>Created</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($blogs as $blog)
                   <tr>
                       <td>{{$blog->id}}</td>
                       <td class="small mb-0">
                           <span class="fw-bold">{{Str::words($blog->title,5) }}</span>
                           <br>
                           <span class="text-black-50">{{Str::words($blog->description,5) }}</span>

                       </td>

                       <td>
                           <form action="{{route('blog.destroy',$blog->id)}}" method="post">
                               @csrf
                               @method("delete")
                               <button class="btn btn-outline-danger">Del</button>
                           </form>
                       </td>
                       <td>{{$blog->created_at}}</td>

                   </tr>
                   @endforeach
                   </tbody>
               </table>
                <div class="">
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
    </div>

@stop
