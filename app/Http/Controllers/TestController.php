<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('test.test-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        function splitUpper($string)
        {
            return str_split(strtoupper($string));
        }

        $requestInput1 = splitUpper($request->input1);
        $requestInput2 = splitUpper($request->input2);

        $countCharacter = 0;
        $countInput1 = count($requestInput1);

        $input1 = array_values(array_unique($requestInput1)); //rearrange


        for ($i = 0; $i < count($input1); $i++) {
            for ($j = 0; $j < count($requestInput2); $j++) {
                if ($input1[$i] == $requestInput2[$j]) {
                    $countCharacter++;
                    break;
                }
            }
        }

        $pecahan = $countCharacter . '/' . $countInput1;
        $persen = round((float)($countCharacter / $countInput1) * 100) . '%';

        $message = $pecahan . ' Karakter (' . $persen . ')';

        return redirect('/test')->with('alert', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
