<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
</style>

<body>
    @if (Auth::user()->roles_id == 1)
        <button class="btn btn-primary criar-disciplines"><a
                href="{{ route('atividades.create', $disciplinasID->id) }}">Criar
                atividades</a></button>
    @endif
    <h1 style="text-align: center;">Atividades de {{ $disciplinasID->name }}</h1>
    <div class="container text-center">
        <div class="row align-items-start">
            @forelse ($atividades as $atividade)
                <div class="col-3">
                    <div class="card" style="width: 13rem; ">
                        <img src="{{ asset('storage/' . $atividade->filepath) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $atividade->name }}</h5>
                            <p class="card-text">{{ $atividade->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><button class="btn btn-primary">Ver Atividade</button></li>
                            @if (Auth::user()->roles_id == 1)
                                <li class="list-group-item"><button class="btn btn-info"
                                        onclick="editar({{ $atividade->id }})"> <a
                                            href="{{ route('atividades.edit', $atividade->id) }}">Editar</a> </button>
                                </li>
                                <li class="list-group-item"><button class="btn btn-danger"><a
                                            href="{{ route('atividades.destroy', $atividade->id) }}">Excluir</a>
                                    </button>
                                </li>
                            @endif

                        </ul>
                    </div>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar atividade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-login" enctype="multipart/form-data">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="id-atividade">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control " id="exampleFormControlInput1"
                                        name="name" placeholder="Nome da Atividade">
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="file" name="filepath"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3" id="div-imagem">
                                        <img style="width: 100px;" id="imagem" src=""alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <textarea class="form-control" type="password" id="description" name="description"
                                            placeholder="Descrição sobre a atividade"></textarea>

                                    </div>
                                </div>

                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="update()">Editar</button>
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
