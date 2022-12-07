@extends('layouts.main')

@section('title', 'Add Song')

@section('content')
      <div class="container">
        <div class="row mt-5">
            <form method="POST" action="/song">
                @csrf
                <div class="mb-3">
                    <label for="id_songs" class="form-label">ID Lagu</label>
                    <input type="text" class="form-control @error('id_songs') is-invalid @enderror" id="id_songs" name="id_songs" placeholder="ID Lagu" value="{{ old('id_songs')}}">
                    <div class="invalid-feedback">
                        Please fill ID Lagu.
                      </div>
                </div>
                <div class="mb-3">
                    <label for="title_songs" class="form-label">Judul</label>
                    <input type="text" class="form-control  @error('title_songs') is-invalid @enderror" id="title_songs" name="title_songs" placeholder="Judul "value="{{ old('title_songs')}}">
                    <div class="invalid-feedback">
                        Please fill Judul.
                      </div>
                </div>
                {{-- <div class="mb-3">
                    <select name="id_album" id="id_album">
                        @foreach ($album as $alb)
                        <option value="{{ $alb->id_albums }}">{{ $alb->nama_album }}</option>

                        @endforeach
                    </select>
                    <label for="nama_album" class="form-label">Album</label>
                    <input type="nama_album" class="form-control" id="nama_album" name="password">
                </div> --}}
                <div class="mb-3">
                    <label for="nama_band" class="form-label">Band</label>
                    <input type="nama_band" class="form-control  @error('nama_band') is-invalid @enderror" id="nama_band" name="nama_band" placeholder="Band" value="{{ old('nama_band')}}">
                    <div class="invalid-feedback">
                        Please fill Band.
                      </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
      </div>
@endsection
