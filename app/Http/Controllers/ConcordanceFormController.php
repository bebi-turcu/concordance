<?php

namespace App\Http\Controllers;

use App\Services\Concordance;
use Illuminate\Http\Request;

class ConcordanceFormController extends Controller
{
    public function createForm(Request $request) {
        return view('concordance');
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'text' => 'required'
        ]);

        $data = [
            'concordance' => Concordance::generate($request->text),
            'text' => $request->text
        ];

        return view('concordance', $data);
    }
}
