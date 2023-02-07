<style>
    .menu {
        position: relative;
        right: 20px;
        width: 500px;
    }
</style>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="material-icons" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">menu</i>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Informações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="list-group menu">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            {{ Auth::user()->name }}

                        </a>
                       
                        @if (Auth::user()->roles_id == 1)
                        <a href="{{ route('disciplines.create') }}" class="list-group-item list-group-item-action"
                       >Criar Disciplina</a>
                       <a href="{{ route('alunos.create') }}" class="list-group-item list-group-item-action"
                       >Criar Aluno</a>
                       @endif
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="list-group-item list-group-item-action"
                       >Meus dados</a>
                        <a href="#" class="list-group-item list-group-item-action"
                            onclick="logout({{ Auth::user()->id }})">Sair da conta</a>
                    </div>

                </div>
            </div>

            </ul>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                </button>
            </div>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="logout({{ Auth::user()->id }})"></a></li>
    </div>

    </a>
    </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Dados</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nome</label>
                  <input type="email" class="form-control" value="{{ Auth::user()->name }}" id="exampleInputEmail1" disabled aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled id="exampleInputPassword1">
                </div>
                @if(Auth::user()->roles_id == 1)
              
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Eu sou:</label>
                  <input type="email" class="form-control" value="Professor(a)" disabled id="exampleInputPassword1">
                </div>
                @else
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Eu sou:</label>
                  <input type="email" class="form-control" value="Aluno(a)" disabled id="exampleInputPassword1">
                </div>
                @endif
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- As a heading -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/disciplines/index.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@yield('content')
