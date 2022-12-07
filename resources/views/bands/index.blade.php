@extends('layouts.main')

@section('title', 'Song List')

@section('content')
      <div class="container">
        <div class="row mt-5">
            <div class="col md-12">
                <h1>Band List</h1>
                <ol class="list-group">
                    @foreach ($bands as $band)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold fs-4">{{ $loop->iteration}}. {{$band->nama_band}}
                        </div>
                        {{-- <div class="fw-bold fs-4">{{$music->nama_album}}
                        </div>
                        {{$music->nama_band}} --}}
                        <span class="badge bg-primary rounded-pill">{{$band->tahun}}</span>
                      </div>
                      <div>


                        <a href="" class="btn btn-danger">delete</a>
                      </div>

                    </li>
                    @endforeach
                  </ol>
            </div>
        </div>
      </div>
@endsection
