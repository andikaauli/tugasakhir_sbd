@extends('layouts.main')

@section('title', 'Song List')

@section('content')
      <div class="container">
        <div class="row mt-5">
            <div class="col md-12">
                <h1>Song List</h1>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <ol class="list-group">
                    @foreach ($musics as $music)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold fs-4">{{ $loop->iteration}}. {{$music->title_songs}}
                        </div>
                        <div class="fw-bold fs-4">{{$music->nama_album}}
                        </div>
                        {{$music->nama_band}}
                      </div>
                      <div>
                        <span class="badge bg-primary rounded-pill">{{$music->tahun_terbit}}</span>
                      </div>

                    </li>
                    @endforeach
                  </ol>
            </div>
        </div>
      </div>
@endsection
