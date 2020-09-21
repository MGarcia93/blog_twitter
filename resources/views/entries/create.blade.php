@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Entry</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{url('entries')}}" method="post">
                        @csrf
                        <div class="form-group ">
                            <label for="title" > title</label>
                            <div class="">
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('tittle')}}" required autocomplete="title">
                                @error('title')
                                    <span class="invalid-feddback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="contnet" > Content</label>
                            <div class="">
                                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" value="{{old('content')}}" required autocomplete="title"></textarea>
                                @error('content')
                                    <span class="invalid-feddback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
