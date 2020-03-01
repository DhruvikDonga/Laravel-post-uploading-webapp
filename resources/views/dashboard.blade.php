@extends('layouts.app')

@section('content')
<style type="text/css">
    .jumbotron{
        background-color:#0000cc;
        color:white;
        border-radius: 40px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
               <main role="main" class="container">

                <div class="jumbotron">
                 <h1>Welcome {{Auth::user()->name}}</h1>
                <p>Email:-{{Auth::user()->email}}</p>
                <p>Total posts:-{{count($posts)}}</p>

                </div>
            </main>
                <br>
                <div class="panel-heading"><h3>Dashboard</h3></div>
                
                <br><br>
                <div class="panel-body">
                    <a href ="/posts/create" class="btn btn-primary">Create posts</a><hr>

                            <h3>Your Blog posts</h3>
                        @if(count($posts) > 0)           
                    <table class ="table table-striped table-responsive" >
                        <tr>
                            <th align="center">Title</th>
                            <th align="center">Edit</th>
                            <th align="center">Delete</th>
                            <th align="center">Upvotes/Downvotes</th>
                            <th align="center">Uploaded at</th>
                        </tr>
                        @foreach($posts as $post)
                        
                        <tr>
                            <td align="center">{{$post->title}}</td>
                            <td align="center"><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td align="center"><a href="/posts/{{$post->id}}" class="btn btn-danger float-right">Delete</a></td>
                            <td align="center">{{$post->likes->where('like',1)->count()}}  /{{$post->likes->where('like',0)->count()}}</td>
                            <td align="center">{{$post->created_at}}</td>

                        </tr>

                        @endforeach
                    </table>
                    @else
                    <p>You have no posts yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
