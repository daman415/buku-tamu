@extends('layouts.admin.app')


@section('content')
    <div class="section-header">
        <h1>Data Pengunjung</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Pengunjung</a></div>
            <div class="breadcrumb-item"><a href="#">Index</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tabel Data Pengunjung</h2>
        <p class="section-lead">Admin dapat mengelola Data Pengunjung</p>


        <div class="card">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="card-header">
                <a href="{{ route('pengunjung.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>

            @foreach ($pengunjung as $r)
            <div class="card-body">

                <div class="col col-lg-12 mb-lg-0">
                    <div class="card mb-1" style="border-radius: .5rem; background-color: #f4f5f7;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ asset($r->foto.'/1.png') }}"
                                    alt="Avatar" class="img-fluid my-3" style="width: 100px; height:100px" />
                                <h5 style="color: #6c757d">{{ $r->nama }}</h5>
                                <p style="color: #6c757d">{{ $r->pekerjaan }}</p>
                                <h6 style="color: #6c757d">{{ $r->tgl }}</h6>
                                <h6 style="color: #6c757d">{{ $r->jam }}</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">

                                    <div class="row">
                                        <h6>INFORMASI PENGUNJUNG</h6>
                                        <a href="/"><i class="far fa-edit"></i></a>
                                    </div>
                                    <hr class="mt-0 mb-2">
                                    <div class="row pt-1">
                                        <div class="col-6">
                                            <h6>{{ strtoupper($r->j_identitas) }}</h6>
                                            <p class="text-muted">{{ $r->n_identitas }}</p>
                                        </div>
                                        <div class="col-6">
                                            <h6>Nomor HP</h6>
                                            <p class="text-muted">{{ $r->no_hp }}</p>
                                        </div>
                                        <div class="col-12">
                                            <h6>Alamat</h6>
                                            <p class="text-muted">{{ ucwords($r->alamat) }}</p>
                                        </div>
                                        <div class="col-6">
                                            <h6>Keperluan</h6>
                                            <p class="text-muted">{{ ucwords($r->keperluan) }}</p>
                                        </div>
                                        <div class="col-6">
                                            <h6>Tujuan</h6>
                                            <p class="text-muted">{{ ucwords($r->tujuan) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @endforeach
            {{ $pengunjung->links() }}
        </div>
    </div>

@endsection
