<html>
	<head>
		<meta charset='utf8'>
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
		
		
<?php  
	include "database.php";

	$idProfissional = $_POST["idProfissional"];
	$cidade = $_POST["cidade"];
	$logradouro = $_POST["logradouro"];
	$bairro = $_POST["bairro"];
	$numero = $_POST["numero"];
	$tipoEndereco = $_POST["tipoEndereco"];
	$complemento = $_POST["complemento"];
	$cep = $_POST["cep"];
	$uf = $_POST["uf"];
	
	#Função de inserção - Escrita no script (database.php)
	inserirEndereco($idProfissional, $cidade, $logradouro, $bairro, $numero, $tipoEndereco, $complemento , $cep, $uf);
	
	# A utilização da chave estrangeira como parâmetro dessa função, é motivada pela possibilidade de um único profissional possuir N endereços.
	$stmt = buscarEnderecoPorIdProfissional($idProfissional);
?>

	<?php 
		if ($stmt->rowCount() > 0){ ?>

				<h3> Endereco inserido com sucesso!</h3>
				
				<Table> 
					<tr> 
						<th> Id Endereço </th>
						<th> id Profissional </th>
						<th> Cidade </th> 
						<th> Logradouro </th> 
						<th> Bairro </th> 
						<th> Número </th>
						<th> Tipo de Endereco </th> 
						<th> Complemento </th>
						<th> Cep </th>
						<th> UF </th>


					</tr>
			<?php 
				while($result = $stmt->fetch()){ 
			?>  						
					<tr>
						<td><?php echo $result['idEndereco'];?></td>
						<td><?php echo $result['idProfissional'];?></td>
						<td><?php echo $result['cidade'];?></td>
						<td><?php echo $result['logradouro'];?></td>
						<td><?php echo $result['bairro'];?></td>
						<td><?php echo $result['numero']; ?></td>
						<td><?php echo $result['tipoEndereco'];?></td>
						<td><?php echo $result['complemento']; ?></td> 
						<td><?php echo $result['cep']; ?></td> 
						<td><?php echo $result['uf'];?></td>

					</tr>	
			<?php } ?>
			</Table>	
		<?php 	}else{ ?>

		 Nenhum registro encontrado! 
		<?php } ?>

			<div class="links">
				<a href="endereco.php?id=<?php echo $idProfissional;?>">Adicionar Endereco</a>
				<a href="contato.php?id=<?php echo $idProfissional;?>">Adicionar Contato</a>
				<a href="registros.php?id=<?php echo $idProfissional;?>" onClick="return confirma();">Exibir registros do Profissional</a>
			</div>

		</div>
	</div>
</div>
	</body>
</html>