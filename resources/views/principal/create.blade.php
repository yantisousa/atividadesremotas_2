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
</style>

<div class="container text-center" style="position:relative; top: 80px ">
    <div class="row align-items-start">
      <div class="col">
        <b>Você é:</b>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">Aluno</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Professor</label>
            </div>
    </div>
    </div>
  </div>
  

<div class="container conteiner-login" id="professores" style="display:none">
    <div class="row coluna-login">
        <div class="col-md-4 offset-md-4 align-self-center "
            style="background-color: white; height:400px; border-radius: 10px; box-shadow:0 0px 3px #67736b;">
            <form class="form-login" action="{{ route('login.store') }}" method="POST">
                @csrf
                <h4>Login de Professores</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" id="exampleFormControlInput1"
                                placeholder="Senha">

                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Entrar</button>
                    </div>
                    <div class="col-2">
                        <div class="mb-7">
                            <button class="btn btn-warning "><a class="btn-cadastro"
                                    href="{{ route('cadastro.create') }}">Cadastro</a></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


<div class="container conteiner-login" id="alunos" style="display:none">
    <div class="row coluna-login">
        <div class="col-md-4 offset-md-4 align-self-center "
            style="background-color: white; height:400px; border-radius: 10px; box-shadow:0 0px 3px #67736b;">
            <form class="form-login" action="{{ route('alunos.login') }}" method="POST">
                @csrf
                <h4>Login de Alunos</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" id="exampleFormControlInput1"
                                placeholder="Senha">

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
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/principal/index.js"></script>