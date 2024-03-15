# ocorrenciaCoordena-o

<?php require_once 'funcoes.php';?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--CDN do Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title>Anotações dos alunos</title>
    <script src="nomes.js"></script>
    <script src='funcoes.js'></script>
    </head>
    <body class="col-md-12 col-lg-12">
        <div class='container'>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#">Adicionar Ocorrência</a></li>
              <li><a href="consulta.php">Consultar Ocorrências do Aluno</a></li>
              <li><a href="cadastrar.php">Cadastrar novo Aluno</a></li>
              <li><a href="EditarSala.php">Editar Sala do Aluno</a></li>
            </ul>
        </div>
        
        <form method= "POST">
        <div class="container">

         <div class="form-group">
          <label for="sel1">Selecionar Turma</label>
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
            <input type="submit" class="btn btn-primary" value='Buscar Alunos' name='buscarAlunos'>
            
        </div>
        </form>
        
        <form method= "POST">
        <div class='container'>
         <div class="form-group">
            <span class="input-group-text" id="inputGroup-sizing-sm">Selecione o Aluno</span>
             <select class="form-control"  name='nomeAluno' id='selectAluno'>
                 <option>Selecione o Aluno</option>
                <?php
                    if($alunos)
                        foreach($alunos as $aluno){
                            echo "<option value='" . $aluno['id'] . '_' . $aluno['id_turma'] . "'>" . $aluno['nome'] . "</option>";
                        }
                ?>
        </select>
        </div> 
        </div>
        <div class='container'>
            <div  for="inputlg">
                <span class="input-group-text" id="inputGroup-sizing-sm">Ocorrência</span>
              <input  class="form-control input-lg" name="desOcor" type="text">
            </div>
        </div>
        <br>
        <div class='container'>
            <input type="submit" class="btn btn-primary" value='Gravar' name='addOcor'>
            </form>
        </div>
  
    </body>
</html>
