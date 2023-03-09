@extends('layouts.main')

@section('container')
    <h1 class="text-center">Buku</h1>

    {{-- Button Tambah Author --}}
    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah Buku
    </button>

    {{-- Modal Tambah Author --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Data Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/buku" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" required
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="kategori" required
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="terjual" class="form-label">Total Terjual</label>
                            <input type="number" name="terjual" class="form-control" id="terjual" required
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="author" class="form-label">Author</label>
                            <select class="form-control" name="author_id" id="author">
                                <option value="" selected hidden>Select Author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->nama }}</option>
                                @endforeach
                            </select>
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
            <th>Judul</th>
            <th>Kategori</th>
            <th>Total Terjual</th>
            <th>Author</th>
            <th></th>
        </tr>
        @foreach ($bukus as $buku)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->kategori }}</td>
                <td class="text-end">{{ number_format($buku->terjual) }}</td>
                <td>{{ $buku->nama }}</td>


                <td>
                    <div class="hstack gap-2 justify-content-center">

                        {{-- Tombol Ubah Password --}}
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalTambah{{ $buku->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        {{-- Modal Ubah Password --}}
                        <div class="modal fade" id="modalTambah{{ $buku->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/buku/{{ $buku->id }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <label for="judul" class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="judul"
                                                    value="{{ $buku->judul }}" required autocomplete="off">
                                            </div>
                                            <div class="mb-2">
                                                <label for="kategori" class="form-label">Kategori</label>
                                                <input type="text" name="kategori" class="form-control" id="kategori"
                                                    value="{{ $buku->kategori }}" required autocomplete="off">
                                            </div>
                                            <div class="mb-2">
                                                <label for="terjual" class="form-label">Total Terjual</label>
                                                <input type="number" name="terjual" class="form-control" id="terjual"
                                                    value="{{ $buku->terjual }}" required autocomplete="off">
                                            </div>
                                            <div class="mb-2">
                                                <label for="author" class="form-label">Author</label>
                                                <select class="form-control" name="author_id" id="author">
                                                    <option value="{{ $buku->author_id }}" selected hidden>
                                                        {{ $buku->nama }}
                                                    </option>
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->id }}">{{ $author->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <form action="/buku/{{ $buku->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Data Buku akan dihapus?')">
                                <i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
