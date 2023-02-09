<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
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
                            <img src="{{ url('storage/', $atividade->filepath) }}" alt="">

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
                                        <button class="button is-warning">Editar</button>
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
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/alunos/index.js"></script>
