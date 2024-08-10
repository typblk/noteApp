@extends('layouts.layout')

@section('content')

<div class="mb-4">
    <div class="dropdown">
        <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrele
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/">Hepsi</a></li>
            @foreach($categories as $category)
            <li><a class="dropdown-item" href="/categories/{{ $category['id'] }}">{{ $category['category'] }}</a></li>
            @endforeach
        </ul>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}F
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
    @foreach($notes as $note)
    <div class="col">
        <div class="card {{ $note['color'] }} text-dark bg-opacity-10 mb-3">
            <div class="card-header bg-transparent">
                <div class="d-flex justify-content-between">
                    <span>{{ $note['category']['category'] }}</span>
                    <div class="ms-auto">
                        <a href="/notes/{{ $note['id'] }}" class="btn p-1"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('notes.destroy', $note['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn p-1"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $note['title'] }}</h5>
                <p class="card-text">{{ $note['note'] }}</p>
            </div>
            <div class="card-footer bg-transparent ">
                <small>{{ $note['created_at'] }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection