@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center;">Posts</h2>
                </div>

                
                    @if(count($posts) > 0)
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                    
                        @foreach($posts as $post)
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{$post->title}}  -  Date: {{ $post->created_at }}</div>
                                        <div class="card-body">
                                            {{$post->description}} <br><br>
                                            <footer class="blockquote-footer"> <cite title="Source Title">by {{$post->user->name}}</cite></footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach    
                    @endif
               
            </div>
        </div>
    </div>
    
</div>
@endsection
