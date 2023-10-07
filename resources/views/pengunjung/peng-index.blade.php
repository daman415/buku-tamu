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
            <div class="card-body">

                <div class="col col-lg-12 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem; background-color: #f4f5f7;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="Avatar" class="img-fluid my-3" style="width: 100px;" />
                                <h5 style="color: #6c757d">Marie Horwitz</h5>
                                <p style="color: #6c757d">Web Designer</p>
                                <h6 style="color: #6c757d">Rabu, 20 September 2023</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">

                                    <div class="row">
                                        <h6>Information</h6>
                                        <a href="/"><i class="far fa-edit"></i></a>
                                    </div>
                                    <hr class="mt-0 mb-2">
                                    <div class="row pt-1">
                                        <div class="col-6">
                                            <h6>KTP</h6>
                                            <p class="text-muted">12345678</p>
                                        </div>
                                        <div class="col-6">
                                            <h6>Nomor HP</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                        <div class="col-12">
                                            <h6>Alamat</h6>
                                            <p class="text-muted">adhhdhdhad dadsdada sdadadad asdadasd asdda</p>
                                        </div>
                                        <div class="col-6">
                                            <h6>Keperluan</h6>
                                            <p class="text-muted">Meeting</p>
                                        </div>
                                        <div class="col-6">
                                            <h6>Tujuan</h6>
                                            <p class="text-muted">Manager</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- @foreach ($getPasien as $index => $pasien)
        <!-- Modal Hapus -->
        <div class="modal fade" data-backdrop="false" id="modalPegDestroy{{ $pasien->id }}" tabindex="-1"
            style="display: none;" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('pasien.destroy', $pasien->id) }}"
                        enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                @if ($pasien->status == 0)
                                    {{ 'Aktifkan Data' }}
                                @elseif ($pasien->status == 1)
                                    {{ 'Non-Aktifkan Data' }}
                                @endif
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            @if ($pasien->status == 0)
                                <h5 class="text-center">Apakah anda ingin mengaktifkan data {{ $pasien->nama }}?</h5>
                            @elseif ($pasien->status == 1)
                                <h5 class="text-center">Apakah anda ingin menon-aktifkan data {{ $pasien->nama }}?</h5>
                            @endif
                            <p class="text-center">Tekan tombol BACK untuk membatalkan.</p>
                        </div>
                        <div class="modal-footer mb-3">
                            <button type="submit" class="btn btn-primary">Ya, Lanjutkan</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Back</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    @endforeach --}}
@endsection
