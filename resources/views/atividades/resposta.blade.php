
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
                <form action="{{route('responder.store', $ativi)}}" method="POST" class="form-login" enctype="multipart/form-data">
                    @csrf
                    <h4>Responder Atividade</h4>
                    <div class="row">
                        <div class="col-12">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Enviar</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
    {{-- <button class="btn btn-info"><a href="{{route('atividades.index')}}">Ver Atividades</a></button> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
