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
					<form name='descricao' method='post' action='RegistroEndereco.php' onsubmit='return tipoEndereco();'> 
						<?php
							echo "<input type='hidden' name='idProfissional' value='".$_GET['id']."'>";
						?>

						<h3><label>Cadastro de endereço</label></h3>
						<label>Estado:</label>
						<select name="uf" id="uf">						
							<option  value="AC">AC</option> 	 
							<option  value="AL">AL</option>  	 
							<option  value="AP">Ap</option> 
							<option  value="AM">AM</option> 
							<option  value="BA">BA</option>  	 
							<option  value="CE">CE</option>  	 
							<option  value="DF">DF</option>  	 
							<option  value="ES">ES</option>  	 
							<option  value="GO">GO</option>  	 
							<option  value="MA">MA</option>  	 
							<option  value="MT">MT</option> 	 
							<option  value="MS">MS</option> 	 
							<option  value="MG">MG</option> 	 
							<option  value="PA">PA</option> 	 
							<option  value="PB">PB</option> 	 
							<option  value="PR">PR</option> 	 
							<option  value="PE">PE</option> 	 
							<option  value="PI">PI</option> 	 
							<option  value="RJ">RJ</option> 	 
							<option  value="RN">RN</option> 	 
							<option  value="RS">RS</option> 	 
							<option  value="RO">RO</option> 	 
							<option  value="RR">RR</option> 	 
							<option  value="SC">SC</option> 	 
							<option  value="SP">SP</option> 	 
							<option  value="SE">SE</option> 	 
							<option  value="TO">TO</option>
						</select>
						<label>Cidade:</label>
						<input name='cidade' type='text' id='cidade' size='37' maxlength='60'>

						<label>Logradouro:</label>
						<input name='logradouro' type='text'size='10' maxlength='30	' id='logradouro'>						

						<label>Bairro:</label>
						<input name='bairro' type='text'size='25' id='bairro'>

						<label>Número:</label>
						<input name='numero' type='text'size='5' maxlength='6' id='numero'>

						<label>Tipo:</label>
						<select name="tipoEndereco" id="tipoEndereco">					
							<option  value="residencial">Residencial</option> 	 
							<option  value="comercial">Comercial</option>
						</select>

						<label>Complemento:</label>
						<input name='complemento' type='text'size='5' id='complemento'>

						<label>Cep:</label>
						<input name='cep' type='text' id='cep'>	
						
						<br>
						
						<input type='submit' value='Cadastrar'>
					</form>
				</div>
			</div>
		</div>
</body>
</html>