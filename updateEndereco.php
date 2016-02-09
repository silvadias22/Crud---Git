<html>
	<head>
		<meta charset='utf8'>
					<script language="javascript">
	
		function confirmaDel(){
			var r = confirm("Tem certeza que deseja editar esse registro?");
				if (r == true){
				
				}else{
					return false;
				
		}
	}
			</script>
	</head>
	<body>
<?php 

	include "menu.php"; 
	include "database.php";
					
	$cidade = $_POST["cidade"];
	$logradouro = $_POST["logradouro"];
	$bairro = $_POST["bairro"];
	$numero = $_POST["numero"];
	$tipoEndereco = $_POST["tipoEndereco"];
	$complemento = $_POST["complemento"];
	$cep = $_POST["cep"];
	$uf = $_POST["uf"];
	$idEndereco = $_POST["idEndereco"];

	# Inserir a codição dessa função:
	atualizar($cidade, $logradouro, $bairro, $numero, $tipoEndereco, $complemento , $cep, $uf, $idEndereco);
	$stmt = buscarEnderecoPorID($idEndereco);
	
?>
	<center>
	<?php 
		if ($stmt->rowCount() > 0){ ?>
				<br>
				<br>
				<h3> Tabela de registros:</h3>
				<br>
				<Table border=1> 
					<tr> 
						<th> Id Endereco </th>
						<th> Cidade </th> 
						<th> Logradouro </th> 
						<th> Bairro </th> 
						<th> Número </th>
						<th> Tipo de Endereco </th> 
						<th> Complemento </th>
						<th> Cep </th>
						<th> UF </th>
						<th> Excluir </th>
						<th> Editar </th>
						<th> Voltar </th>

					</tr>
			<?php 
				while($result = $stmt->fetch()){ 
			?>  						
					<tr>
						<td><?php echo $result['idEndereco'];?></td>
						<td><?php echo $result['cidade'];?></td>
						<td><?php echo $result['logradouro'];?></td>
						<td><?php echo $result['bairro'];?></td>
						<td><?php echo $result['numero']; ?></td>
						<td><?php echo $result['tipoEndereco'];?></td>
						<td><?php echo $result['complemento']; ?></td> 
						<td><?php echo $result['cep']; ?></td> 
						<td><?php echo $result['uf'];?></td>
						<td><a href=delEnd.php?id=<?php echo $result['idEndereco'];?> onClick="return confirmaDel();">Excluir </a></td>
						<td><a href=editarEnd.php?id=<?php echo $result['idEndereco'];?>>Editar </a></td>
						<td><a href=registros.php?id=<?php echo $result['idProfissional'];?> onClick="return confirma();">Voltar </a></td>

					</tr>	
			<?php } ?>
			</Table>	
		<?php 	}else{ ?>
		<br><br>
		<center> Nenhum registro encontrado! </center>
		<?php } ?>
		<br>
 
		</center>
	</body>
</html>