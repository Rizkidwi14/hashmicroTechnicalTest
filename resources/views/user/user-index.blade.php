@extends('layouts.main')


@section('container')
    <h1 class="text-center">Users</h1>

    {{-- Button Tambah User --}}
    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah User
    </button>

    {{-- Modal Tambah User --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/user" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-2">
                            <label for="password_confirmation" class="form-label">Ulangi Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" required>
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
            <th>Username</th>
            <th>Password (hashed)</th>
            <th></th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->password }}</td>
                <td>
                    <div class="hstack gap-2 justify-content-center">

                        {{-- Tombol Ubah Password --}}
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalTambah{{ $user->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        {{-- Modal Ubah Password --}}
                        <div class="modal fade" id="modalTambah{{ $user->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/user/{{ $user->id }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="modal-body text-start">
                                            <div class="mb-2">
                                                <label for="passwordLama" class="form-label">Password Lama</label>
                                                <input type="password" name="passwordLama" class="form-control"
                                                    id="passwordLama" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="password" class="form-label">Password Baru</label>
                                                <input type="password" name="password" class="form-control" id="password"
                                                    required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="password_confirmation" class="form-label">Ulangi
                                                    Password Baru</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    id="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <form action="/user/{{ $user->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Data user akan dihapus?')">
                                <i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
