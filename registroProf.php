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
				<div class="tabela">
		
		
<?php 
	include "database.php";
	
	# Este script faz a interface com o banco de dados, inserindo ou atualizando os dados do profissional na tabela Profissional	

	# Neste trecho é pego do POST os dados enviados do formulario do profissional
	$nome = $_POST["nome"];
	$idade = $_POST["idade"];
	$nascimento = $_POST["nascimento"];
	$sexo = $_POST["sexo"];
	$estadoCivil = $_POST["estadoCivil"];
	$habilidade = $_POST["habilidade"];
	$vinculo = $_POST["vinculo"];
	$horarioEntrada = $_POST["horarioEntrada"];
	$horarioSaida = $_POST["horarioSaida"];
	$observacao = $_POST["observacao"];

	# A primeira função implode está separando o array por vírgula.	
	# A segunda está fazendo a separação por barra.
	$habilidade = implode(",", $habilidade);
	$nascimento = implode("/",array_reverse($nascimento));
	$idProfissional = inserirProfissional($nome, $idade, $nascimento, $sexo, $estadoCivil, $habilidade, $vinculo, $horarioEntrada , $horarioSaida, $observacao);

 ?>

			<center><h3> Tabela de registros:</h3></center>
				<Table border=1 style="border-collapse: collapse">
					<tr> 
						<th> Id </th>
						<th> Nome </th> 
						<th> Idade </th>
						<th> Nascimento </th> 
						<th> Sexo </th>
						<th> Estado Civil </th>
						<th> Habilidades </th>
						<th> Vínculo </th>
						<th> Horario de Entrada </th>
						<th> Horário de Saida </th>
						<th> Observações </th>
						<th> Endereço </th>
						<th> Contato </th>
					</tr>					
					<?php
						  $habilidade = implode('<br>',array_reverse(explode(',',$habilidade)));
			  			  $observacao = implode('<p>',array_reverse(explode(',',$observacao)));
					?>
					
					<tr>
						<td><?php echo $idProfissional; ?></td> 
						<td><?php echo $nome?></td>
						<td><?php echo $idade;?></td>
						<td><?php echo $nascimento = implode("/", array_reverse(explode("/", $nascimento)));?>
						<td><?php echo $sexo; ?></td> 	
						<td><?php echo $estadoCivil; ?></td> 
						<td><?php echo $habilidade; ?></td> 
						<td><?php echo $vinculo;?></td>
						<td><?php echo $horarioEntrada; ?></td> 
						<td><?php echo $horarioSaida; ?></td> 
						<td><?php echo $observacao; ?></td> 
						<td><a href="endereco.php?id=<?php echo $idProfissional;?>" onClick="return confirma();">Cadastrar Endereço </a></td>
						<td><a href="contato.php?id=<?php echo $idProfissional;?>" onClick="return confirma();">Cadastrar Contato </a></td>
					</tr>	
			</Table>	
			
				</div>
			</div>
		</div>
	</div>
</body>
</html>

