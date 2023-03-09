@extends('layouts.main')
@section('container')
    <h1 class="text-center">Math</h1>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="border rounded p-2">
                <h3>Jumlah Angka Prima</h3>
                <form action="/math/prima" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="input1" class="form-label">Max Angka</label>
                        <input type="number" class="form-control" name="input1" id="input1" autocomplete="off"
                            onkeypress="return event.charCode != 101">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="border rounded p-2">
                <h3>Fibonacci Sequence</h3>
                <form action="/math/fibonacci" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="input1" class="form-label">Batas (digit)</label>
                        <input type="number" class="form-control" name="input1" id="input1" autocomplete="off"
                            onkeypress="return event.charCode != 101">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
