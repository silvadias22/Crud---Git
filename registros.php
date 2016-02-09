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

			$idProfissional = $_GET["id"];
			$stmt =  buscarProfissionalPorID($idProfissional);	
			$stm = buscarEnderecoPorIdProfissional($idProfissional);
			$st = buscarContatoPorIdProfissional($idProfissional);

	?>
	<center>
	<?php
		if ($stmt->rowCount() > 0){ ?>

				<h4> Profissional:</h4>
					
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
						<th> Editar </th>
						<th> Excluir </th>
					</tr>
	<?php 
		while($result = $stmt->fetch()){ 
			  $nascimento = $result['nascimento'];	
			  $habilidade = $result['habilidade'];
			  $habilidade = implode('<br>',array_reverse(explode(',',$habilidade)));
			  $observacao = $result['observacao'];
			  $observacao = implode('<p>',array_reverse(explode(',',$observacao)));
			  
	?>
				<tr>
					<td><?php echo $result['idProfissional']; ?></td> 
					<td><?php echo $result['nome'];?></td>
					<td><?php echo $result['idade'];?></td>
					<td><?php echo $nascimento = implode('/',array_reverse(explode('-',$nascimento)));?></td>
					<td><?php echo $result['sexo']; ?></td>
					<td><?php echo $result['estadoCivil']; ?></td> 
					<td><?php echo $habilidade; ?></td> 
					<td><?php echo $result['vinculo']; ?></td> 
					<td><?php echo $result['horarioEntrada']; ?></td> 
					<td><?php echo $result['horarioSaida']; ?></td> 
					<td><?php echo $observacao; ?></td>
					<td><a href=reProfissional.php?id=<?php echo $idProfissional;?> onClick="return confirma();">Editar</a></td>
					<td><a href=delProf.php?id=<?php echo $idProfissional;?> onClick="return confirmaDel();">Excluir</a></td>
				</tr>	
	<?php } ?>
		</Table>	
	<?php 	}else{ ?>
		<br><br>
		<center> Nenhum registro encontrado! </center>
	<?php } ?>
	
	<?php 
		if ($stm->rowCount() > 0){ ?>

				<h4> Endereço:</h4>
				
			<Table border=1 style="border-collapse: collapse">

					<tr> 			
						<th> Id Endereco </th>
						<th> id Profissional </th>
						<th> Cidade </th> 
						<th> Logradouro </th> 
						<th> Bairro </th> 
						<th> Número </th>
						<th> Tipo de Endereco </th> 
						<th> Complemento </th>
						<th> Cep </th>
						<th> UF </th>
						<th> Editar </th>
						<th> Excluir </th>					
					</tr>
	<?php 
			while($return = $stm->fetch()){ 
	?>  							
				<tr>
					<td><?php echo $return['idEndereco'];?></td>
					<td><?php echo $return['idProfissional'];?></td>
					<td><?php echo $return['cidade'];?></td>
					<td><?php echo $return['logradouro'];?></td>
					<td><?php echo $return['bairro'];?></td>
					<td><?php echo $return['numero']; ?></td>
					<td><?php echo $return['tipoEndereco'];?></td>
					<td><?php echo $return['complemento']; ?></td> 
					<td><?php echo $return['cep']; ?></td> 
					<td><?php echo $return['uf'];?></td>
					<td><a href=editarEnd.php?id=<?php echo $return['idEndereco'];?>>Editar </a></td>
					<td><a href=delEnd.php?id=<?php echo $return['idEndereco'];?> onClick="return confirmaDel();">Excluir </a></td>									
				</tr>
	<?php 
					
	} ?>
		</Table>
		
	<?php 	}else{ ?>
			<br><br>
			<center> Nenhum registro encontrado!</center>
			<br><br>
	<?php } ?>
					<br><a href=endereco.php?id=<?php echo $idProfissional;?>>Adicionar Endereco</a>
		<?php			
	 
		if ($st->rowCount() > 0){ ?>

				<h4> Contato:</h4>
				
				<Table border=1 style="border-collapse: collapse">
					<tr> 
						<th> Id Contato </th>
						<th> id Profissional </th>
						<th> Tipo de Telefone </th> 
						<th> Operadora </th> 
						<th> Número </th> 
						<th> Tipo de Email </th>
						<th> Endereço de Email </th>
						<th> Editar</th>					
						<th> Excluir </th>
					</tr>
	<?php 
		while ($return = $st->fetch(PDO::FETCH_ASSOC)) { 
	?>  						
				<tr>
					<td><?php echo $return['idContato'];?></td>
					<td><?php echo $return['idProfissional'];?></td>
					<td><?php echo $return['tipoTelefone'];?></td>
					<td><?php echo $return['operadora'];?></td>
					<td><?php echo $return['numero'];?></td>
					<td><?php echo $return['tipoEmail']; ?></td>
					<td><?php echo $return['Email']; ?></td> 
					<td><a href=editarContato.php?id=<?php echo $return['idContato'];?>>Editar </a></td>			
					<td><a href=delContato.php?id=<?php echo $return['idContato'];?> onClick="return confirmaDel();">Excluir </a></td>
				</tr>			
	<?php 
		} 
	?>
	</Table>
	
	<?php 	}else{ ?>
				<br><br>
		<center> Nenhum registro encontrado!<br>
					
		</center>
	<?php } ?>
				<br><a href=contato.php?id=<?php echo $idProfissional;?> onClick="return confirma();">Cadastrar Contato </a>				
		</center>	
				</div>
			</div>
		</div>
	</div>
	</body>
</html>