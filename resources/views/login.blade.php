@extends('index')
@section('title', '{{ $status }}')
@section('content')

<div class="card">
    @if ($status == 'login')
        <form action="{{ $action }}" method="post">
            @csrf
            <h5>{{ $title }}</h5>
            @foreach ($login as $log => $type)
            
            <div class="form-group">
                <label for="{{ $log }}">{{ Str::ucfirst($log) }}</label>
                <input type="{{ $type }}" name="{{ $log }}" id="{{ $log }}" placeholder="{{ Str::ucfirst($log) }}">
            </div>
                
            @endforeach
            <button type="submit">Submit</button>
        </form>
    @endif
        register?
</div>

@endsection