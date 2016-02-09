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
				<div class="tabela">

<?php 

	include "database.php";
	$stmt = buscarTodosProfissionais();
?>

			
	<?php
		if ($stmt->rowCount() > 0){ ?>


					<Table border=1 style="border-collapse: collapse">
								
					<tr> 
						<th> Id </th>
						<th> Nome </th> 
						<th> Idade </th> 
						<th> Nascimento </th> 
						<th> Sexo </th>
						<th> Estado Civil </th>
						<th> Habilidade </th>
						<th> vinculo </th>
						<th> Horario de Entrada </th>
						<th> Horario de Saida </th>
						<th> Observação </th>
						<th> Visualizar registros </th>
						<th> Excluir tudo </th>
					</tr>
			<?php 
				while($result = $stmt->fetch()){ 
					  $nascimento = $result['nascimento']; //efetua a busca da iformação
					  $nascimento = implode('/',array_reverse(explode('-',$nascimento)));// Inverte a posição da informação contida na variavel
					  $habilidade = $result['habilidade'];
					  $habilidade = implode('<br>',array_reverse(explode(',',$habilidade)));
					  $observacao = $result['observacao'];
					  $observacao = implode('<p>',array_reverse(explode(',',$observacao)));
			?>  
					<tr>
						<td><?php echo $result['idProfissional']; ?></td> 
						<td><?php echo $result['nome'];?></td>
						<td><?php echo $result['idade'];?></td>
						<td><?php echo $nascimento;?>
						<td><?php echo $result['sexo']; ?></td>
						<td><?php echo $result['estadoCivil']; ?></td> 
						<td><?php echo $habilidade;?></td> 
						<td><?php echo $result['vinculo']; ?></td> 
						<td><?php echo $result['horarioEntrada']; ?></td> 
						<td><?php echo $result['horarioSaida']; ?></td> 
						<td><?php echo $observacao; ?></td> 
						<td><a href=registros.php?id=<?php echo $result['idProfissional'];?> onClick="return confirma();">Registros</a></td>
						<td><a href=delProf.php?id=<?php echo $result['idProfissional'];?> onClick="return confirmaDel();">Excluir tudo</a></td>
					</tr>	
			<?php } ?>
			</Table>	
		<?php 	}else{ ?>
		
		<center> Nenhum registro encontrado! </center>
		<?php } ?>
			
					</div>	
				</div>
			</div>
		</div>
	</body>
</html>