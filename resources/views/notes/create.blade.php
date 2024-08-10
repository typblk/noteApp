@extends('layouts.layout')

@section('content')
<div class="container">

    <form action="{{ route('notes.store') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-12">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Başlık" required>
        </div>

        <div class="col-6">
            <label for="category_id" class="form-label">Kategori</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="" >Kategori Seç</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-6">
            <label for="color" class="form-label">Renk</label>
            <select id="color" name="color" class="form-select" required>
                <option value="">Renk Seç</option>
                <option value="bg-danger">Kırmızı</option>
                <option value="bg-primary">Mavi</option>
                <option value="bg-success">Yeşil</option>
                <option value="bg-warning">Sarı</option>
                <option value="bg-white">Beyaz</option>
                <option value="bg-info">Açık Mavi</option>
                <!-- Diğer renk seçeneklerini ekleyin -->
            </select>
        </div>

        <div class="col-12">
            <label for="note" class="form-label">Not</label>
            <textarea name="note" id="note" rows="5" class="form-control" placeholder="Not" required></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">Kaydet</button>
        </div>
    </form>
</div>
@endsection
