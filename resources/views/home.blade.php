@extends('layouts.master')

@section('imports')
<link rel="stylesheet" href="{{ url("css/home.css") }}">
@endsection

@section('content')
<div class="container">



    <div class="row">
        <div class="col-lg-10 offset-1 text-center mt-4 mb-4">
            <h1 class="title mb-4"> - Rei do Almoço - </h1>
            <a class="btn btn-primary  btn-apply" href="{{ url("candidato/cadastrar") }}">Candidatar-se</a>
        </div>
    </div>

    @if($dateNow->format('H') < 10 && $dateNow->format('His') > 120100)

    <div class="row">
        <div class="col-lg-6 offset-3 text-center">

            <h2>Rei do almoço</h2>
            <h3>{{ $mostVotedDaily->created_at }}</h3>

            <div class="card text-center">
                <img class="card-img-top" src="{{ url("storage/" . $mostVotedDaily->applicant->photo ) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $mostVotedDaily->applicant->name }}</h5>
                    <p>{{ $mostVotedDaily->votes }} Votos </p>
                </div>
            </div>

        </div>
    </div>

    @endif


    <div class="row">
        <div class="col-lg-10 offset-1 vh-100">

            @if($dateNow->format('H') >= 10 && $dateNow->format('His') <= 120100)

                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Busca">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button" id="button-addon2">Pesquisar</button>
                    </div>
                </div>

                <div class="card-columns">

                    @foreach($applicants as $applicant)

                        <div class="card text-center">
                            <img class="card-img-top" src="{{ url("storage/" . $applicant->photo ) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $applicant->name }}</h5>
                                <form action="{{ url("candidato/votar") }}" method="POST">

                                    @csrf
                                    <input type="hidden" name="id" value="{{ $applicant->id }}" />
                                    <button type="submit" class="btn btn-primary">Votar</button>
                                </form>
                            </div>
                        </div>

                    @endforeach

                </div>
            @else
                <h5 class="text-center">As votações ocorrem diariamente das 10:00 às 12:00</h5>
            @endif



        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-5 offset-1">

            <h3 class="mb-4">Reis das últimas semanas</h3>

            <ul class="list-unstyled">

                @foreach($winnersPastWeeks as $winnerPastWeeks)

                    <li class="media mb-2">
                        <img class="mr-3 img-fluid" src="{{ url("storage/" . $winnerPastWeeks->photo ) }}" >
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{ $winnerPastWeeks->name }}</h5>
                            <span>{{ $winnerPastWeeks->votes }} votos</span>
                        </div>
                    </li>

                @endforeach

            </ul>


        </div>

        <div class="col-lg-5 offset-1">

            <h3 class="mb-4">Menos amados das semanas</h3>

            <ul class="list-unstyled">

                @foreach($leastLovedsPastWeeks as $leastLovedPastWeeks)

                    <li class="media mb-2">
                        <img class="mr-3 img-fluid" src="{{ url("storage/" . $leastLovedPastWeeks->photo ) }}" >
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{ $leastLovedPastWeeks->name }}</h5>
                            <span>{{ $leastLovedPastWeeks->votes }} votos</span>
                        </div>
                    </li>

                @endforeach

            </ul>


        </div>
    </div>
</div>
@endsection
