<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gift;

class UltahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ulang-tahun');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $birthday = $request->input('birthday');
        $today = now()->format('m-d');
        $birthdayDate = \Carbon\Carbon::parse($birthday)->format('m-d');
        // date('d-m-Y', strtotime($user->from_date));
        if ($today === $birthdayDate) {
            $message = "HELLO ".$nama." WE WISH YOU HAPPY BIRTHDAY ON ".date('d-m-Y', strtotime($birthday));
            $hadiah = Gift::select('id', 'name')->get();
        } else {
            $message = "Belum ulang tahun";
            $hadiah = null;
        }

        return view('ulang-tahun',  [
            'hadiah'    => $hadiah,
            'message'   => $message,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
