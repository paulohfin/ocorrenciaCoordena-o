<?php require_once 'funcoes.php' ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--CDN do Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title>Consultar Alunos</title>
    <script src="nomes.js"></script>
    <script src='funcoes.js'></script>
    </head>
    <body class="col-md-12 col-lg-12">
        <div class='container'>
            <ul class="nav nav-tabs">
              <li><a href="#">Adicionar Ocorrência</a></li>
              <li class="active"><a href="consulta.php">Consultar Ocorrências do Aluno</a></li>
              <li><a href="cadastrar.php">Cadastrar novo Aluno</a></li>
              <li><a href="editarSala.php">Editar Sala do Aluno</a></li>
            </ul>
        </div>
        <div class="container">

        <form method= "POST">
         <div class="form-group">
          <label for="sel1">Selecione a Turma</label>
            <select class="form-control" name='turma' onchange='lerAlunos(this.value)'>
            <option value='9'>6A</option>
            <option value='10'>6B</option>
            <option value='11'>7A</option>
            <option value='12'>7B</option>
            <option value='1'>8A</option>
            <option value='2'>8B</option>
            <option value='13'>8C</option>
            <option value='3'>9A</option>
            <option value='4'>9B</option>
            <option value='5'>1A</option>
            <option value='6'>1B</option>
            <option value='14'>1C</option>
            <option value='7'>2A</option>
            <option value='15'>2B</option>
            <option value='8'>3A</option>
          </select>
        </div> 
        <span class="input-group-text">Nome do Aluno</span>
        <input  class="form-control input-lg" name="nomeAluno" type="text">
        </div>
        <div class="container">
        <input type="submit" class="btn btn-primary" value='Buscar Ocorrência' name='buscarAlunos2'>
        </div>
        <br>
        </form>
        
        <div class='container'>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Data</th>
                  <th scope="col">Ocorrência</th>
                </tr>
              </thead>
              <tbody>
                  
                <?php
                    if($ocorrencias)
                        foreach($ocorrencias as $ocorrencia){
                            echo "<tr>" .
                            "<td>" . $ocorrencia['nome'] . "</td>" .
                                "<td >". $ocorrencia['data'] . "</td>" .
                                "<td >". $ocorrencia['ocorrencia'] . "</td>" .
                            "</tr>";
                        }
                ?>
                
                </tbody>
            </thead>
            </table>
        </div>
    </body>
    <script>
        function esconder(e){
            if(document.getElementById(e).style.display != 'none')
    			document.getElementById(e).style.display="none";
    		else document.getElementById(e).style.display="block";
        }
    </script>
</html>
