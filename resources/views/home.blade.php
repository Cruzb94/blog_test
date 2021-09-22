@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"><br>
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="description" name="description" maxlength="250" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    @if(count($posts) > 0)
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <h2 style="text-align: center;">Posts</h2>
        @foreach($posts as $post)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{$post->title}}  -  Date: {{ $post->created_at }}</div>
                        <div class="card-body">
                            {{$post->description}}
                        </div>
                    </div>
                </div>
            </div><br>
        @endforeach    
    @endif
</div>
@endsection
