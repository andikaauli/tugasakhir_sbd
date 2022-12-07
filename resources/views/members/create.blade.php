@extends('layouts.main')

@section('title', 'Add Member')

@section('content')
      <div class="container">
        <div class="row mt-5">
            <form method="POST" action="/member">
                @csrf
                <div class="mb-3">
                    <label for="id_personil" class="form-label">ID Personil</label>
                    <input type="text" class="form-control @error('id_personil') is-invalid @enderror" id="id_personil" name="id_personil" placeholder="ID Personil" value="{{ old('id_personil')}}">
                    <div class="invalid-feedback">
                        Please fill ID Personil.
                      </div>
                </div>
                <div class="mb-3">
                    <label for="id_band" class="form-label">ID Band</label>
                    <input type="text" class="form-control  @error('id_band') is-invalid @enderror" id="id_band" name="id_band" placeholder="ID_Band "value="{{ old('id_band')}}">
                    <div class="invalid-feedback">
                        Please fill ID_band.
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
                    <label for="nama_personil" class="form-label">Nama Personil</label>
                    <input type="nama_personil" class="form-control  @error('nama_personil') is-invalid @enderror" id="nama_personil" name="nama_personil" placeholder="Nama Personil" value="{{ old('nama_personil')}}">
                    <div class="invalid-feedback">
                        Please fill Nama Personil.
                      </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="tanggal_lahir" class="form-control  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir')}}">
                    <div class="invalid-feedback">
                        Please fill Tanggal Lahir.
                      </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
      </div>
@endsection
