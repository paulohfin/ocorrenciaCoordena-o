
<?php
    $alunos = null;
    $ocorrencias = null;
	/*Estrutura presente em configuracao.php*/
	mysqli_report(MYSQLI_REPORT_STRICT);
	
    function open_database() {
		try {
			$conn = new mysqli('localhost', 'id21101513_bdjcacesso', 'bdJC.1234', 'id21101513_bdjc');
			mysqli_set_charset( $conn, 'utf8');
			return $conn;
		} catch (Exception $e) {
			echo $e->getMessage();
			return null;
		}
	}
	
	/*Função para fechar o banco de dados*/
	function close_database($conn) {
		try {
			mysqli_close($conn);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
    if(isset($_POST['buscarAlunos'])){
        $database = open_database();
        $encontrar = null;
        /*Buscando o id informado para a pesquisa no banco*/
		try {
			$sql = "SELECT * from aluno where id_turma = " . $_POST['turma'] . ";";
		
			$encontrar = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
        $alunos =  $encontrar;
    }
        if(isset($_POST['buscarAlunosEditar'])){
        $database = open_database();
        $encontrar = null;
        /*Buscando o id informado para a pesquisa no banco*/
		try {
			$sql = "SELECT aluno.id, aluno.nome, turma.nome_classe from `aluno` inner join turma on aluno.id_turma = turma.id and id_turma = " . $_POST['turma'] . " order by aluno.nome;";
		
			$encontrar = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
        $alunos =  $encontrar;
    }

    if(isset($_POST['buscarAlunos2'])){
        $database = open_database();
        $encontrar = null;
        /*Buscando o id informado para a pesquisa no banco*/
		try {
			$sql = "SELECT aluno.nome, ocorrencia.ocorrencia, ocorrencia.data FROM `aluno` left join ocorrencia on aluno.id = ocorrencia.id_aluno where aluno.id_turma = " .$_POST['turma'] . " and ocorrencia.data > " . date(2024-01-01) . "and aluno.nome LIKE '%" . $_POST['nomeAluno'] . "%' order by aluno.nome;";
		
			$encontrar = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
        $ocorrencias =  $encontrar;
    }
        if(isset($_POST['buscarAlunos2023'])){
        $database = open_database();
        $encontrar = null;
        /*Buscando o id informado para a pesquisa no banco*/
		try {
			$sql = "SELECT aluno.nome, ocorrencia.ocorrencia, ocorrencia.data FROM `aluno` left join ocorrencia on aluno.id = ocorrencia.id_aluno where aluno.id_turma = " .$_POST['turma'] . " and ocorrencia.data < ". date(2023-12-31) . " and aluno.nome LIKE '%" . $_POST['nomeAluno'] . "%' order by aluno.nome;";
		
			$encontrar = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
        $ocorrencias =  $encontrar;
    }
    if(isset($_POST['consultaOcorr'])){
        $database = open_database();
        $encontrar = null;
        /*Buscando o id informado para a pesquisa no banco*/
		try {
		    $sql = "SELECT * FROM turma inner join aluno on turma.ID = aluno.id_turma inner join ocorrencia on aluno.id = ocorrencia.id_aluno where aluno.id = " . $_POST['aluno'];
		    
			$encontrar = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
		$ocorrencias = $encontrar;
		
    }
    if(isset($_POST['addOcor'])){
        
        $database = open_database();
        
        /*Buscando o id informado para a pesquisa no banco*/
		try {
		    $array = explode("_",$_POST['nomeAluno']);
		    
			$sql = "INSERT INTO `ocorrencia` (`id_turma`, `id_aluno`, `ocorrencia`, `data`) VALUES (" . $array[1] . ", " . $array[0] . ", '" . $_POST['desOcor'] . "' , '" . date("d-m-Y") . "'); ";
			
			$result = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
        
    }
    
    if(isset($_POST['editarTurma'])){
        
        $database = open_database();
        
        /*Buscando o id informado para a pesquisa no banco*/
		try {
		    $array = explode("_",$_POST['turmaEdit']);
			$sql = "UPDATE `aluno` set id_turma = " . $array[0] . " where id=" . $array[1] . ";";
			
			$result = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
        
    }
    if(isset($_POST['addAluno'])){
        $database = open_database();
        
        /*Buscando o id informado para a pesquisa no banco*/
		try {
			$sql = "INSERT INTO `aluno` (`id_turma`, `nome`) VALUES (" . $_POST['turma'] . ", '" . $_POST['nomeAluno'] . "'); ";
			$result = $database->query($sql);

		} 
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
    }
?>
