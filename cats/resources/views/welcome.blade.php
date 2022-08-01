@extends('layouts.app')

@section('title', 'Премия Котик Года')


@section('content')
    <h1>Премия Котик Года</h1>

    <!-- As a link -->
    @foreach ($cats as $cat)
        
        <nav class="navbar bg-light">
            <div class="container-fluid">
                @if($currentCat and $currentCat->id == $cat->id)
                    <span class="navbar-brand mb-0 h1">{{ $cat->name }}</span>
                @else
                    <a class="navbar-brand" href="/?id={{ $cat->id }}">{{ $cat->name }}</a>
                @endif
            </div>
        </nav>
    @endforeach

    @if($currentCat)
    <p>
        <div class="vr" style="width: 81em;opacity: 1;">
            <div class="bg-success p-2 text-white">{{ $currentCat->name }}</div>
            <p class="text-white">{{ $currentCat->email }}</p>
            @foreach ($currentCat->getImages() as $image)
                <img width="200" src="{{ $image->path }}" class="rounded mx-auto" alt="{{ $image->name }}">
            @endforeach
            
        </div>
    </p>
    @endif
@endsection
