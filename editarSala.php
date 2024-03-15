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
              <li><a href="consulta.php">Consultar Ocorrências do Aluno</a></li>
              <li><a href="cadastrar.php">Cadastrar novo Aluno</a></li>
              <li class="active"><a href="EditarSala.php">Editar Sala do Aluno</a></li>
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
        <input type="submit" class="btn btn-primary" value='Buscar Alunos' name='buscarAlunosEditar'>
        </form>
        </div>
        <div class='container'>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Turma</th>
                  <th scope="col">Aluno</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if($alunos)
                        foreach($alunos as $aluno){
                            
                            echo "<tr>" .
                                "<td>" . $aluno['nome_classe'] . "</td>" .
                                "<td>" . $aluno['nome'] . "</td>" .
                                "<td><input class='form-check-input' type='radio' id='" . $aluno['id'] . "_" . $aluno['nome'] . "'onclick='myFunction(this)' >
                                </td>
                                <td>".
                            "</tr>";
                        }
                ?>
                </tbody>
            </table>
        </div> 
        <form method= "POST">
        <div class='container'>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Aluno</th>
                  <th scope="col">Nova Turma</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                      <td id='nomeAluno' name='idAluno' value=''>
                          
                      </td>
                      <td>
                        <select class="form-control" name='turmaEdit' id='selectEdit'>
                            
                        </select>
                      </td>
                  </tr>
                </tbody>
            </table>
        </div>
        <div class='container'>
            <input type="submit" class="btn btn-primary" value='Gravar' name='editarTurma'>
        </div>
        </form>
        
    </body>
    <script>
        function myFunction(e){
            let str = e.id.split('_');
            document.getElementById('nomeAluno').innerHTML = str[1];
            let edit = document.getElementById('selectEdit');
            let text = '';
                text += '<option value="9_' + str[0] + '">6A</option>';
                text += '<option value="10_' + str[0] + '">6B</option>';
                text += '<option value="11_' + str[0] + '">7A</option>';
                text += '<option value="12_' + str[0] + '">7B</option>';
                text += '<option value="1_' + str[0] + '">8A</option>';
                text += '<option value="2_' + str[0] + '">8B</option>';
                text += '<option value="13_' + str[0] + '">8C</option>';
                text += '<option value="3_' + str[0] + '">9A</option>';
                text += '<option value="4_' + str[0] + '">9B</option>';
                text += '<option value="5_' + str[0] + '">1A</option>';
                text += '<option value="6_' + str[0] + '">1B</option>';
                text += '<option value="14_' + str[0] + '">1C</option>';
                text += '<option value="7_' + str[0] + '">2A</option>';
                text += '<option value="15_' + str[0] + '">2B</option>';
                text += 'option value="8_' + str[0] + '">3A</option>';
            edit.innerHTML = text;
        }
    </script>
</html>
