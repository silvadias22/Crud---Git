<html>
	<head>
		<meta charset='utf8'>
			<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<script language="javascript">
	
				function confirmaDel(){
					var r = confirm("Tem certeza que deseja excluir esse registro?");
						if (r == true){
						
						}else{
							return false;
						}
				}
		
		</script>
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
	$tipoTelefone = $_POST["tipoTelefone"];
	$operadora = $_POST["operadora"];
	$numero = $_POST["numero"];
	$tipoEmail = $_POST["tipoEmail"];
	$Email = $_POST["Email"];
		  
	inserirContato($idProfissional, $tipoTelefone, $operadora, $numero, $tipoEmail, $Email);
	$stmt =  buscarContatoPorIdProfissional($idProfissional);


	if ($stmt->rowCount() > 0){
?>

				<center><h3> Tabela de registros:</h3></center>
				<Table> 
					<tr> 
						<th> Id Contato </th>
						<th> Id Profissional </th>
						<th> Tipo de telefone </th> 
						<th> Operadora </th> 
						<th> Número </th> 
						<th> Tipo de email </th>
						<th> Email </th>
					</tr>
		
			<?php 
				while($result = $stmt->fetch()){ 
			?>  
					<tr>
						<td><?php echo $result['idContato'];?></td>
						<td><?php echo $result['idProfissional']; ?></td> 						
						<td><?php echo $result['tipoTelefone'];?></td>
						<td><?php echo $result['operadora'];?></td>
						<td><?php echo $result['numero']; ?></td>
						<td><?php echo $result['tipoEmail']; ?></td> 
						<td><?php echo $result['Email']; ?></td> 				
					</tr>	
					
			<?php } ?>
					
			</Table>
					
		<?php 	}else{ ?>

		 Nenhum registro encontrado!
					
		<?php } ?>
	
		<div class="links">			
			<a href="contato.php?id=<?php echo $idProfissional;?>">Adicionar Contato</a>
			<a href="endereco.php?id=<?php echo $idProfissional;?>">Adicionar Endereco</a>
			<a href="registros.php?id=<?php echo $idProfissional;?>" onClick="return confirma();">Exibir registros do Profissional</a>
		</div>
	
				</div>
			</div>
		</div>
	</body>
</html>