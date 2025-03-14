@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nota') }}</div>

                <div class="card-body">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
