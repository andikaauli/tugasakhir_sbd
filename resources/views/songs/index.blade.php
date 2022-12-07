@extends('layouts.main')

@section('title', 'Song List')

@section('content')
      <div class="container">
        <div class="row mt-5">
            <div class="col md-12">
                <h1>Song List</h1>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <a href="/song/create" class="btn btn-primary">Tambah Data</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <ol class="list-group">
                    @foreach ($songs as $song)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold fs-4">{{ $loop->iteration}}. {{$song->title_songs}}
                        </div>
                        {{$song->nama_band}}
                      </div>
                      <div>
                        <a href="song/{{ $song->id_songs}}/edit" class="btn btn-success">Edit</a>
                        <form action="/song/{{ $song->id_songs}}" method="POST">
                            @method('delete')
                            @csrf
                            <button href="" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </li>
                    @endforeach
                  </ol>
            </div>
        </div>
      </div>
@endsection
