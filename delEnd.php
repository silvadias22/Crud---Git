<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>	
			
	<div class="diva">		
		<div class="cabecalho">
			<center><img src="img/crud3.png"/></center> 
		</div>
		
		<div class="menu">		
			<?php include "menu.php";  ?>		
		</div>

		<div class="conteudo">
			<div class="com-margin">
	
<?PHP 
	include "database.php";
	$idProfissional = $_GET['id'];
	$stmt = deletarEndereco($idProfissional);				
	if ($stmt->rowCount() > 0){  
	//Caso a função rowCount > 0, então o registro foi deletado com sucesso, ou seja, tinha conteúdo
?>

	<h4><center> Cadastro deletado com sucesso!</center></h4>
<?php	}else{      
		//Else, siguinifica que a função rowCount retornou 0, ou seja, não existe um registro com o id especificado via parametro.
?>

	<h4><center>Cadastro inexistente!</center></h4>
<?php } ?>
				<center><a href="buscarProf.php">Voltar</a></center>
			</div>
		</div>
	</div>
</body>
</html>
	