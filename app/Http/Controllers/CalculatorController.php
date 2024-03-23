<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalculationHistory;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request) // method untuk memproses data
    {
        // Validasi input
        $request->validate([
            'number1' => 'required|numeric',
            'operator' => 'required|in:+,-,*,/,%',
            'number2' => 'required|numeric',
        ]);

        // Ambil nilai input
        $number1 = $request->input('number1');
        $operator = $request->input('operator');
        $number2 = $request->input('number2');

        // Lakukan perhitungan sesuai operator
        $result = 0;
        switch ($operator) {
            case '+': // Penanganan untuk operasi tambah
                $result = $number1 + $number2;
                break;
            case '-': // Penanganan untuk operasi kurang
                $result = $number1 - $number2;
                break;
            case '*': // Penanganan untuk operasi kali
                $result = $number1 * $number2;
                break;
            case '/': // Penanganan untuk operasi bagi
                if ($number2 == 0) {
                    return redirect()->back()->with('error', 'Pembagian dengan nol tidak diperbolehkan.');
                }
                $result = $number1 / $number2;
                break;
            case '%': // Penanganan untuk operasi modulo
                $result = $number1 % $number2;
                break;
        }        

        // Simpan hasil perhitungan ke dalam database
        CalculationHistory::create([
            'number1' => $number1,
            'operator' => $operator,
            'number2' => $number2,
            'result' => $result,
        ]);

        // Simpan hasil perhitungan ke dalam session
        $request->session()->flash('result', $result);
        
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Hasil perhitungan: ' . $result);
    }

    public function history()
    {
        // Ambil semua riwayat perhitungan dari database
        $calculations = CalculationHistory::all();
        return view('history', ['calculations' => $calculations]);
    }
}

