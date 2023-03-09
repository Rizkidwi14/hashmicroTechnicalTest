<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class MathController extends Controller
{
    public function index()
    {
        return view('math.math-index');
    }

    public function prima(Request $request)
    {
        $prime = 0;
        function checkPrime($num)
        {
            // 1 bukan angka prima
            if ($num == 1) {
                return 0;
            }

            for ($i = 2; $i <= $num / 2; $i++) {
                if ($num % $i == 0) {
                    return 0;
                }
            }
            return true;
        }

        // cek angka prime kurang dari ####
        for ($i = 1; $i <= $request->input1; $i++) {
            if (checkPrime($i)) {
                $prime++;
            };
        }

        $message = new HtmlString('Jumlah angka prima dari 1 - ' . $request->input1 . ' adalah ' . $prime);
        return redirect('/math')->with('alert', $message);
    }

    public function fibonacci(Request $request)
    {
        $n = $request->input1;

        $num1 = 1;
        $num2 = 1;

        $batas = 0;

        while ($batas < $n) {
            $numberdisplay[] = $num1;
            $num3 = $num2 + $num1;
            $num1 = $num2;
            $num2 = $num3;
            $batas = $batas + 1;
        }

        $sequence = (implode(', ', $numberdisplay));
        $message = new HtmlString('Fibonacci Sequence: ' . $sequence);
        return redirect('/math')->with('alert', $message);
    }
}
