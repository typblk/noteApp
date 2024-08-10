@extends('layouts.layout')

@section('content')
<div class="container">

    <form action="" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-12">
            <label for="title" class="form-label">Başlık</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $notes->title) }}" required>
        </div>

        <div class="col-6">
            <label for="category_id" class="form-label">Kategori</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="" disabled>Kategori Seç</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $notes->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-6">
            <label for="color" class="form-label">Renk</label>
            <select id="color" name="color" class="form-select" required>
                <option value="" disabled>Renk Seç</option>
                <option value="bg-danger" {{ $notes->color == 'bg-danger' ? 'selected' : '' }}>Kırmızı</option>
                <option value="bg-primary" {{ $notes->color == 'bg-primary' ? 'selected' : '' }}>Mavi</option>
                <option value="bg-success" {{ $notes->color == 'bg-success' ? 'selected' : '' }}>Yeşil</option>
                <option value="bg-warning" {{ $notes->color == 'bg-warning' ? 'selected' : '' }}>Sarı</option>
                <option value="bg-white" {{ $notes->color == 'bg-white' ? 'selected' : '' }}>Beyaz</option>
                <option value="bg-info" {{ $notes->color == 'bg-info' ? 'selected' : '' }}>Açık Mavi</option>
                <!-- Diğer renk seçeneklerini ekleyin -->
            </select>
        </div>

        <div class="col-12">
            <label for="note" class="form-label">Not</label>
            <textarea name="note" id="note" rows="5" class="form-control" required>{{ old('note', $notes->note) }}</textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">Kaydet</button>
        </div>
    </form>
</div>
@endsection
