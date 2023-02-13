
@extends('menu.menu')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            font-family: "Poppins"
        }
    </style>
    <h1 style="text-align: center;">Alunos que fizeram a atividade</h1>
    <div class="columns">
        @foreach ($buscarAlunos as $alunos)
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-left">
                            <figure class="image is-64x64">
                                <img src="{{ url('storage/', $alunos->filepath) }}" alt="Image">

                            </figure>
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>{{ $alunos->user->name }}</strong> <small></small> <small></small>
                                    <br>

                                </p>
                            </div>
                            <nav class="level is-mobile">
                                <div class="level-left">
                                    <a class="level-item" aria-label="reply">
                                        <span class="icon is-small">
                                            <i class="fas fa-reply" aria-hidden="true"></i>
                                        </span>
                                        {{ $alunos->activity->activity_id }}
                                    </a>
                                    <button class="js-modal-trigger btn btn-primary"
                                        onclick="visualizarImageAtividadesProfessor({{ $alunos->id }})"
                                        data-target="modal-js-example" class=""><i class="bi bi-arrows-fullscreen"></i>
                                    </i>
                                        </i>

                                    </button>
                                    <a class="level-item" aria-label="retweet">
                                        <span class="icon is-small">
                                            <i class="fas fa-retweet" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                    @if($alunos->notes < 10)
                                        <button id="notas" >
                                          <b>Nota: </b>  <input  type="button" value="{{$alunos->note}}">
                                        </button>
                                    @endif
                                    <a class="level-item" aria-label="like">
                                        <span class="icon is-small">
                                            <i class="fas fa-heart" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                        <button>
                            <a href="{{ route('response.create', $alunos->id) }}">
                                <i class="material-icons">arrow_forward</i>
                            </a>
                        </button>
                    </article>
                </div>
            </div>
        @endforeach

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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Functions to open and close a modal
            function openModal($el) {
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
                    setTimeout(() => {

                        openModal($target);
                    }, (200));
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endsection
