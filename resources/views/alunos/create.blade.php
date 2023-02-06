
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

    </style>
        @if ($errors->any())
            <div class="alert alert-danger erros">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="container conteiner-login">
        <div class="row coluna-login">
            <div class="col-md-4 offset-md-4 align-self-center "
                style="background-color: white; height:400px; border-radius: 10px; box-shadow:0 0px 3px #67736b;">
                <form action="{{route('alunos.store')}}" method="POST" class="form-login">
                    @csrf
                    <h4>Cadastro dos Alunos</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                                    placeholder="Nome Completo">
                            </div>
                            
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input class="form-control" type="password" id="exampleFormControlInput1"
                                            name="password" placeholder="Senha"></input>

                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Entrar</button>
                                </div>
                            </div>
                </form>
            </div>

        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>


