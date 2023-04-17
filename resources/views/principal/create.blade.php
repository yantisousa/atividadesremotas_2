@extends('menu.menu')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #c8cfca;
        }

        .conteiner-login {
            height: calc(100vh - 78px) !important;
        }

        .coluna-login {
            height: 100%;
        }

        .form-login {
            margin-top: 100px;
            width: ;
        }

        .btn-login {}

        .form-login h4 {
            text-align: center;
            position: relative;
            bottom: 50px;
        }

        .btn-cadastro {
            text-decoration: none;
        }

        .full {
            box-shadow:
        }
    </style>
    <div class="tabs is-centered">
        <ul>
            <li class="aluno active is-active" id="student-click"><a>Alunos</a></li>
            <li class="professor active" id="teacher-click"><a>Professores</a></li>
        </ul>
    </div>
    <br><br>

    <div id="alunos"
        class="container text-center full"style=" height: 500px; border-radius: 10px; box-shadow: 22px 36px 44px -8px rgba(0,0,0,0.1);">
        <div class="row align-items-center">
            <div class="col" style="border-radius: 10px; height: 500px; background-color: #006494; ">
                <img src="{{ url('assets/img/logo.png') }}" class="img-fluid" alt="..."
                    style="width: 300px; margin-top: 100px; position:relative; left: 10px">
            </div>
            <div class="col">
                @if (session('msg'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                <h1>Login dos Alunos</h1>
                <form action="{{ route('alunos.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input required name="email" type="email" placeholder="Email" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input required name="password" type="password" placeholder="Senha" class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #f4e208; border: none; color: black; width: 300px"><b>Entrar</b> </button>
                </form>
                </form>
            </div>
        </div>
    </div>

    <div id="professores"
        class="container text-center full"style=" height: 500px; border-radius: 10px; box-shadow: 22px 36px 44px -8px rgba(0,0,0,0.1); display: none;">
        <div class="row align-items-center">
            <div class="col">
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <h1>Login dos Professores</h1>
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Senha" class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #f4e208; width: 300px; border: none; color: black;"><b>Entrar</b> </button>
                </form>
                </form>
            </div>

            <div class="col" style="border-radius: 10px; height: 500px; background-color: #006494; ">
                <img src="{{ url('assets/img/logo.png') }}" class="img-fluid" alt="..."
                    style="width: 300px; margin-top: 100px; position:relative; left: 10px">
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/principal/index.js"></script>
@endsection
