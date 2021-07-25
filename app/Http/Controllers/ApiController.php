<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class ApiController extends Controller
{
    public function editNilai(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->mapel()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
    }
}
