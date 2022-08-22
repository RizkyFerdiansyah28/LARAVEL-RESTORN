@extends('template.layout')

@section('content')

    <div>
        <form action="/store" method="post" enctype="multipart/form-data">
            @csrf

            @error('kategorip')
                <p>{{ $message }}</p>
            @enderror


            <input class="border @error('kategorip')
            border-red-500
            @enderror" type="text" name="kategorip">

            <input type="file" name="image">

            <input type="submit" name="kategori" value="simpan">
        </form>
    </div>

    <h1>Home</h1>

    @foreach ($kategori as $isi)
        <li> {{ $isi->kategori }} -- <a href="/store/{{ $isi->idkategori }}"> Hapus </a> </li>
    @endforeach
@endsection
