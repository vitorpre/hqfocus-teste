<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VoteController extends Controller
{
    public function vote(Request $request) {

        $vote = new Vote();
        $vote->applicant_id = $request->get('id');

        $vote->save();

        return Response::redirectToRoute('home')
            ->with('successMessage', 'Voto computado!');
    }
}
