@extends('layouts.main')

@section('title', 'Song List')

@section('content')
      <div class="container">
        <div class="row mt-5">
            <div class="col md-12">
                <h1>Members List</h1>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <a href="/member/create" class="btn btn-primary">Tambah Data</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <ol class="list-group">
                    @foreach ($members as $member)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold fs-4">{{ $loop->iteration}}. {{$member->nama_personil}}
                        </div>
                        {{-- <div class="fw-bold fs-4">{{$music->nama_album}}
                        </div>
                        {{$music->nama_member}} --}}
                        <span class="badge bg-primary rounded-pill">{{$member->tanggal_lahir}}</span>
                      </div>
                      <div>
                        <a href="member/{{ $member->id_personil}}/edit" class="btn btn-success">Edit</a>
                        <form action="/member/{{ $member->id_personil}}" method="POST">
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
