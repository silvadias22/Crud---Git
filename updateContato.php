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
			
	$tipoTelefone = $_POST["tipoTelefone"];
	$operadora = $_POST["operadora"];
	$numero = $_POST["numero"];
	$tipoEmail = $_POST["tipoEmail"];
	$Email = $_POST["Email"];
	$idContato = $_POST["idContato"];

	# Inserir a codição dessa função:
	updateContato($tipoTelefone, $operadora, $numero, $tipoEmail, $Email, $idContato);
	$stmt = buscarContatoPorID($idContato);
	
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
						<th> Id Contato </th>
						<th> Tipo de Telefone </th> 
						<th> Operadora </th>
						<th> Número </th>
						<th> Tipo de email</th> 
						<th> Email </th>
						<th> Excluir </th>
						<th> Editar </th>
						<th> Voltar </th>
					</tr>
			<?php 
				while($result = $stmt->fetch()){ 
			?>  						
					<tr>
						<td><?php echo $result['idContato'];?></td>
						<td><?php echo $result['tipoTelefone'];?></td>
						<td><?php echo $result['operadora'];?></td>
						<td><?php echo $result['numero'];?></td>
						<td><?php echo $result['tipoEmail']; ?></td>
						<td><?php echo $result['Email'];?></td>
						<td><a href=delContato.php?id=<?php echo $result['idContato'];?> onClick="return confirmaDel();">Excluir </a></td>
						<td><a href=editarContato.php?id=<?php echo $result['idContato'];?>>Editar </a></td>
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