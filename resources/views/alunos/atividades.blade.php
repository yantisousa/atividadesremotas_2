<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<nav class="level is-mobile">
    <div class="level-item has-text-centered">
        <div class="level-item has-text-centered">
            <div>
                <input type="hidden" value="2" id="input-manipulador2">
                <p class="heading">Atividades Feitas</p>
                <p class="title" id="title2"></p>
                <button id="feitas" onmouseover="atividadesFeitas({{ Auth::user()->id }})"
                    class="button is-success is-outlined">Atividades Feitas</button>
            </div>
        </div>
</nav>
<table class="table is-bordered">

    <tfoot>
        <tr style="width: 500px;">
            @forelse ($atividades as $atividade)

            <div class="column">
                    <div class="card">
                        <div class="card-image">
                          <figure class="image is-128x128">
                            <img  class="is-clipped" src="{{ url('storage/', $atividade->filepath) }}" alt="">
                             <input type="hidden" value="{{$atividade->id}}" id="id-atividade">
                          </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">{{ $atividade->name }}</p>
                                </div>
                            </div>

                            <div class="content">
                                {{ $atividade->description }}
                                <br>
                                <time datetime="2016-1-1"><b>Dia da
                                        Postagem: </b>{{ date('d/m/Y', strtotime($atividade->created_at)) }}</time>
                                <div>
                                </div>

                                <br>
                                <button class="button is-link">
                                    <a style="text-decoration: none; color: white;"
                                        href="{{ route('atividades.responder', $atividade->id) }}">Ver
                                        Atividade</a></button></li>
                                        <button class="button is-warning" onclick="visualizarImage({{ $atividade->id }})" id="editar" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                                        <button class="button is-danger">Excluir</button>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h6>Não existe</h6>
            @endforelse


            </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img id="image" class="is-clipped" src="{{ url('storage/', $atividade->filepath) }}" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/alunos/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script>

</script>
