@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar')
    @include('user.layouts.bg')

    @if (count($results) > 0)
        @foreach ($results as $result)
            <h3>{{ $result->nama }}</h3>
            {{-- <p>{{ $result->content }}</p> --}}
        @endforeach
    @else
        <p>No results found.</p>
    @endif
    @include('user.layouts.footer')
    
@endsection
