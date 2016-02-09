<html>
<head>
	<meta charset='utf8'>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<?php 
		include "database.php";
	?>
	
<div class="diva">		
	<div class="cabecalho">
		<center><img src="img/crud3.png"/></center> 
	</div>
		
	<div class="menu">		
		<?php include "menu.php";  ?>		
	</div>

	<div class="conteudo">
		<div class="com-margin">
			<form name='descricao' method='post' action='cadastroContato.php'> 
				
				<?php 
					echo "<input type='hidden' name='idProfissional' value='".$_GET['id']."'>";
				?>				
				
				<h3><label>Telefones</label></h3>
					
				
				<label>Tipo:</label>
				<select name="tipoTelefone" id="tipoTelefone">
					<option  value="Celular">Celular</option>
					<option  value="Residencial">Residencial</option>
					<option  value="Comercial">Comercial</option>
				</select>	
					
				<label>Operadora:</label>
				<select name="operadora" id="operadora">
					<option  value="Claro">Claro</option>
					<option  value="Tim">Tim</option>
					<option  value="Vivo">Vivo</option>
					<option  value="Oi">Oi</option>
					<option  value="Outra">Outra</option>
				</select>
				
				<label>Número:</label> 
				<input name='numero' type='text' id='numero' size='12' maxlength='60'>
					
				<label> Emails</label>
				
				<label>Tipo:</label> 
				<select name="tipoEmail" id="tipoEmail">
					<option  value="emailPessoal">Pessoal</option>
					<option  value="emailComercial">Comercial</option>
				</select>
			
				<label>Email:</label>
				<input name='Email' type='text' id='Email' size='32	' maxlength='70'>			
				
				<br>
				
				<input type='submit' value='Cadastrar'>
			</form> 
		</div>			
	</div>
</div>

</body>
</html>