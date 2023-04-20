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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    </head>
    <style>
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
            height: 200px;
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
        @if (Auth::user()->roles_id == 1)
            <button class="btn btn-primary criar-disciplines"><a
                    href="{{ route('atividades.create', $disciplinasID->id) }}">Criar
                    atividades</a></button>
        @endif
        <h1 style="text-align: center;">Atividades de {{ $disciplinasID->name }}</h1>
        <br>

        <div class="container text-center">
            <div class="row align-items-start">
                @forelse ($atividades as $atividade)
                    <div class="col-3">
                        <span href="" style="color:black;">
                            <div class="box-full"><br>

                                @if (Auth::user()->roles_id == 1)
                                    <h4>{{ $atividade->name }}</h4>
                                    <hr>
                                    <div style="margin-top:26px;"class="list-group">
                                        <a href="{{ route('response.index', $atividade->id) }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="bi bi-person-fill-check"></i></a>
                                        <a
                                            href="{{ route('atividades.edit', $atividade->id) }}"class="list-group-item list-group-item-action"><i
                                                class="bi bi-pencil"></i></a>
                                        <a href="{{ route('atividades.destroy', $atividade->id) }}"
                                            class="list-group-item list-group-item-action"><i class="bi bi-trash3"></i></a>
                                    </div>
                                @elseif(Auth::user()->roles_id == 2 && in_array($atividade->id, $activities))
                                    <br>
                                    <h4>{{ $atividade->name }}</h4><br><br>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"></li>
                                        <li style="background-color: #29b44a; height:50px; border-bottom-right-radius: 10px;
                                    border-bottom-left-radius: 10px;"
                                            class="list-group-item">Atividade enviada</li>

                                    </ul>
                                    <div style="margin-top: 37px;"class="list-group">
                                    </div>
                                @else
                                    <h4>{{ $atividade->name }}</h4>
                                    <br>
                                    {{$atividade->description}}
                                    <div style="margin-top: 21px;"class="list-group">
                                        <a href="{{ route('atividades.responder', $atividade->id) }}"
                                            class="list-group-item list-group-item-action"><i
                                                class="bi bi-pc-display-horizontal"></i></a>
                                        <a
                                            href="{{ route('atividades.respondida', $atividade->id) }}"class="list-group-item list-group-item-action"><i
                                                class="bi bi-arrow-right-circle-fill"></i></i></a>
                                    </div>
                                @endif

                            </div>
                        </span>
                        {{-- <div class="card" style="width: 13rem; ">
                        <div class="card-body">
                            <h5 class="card-title">{{ $atividade->name }}</h5>
                            <p class="card-text">{{ $atividade->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><button class="btn btn-primary"><a
                                        href="{{ route('atividades.responder', $atividade->id) }}">Ver
                                        Atividade</a></button></li>
                            @if (Auth::user()->roles_id == 2 && in_array($atividade->id, $activities))
                            <li style="color: green;" class="list-group-item">Atividade Enviada
                            </li>
                            @elseif(Auth::user()->roles_id == 2  )
                            <li class="list-group-item"><button  class="btn btn-primary"><a href="{{route('atividades.respondida', $atividade->id)}}">Enviar</a></button>
                            </li>
                            @endif
                            @if (Auth::user()->roles_id == 1)
                            <li class="list-group-item"><button class="btn btn-primary"
                                onclick="editar({{ $atividade->id }})"> <a
                                    href="{{ route('atividades.edit', $atividade->id) }}">Editar</a> </button>
                                <li class="list-group-item"><button class="btn btn-primary"
                                        onclick="editar({{ $atividade->id }})"> <a
                                            href="{{ route('response.index', $atividade->id) }}">Alunos</a> </button>
                                </li>
                                <li class="list-group-item"><button class="btn btn-danger"><a
                                            href="{{ route('atividades.destroy', $atividade->id) }}">Excluir</a>
                                    </button>
                                </li>
                            @endif

                        </ul>
                    </div> --}}
                    </div>
                @empty
                    <h6>Sem atividades existentes.</h6>
                @endforelse
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Enviar Atividade</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-login" enctype="multipart/form-data">
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            {{-- <input type="button" value="{{$atividade->id}}" id="id-atividade"> --}}
                            <div class="row">
                                <input type="hidden" value="">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="file" name="filepath"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <textarea class="form-control description" type="password" id="description" name="description"
                                            placeholder="Descrição sobre a atividade"></textarea>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="responderAtividade()">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script src="/assets/js/jquery.js"></script>
        <script src="/assets/js/atividades/index.js"></script>

    </body>

    </html>
@endsection
