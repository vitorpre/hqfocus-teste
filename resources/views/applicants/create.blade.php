@extends('layouts.master')

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-1 vh-100">

            <h1>Cadastro de candidato</h1>
            <form method="post" enctype="multipart/form-data" action="{{ url('candidato/salvar') }}">

                @csrf

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="name" class="form-control" id="nome" placeholder="Informe seu nome">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Informe seu email">
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="photo" class="form-control-file" id="foto">
                </div>

                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
