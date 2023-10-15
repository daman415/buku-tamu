@extends('layouts.admin.app')


@section('content')
    <div class="section-header">
        <h1>Data User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="#">Index</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tabel Data User</h2>
        <p class="section-lead">Admin dapat mengelola Data User</p>


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

            
        </div>
    </div>

@endsection
