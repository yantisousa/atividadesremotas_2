@extends('menu.menu')
@section('content')
<style>
    a {
        color: white;
        text-decoration: none;
    }
    #capa2:hover{
        border-radius: 10px;
        box-shadow:5px 21px 32px 10px rgba(194,194,194,1);
    }
    #capa3:hover{
        border-radius: 10px;
        box-shadow:5px 21px 32px 10px rgba(194,194,194,1);
    }
    #capa4:hover{
        border-radius: 10px;
        box-shadow:5px 21px 32px 10px rgba(194,194,194,1);
    }
</style>


<section>
    <div class="container text-center">
        <div class="row align-items-center">
        <div class="col-12">
            <img src="{{ url('assets/img/capa.png') }}" style="width:500px;" class="img-fluid"
            alt="Imagem responsiva">
        </div>

    </div>
    <div class="col-12">
        <p>

        </p>
        <button class="btn btn-primary mb-3"> <a style="text-decoration: none; color:white;"
            href="{{ route('login') }}"> Acessar Conta</a></button>
        </div>
        <div class="row align-items-center">
            <div class="col" id="capa2">
                <img src="{{ url('assets/img/1.png') }}" alt=""><br>
            Atividades
        </div>
        <div class="col" id="capa3">
            <img src="{{ url('assets/img/2.png') }}" alt=""><br>
            Notas
        </div>
        <div class="col" id="capa4">
            <img src="{{ url('assets/img/3.png') }}" alt=""><br>
            Frenquência
        </div>
    </div>
</div>


</section>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
@endsection
