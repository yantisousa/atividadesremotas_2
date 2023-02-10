<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Número na frequência</th>
        <th scope="col">Nome</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($buscarAlunos as $alunos)
        <tr>
          <th scope="row">{{$alunos['id']}}</th>
          <td></td>
         
        </tr>
            
        @endforeach
      
    </tbody>
  </table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
