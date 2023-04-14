@extends('menu.menu')
@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

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
        <div class="tabs is-centered" style="margin-right: 30px">
            <ul>
            <div class="select">
                <select id="disciplinas">
                    <option value="0">Todos</option>
            @foreach($disciplinas as $disciplina)
                <option value="{{$disciplina->id}}">{{$disciplina->name}}</option>
            @endforeach
                </select>
            </div>
            </ul>
          </div>
        <div class="container text-center">
            <div class="row align-items-start">

            @forelse ($atividades as $atividade)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img onclick="visualizarImage({{ $atividade->id }})" class="js-modal-trigger img-thumbnail"
                        data-target="modal-js-example" src="{{ url('storage/', $atividade->filepath) }}">
                        <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{$atividade->description}}</p>
                        <b>Dia da Postagem: </b>{{ date('d/m/Y', strtotime($atividade->created_at)) }}

                        @if (in_array($atividade->id, $atividadesNotes))
                            <h6><b>
                                @if($atividade->note >= 6)
                                    <span style="color: green"> Nota:{{$atividade->note}}</span>
                                @else
                                    <span style="color: red"> Nota:{{$atividade->note}}</span>
                                @endif
                            </b> </h6>
                        @else
                        <button class="button is-link">
                            <a style="text-decoration: none; color: white;"
                                href="{{ route('atividades.responder', $atividade->id) }}"><i class="bi bi-journal-bookmark"></i>
                            </a></button></li>
                            <button class="button is-warning" onclick="visualizarImage({{ $atividade->id }})"
                                id="editar"> <a href="{{ route('alunos.edit', $atividade->id) }}"><i
                                        class="bi bi-pencil"></i>
                                </a></button>
                            <button class="button is-danger" onclick="deletarAtividade({{$atividade->id}})"><i class="bi bi-trash3"></i>
                            </button>
                        @endif
                        </div>
                    </div>



                </div>
            @empty
                <h6>Não existe</h6>
            @endforelse
            </div>
          </div>


    <div class="modal" id="modal-js-example">
        <div class="modal-background"></div>
        <div class="modal-content">
            <p class="image is-2by1">

                <img style="" id="image" class="is-clipped" alt="">
            </p>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/alunos/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Functions to open and close a modal
            function openModal($el) {
                console.log($el);
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            // Add a click event on buttons to open a specific modal
            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    openModal($target);
                });
            });

            // Add a click event on various child elements to close the parent modal
            (document.querySelectorAll(
                '.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || [])
            .forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            // Add a keyboard event to close all modals
            document.addEventListener('keydown', (event) => {
                const e = event || window.event;

                if (e.keyCode === 27) { // Escape key
                    closeAllModals();
                }
            });
        });
    </script>
@endsection
