<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Http\Requests\StoreApplicantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response::view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicantRequest $request)
    {
        $applicant = new Applicant();
        $applicant->fill($request->validated());
        $applicant->save();

        if($request->hasFile('photo')) {
            $filename = $applicant->id . "." . $request->file('photo')->extension();
            $request->file('photo')->storeAs('candidatos/fotos/', $filename);
            $applicant->photo = 'candidatos/fotos/' . $filename;
            $applicant->save();
        }

        return Response::redirectToRoute('home')
            ->with('successMessage', 'Candidato cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
