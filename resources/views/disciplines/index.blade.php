@extends('menu.menu')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </head>
    <style>
        body {
            background-color: #F9F9F9;
        }

        .table {
            width: 600px !important;
            position: relative;
            left: 30%;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .empty-alunos {
            position: relative;
            top: 130px;
        }

        .empty-btn-alunos {
            position: relative;
            top: 130px;

        }

        .empty-btn-alunos a {
            color: white;
            text-decoration: none;
        }

        .box-full {
            border: 1px solid #B3B3B3;
            height: 230px;
            border-radius: 10px;
            background-color: white;
        }

        .box-full:hover {
            box-shadow: 11px 9px 16px -9px rgba(143, 136, 143, 1);
        }
        .btn-activity {
            border: none;
            background-color: #006494;
            border-radius: 7px;
            height: 40px;
            color: white;
        }
    </style>

    <body>


        <h1 style="text-align: center;">Disciplinas</h1>
        <br><br>
        <br><br>
        <div class="container text-center">
            <div class="row align-items-start">
                @forelse ($disciplinesCount as $disciplinas)
                    <div class="col-3 my-3">
                        <a href="{{ route('atividades.index', $disciplinas->id) }}" style="color:black;">
                            <div class="box-full"><br>
                                <h4>{{ $disciplinas->name }}</h4><br>
                                <button type="button" class="btn-activity position-relative">
                                    Atividades
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $disciplinas->activity_model_count }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </div>
                        </a>
                    </div>
                @empty
                    Não existe
                @endforelse

            </div>
        </div>

        {{-- <div class="container text-center">
            <div class="row align-items-center">
                <div class="col">
                    <table class="table" sty>
                        <thead>
                            <tr>
                                <th scope="col-3">Nome</th>
                                <th scope="col-3" colspan="3">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($disciplines as $disciplina)
                            <tr>
                                <td>{{ $disciplina->name }}</td>
                                <td>
                                    <a
                                    href="{{ route('atividades.index', $disciplina->id) }}"><button type="button" class="btn btn-warning">
                                        Atividades
                                        </span>
                                      </button></a>
                                </td>
                                @if (Auth::user()->roles_id == 1)
                                <td><button class="btn btn-info btn-edit"> <a
                                    href="{{ route('disciplines.edit', $disciplina->id) }}"><i class="bi bi-pencil"></i>
                                </a></button>
                                </td>
                                <td><button class="btn btn-danger"
                                    onclick="excluir({{ $disciplina->id }})"><i class="bi bi-trash3"></i>
                                            </button></td>
                                            @endif
                                        </tr>
                                        @empty
                                        <h6>Sem disciplinas existentes.</h6>
                                        @endforelse
                                    </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script src="/assets/js/jquery.js"></script>
        <script src="/assets/js/disciplines/index.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </body>

    </html>
@endsection
