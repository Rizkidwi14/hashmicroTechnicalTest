@extends('layouts.main')

@section('container')
    <h1 class="text-center">Buku</h1>

    {{-- Button Tambah Author --}}
    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah Author
    </button>

    {{-- Modal Tambah Author --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Data Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/author" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="ulang_tahun" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="ulang_tahun" class="form-control" id="ulang_tahun" required
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="networth" class="form-label">Networth (USD)</label>
                            <input type="number" name="networth" class="form-control" id="stok" min="1"
                                pattern="[0-9]" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table id="table" class="table border table-striped table-sm table-hover align-middle text-capitalize">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Birthday</th>
            <th>Networth</th>
            <th></th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $author->nama }}</td>
                <td>{{ $author->ulang_tahun }}</td>
                <td class="text-end">$ {{ number_format($author->networth) }}</td>


                <td>
                    <div class="hstack gap-2 justify-content-center">

                        {{-- Tombol Ubah Author --}}
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalTambah{{ $author->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        {{-- Modal Ubah Author --}}
                        <div class="modal fade" id="modalTambah{{ $author->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Data Author</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/author/{{ $author->id }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="modal-body text-start">
                                            <div class="mb-2">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="nama"
                                                    required value="{{ $author->nama }}">
                                            </div>
                                            <div class="mb-2">
                                                <label for="ulang_tahun" class="form-label">ulang_tahun</label>
                                                <input type="date" name="ulang_tahun" class="form-control"
                                                    id="ulang_tahun" required value="{{ $author->ulang_tahun }}">
                                            </div>
                                            <div class="mb-2">
                                                <label for="networth" class="form-label">Networth (USD)</label>
                                                <input type="text" name="networth" class="form-control" id="networth"
                                                    required value="{{ $author->networth }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <form action="/author/{{ $author->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Data author akan dihapus?')">
                                <i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
