@extends('layouts.main')


@section('container')
    <h1 class="text-center">User Input Test</h1>
    <form action="/test" method="post">
        @csrf
        <div class="mb-3">
            <label for="input1" class="form-label fs-3">Input 1</label>
            <input type="text" class="form-control text-uppercase" name="input1" id="input1" autocomplete="off" autofocus
                onkeypress="return event.charCode != 32">
        </div>
        <div class="mb-3">
            <label for="input2" class="form-label fs-3">Input 2</label>
            <input type="text" class="form-control" name="input2" id="input2" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
