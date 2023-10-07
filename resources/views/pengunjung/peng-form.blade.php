@extends('layouts.admin.app')

@section('content')
    <div class="section-header">
        <h1>Data Pengunjung</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Pengunjung</a></div>
            <div class="breadcrumb-item"><a href="#"> {{ isset($edit) ? 'Edit' : 'Tambah' }}</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Data Pengunjung</h2>
        <div class="card">
            <form action="{{ isset($edit) ? route('pengunjung.update', $edit->id) : route('pengunjung.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($edit))
                    @method('PATCH')
                @endif
                <div class="card-header">
                    <a href="{{ route('pengunjung.index') }}" class="btn btn-icon icon-left btn-primary"><i
                            class="fas fa-arrow-left"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="">Nama Pengunjung</label>
                            <input type="text" name="nama" value="{{ old('nama', isset($edit) ? $edit->nama : '') }}"
                                class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <label class="">Jenis Identitas</label>
                            <select name="jIdent" class="form-control" required="">
                                <option value="" readonly>--Pilih--</option>
                                <option value="ktp" {{ isset($edit) && $edit->jk === 'ktp' ? 'selected' : '' }}>KTP
                                </option>
                                <option value="sim" {{ isset($edit) && $edit->jk === 'sim' ? 'selected' : '' }}>SIM
                                </option>
                                <option value="passport" {{ isset($edit) && $edit->jk === 'passport' ? 'selected' : '' }}>
                                    Passport</option>
                                <option value="kPelajar" {{ isset($edit) && $edit->jk === 'kPelajar' ? 'selected' : '' }}>
                                    Kartu Pelajar</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label class="">Nomor Identitas</label>
                            <input type="text" name="nIdent"
                                value="{{ old('nIdent', isset($edit) ? $edit->n_identitas : '') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="">Jenis Kelamin</label>
                            <select name="jenisKelamin" class="form-control" required="">
                                <option value="" readonly>--Pilih--</option>
                                <option value="laki-laki"
                                    {{ isset($edit) && $edit->jk === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="perempuan"
                                    {{ isset($edit) && $edit->jk === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label class="">Pekerjaan</label>
                            <input type="text" name="pekerjaan"
                                value="{{ old('pekerjaan', isset($edit) ? $edit->pekerjaan : '') }}" class="form-control"
                                required="">
                        </div>
                        <div class="col-sm-4">
                            <label class="">Nomor HP</label>
                            <input type="text" name="noHp" value="{{ old('noHp', isset($edit) ? $edit->noHp : '') }}"
                                class="form-control" required="">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="">Alamat</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="">Keperluan</label>
                            <input type="text" name="keperluan"
                                value="{{ old('keperluan', isset($edit) ? $edit->keperluan : '') }}" class="form-control"
                                required="">
                        </div>
                        <div class="col-sm-4">
                            <label class="">Tujuan</label>
                            <select name="tujuan" class="form-control" required="">
                                <option value="" readonly>--Pilih--</option>
                                <option value="direktur"
                                    {{ isset($edit) && $edit->status_kepegawaian === 'direktur' ? 'selected' : '' }}>Direktur
                                </option>
                                <option value="sekretaris"
                                    {{ isset($edit) && $edit->status_kepegawaian === 'sekretaris' ? 'selected' : '' }}>
                                    Sekretaris</option>
                                <option value="cs"
                                    {{ isset($edit) && $edit->status_kepegawaian === 'cs' ? 'selected' : '' }}>CS
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label class="">Jam Kunjungan</label>
                            <input type="time" name="jam" value="{{ old('jam', isset($edit) ? $edit->jam : '') }}"
                                class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="">Input Foto Selfie Ke-1</label>
                            <input type="file" name="uji1" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class="">Input Foto Selfie Ke-2</label>
                            <input type="file" name="uji2" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
