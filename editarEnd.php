<html>
<head>
	<meta charset='utf8'>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script language='javascript'>
	
		function confirmaEditar(){
			var r = confirm("Tem certeza que deseja modificar esse registro?");
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
		$idEndereco = $_GET['id'];
		$stm = buscarEnderecoPorID($idEndereco);
				
		$stm = $stm->fetch();
		
	if(empty($stm)){
		
?>
		 Registro não localizado na base de dados!

<?php 
	}else{ ?>


				<form name='descricao' method='post' action='updateEndereco.php' onsubmit='return tipoEndereco();'> 
						<?php
							echo "<input type='hidden' name='idEndereco' value='".$_GET['id']."'>";
						?>
						
						<h3><center>Endereço</center></h3>
							
						<label>Estado:</label>
						
						<select name="uf" id="uf">						
							<option <?php if ($stm['uf'] == 'AC') echo 'selected';?> value="AC">AC</option> 	 
							<option <?php if ($stm['uf'] == 'AL') echo 'selected';?> value="AL">AL</option>  	 
							<option <?php if ($stm['uf'] == 'AP') echo 'selected';?> value="AP">AP</option> 
							<option <?php if ($stm['uf'] == 'AM') echo 'selected';?> value="AM">AM</option> 
							<option <?php if ($stm['uf'] == 'BA') echo 'selected';?> value="BA">BA</option>  	 
							<option <?php if ($stm['uf'] == 'CE') echo 'selected';?> value="CE">CE</option>  	 
							<option <?php if ($stm['uf'] == 'DF') echo 'selected';?> value="DF">DF</option>  	 
							<option <?php if ($stm['uf'] == 'ES') echo 'selected';?> value="ES">ES</option>  	 
							<option <?php if ($stm['uf'] == 'GO') echo 'selected';?> value="GO">GO</option>  	 
							<option <?php if ($stm['uf'] == 'MA') echo 'selected';?> value="MA">MA</option>  	 
							<option <?php if ($stm['uf'] == 'MT') echo 'selected';?> value="MT">MT</option> 	 
							<option <?php if ($stm['uf'] == 'MS') echo 'selected';?> value="MS">MS</option> 	 
							<option <?php if ($stm['uf'] == 'MG') echo 'selected';?> value="MG">MG</option> 	 
							<option <?php if ($stm['uf'] == 'PA') echo 'selected';?> value="PA">PA</option> 	 
							<option <?php if ($stm['uf'] == 'PB') echo 'selected';?> value="PB">PB</option> 	 
							<option <?php if ($stm['uf'] == 'PR') echo 'selected';?> value="PR">PR</option> 	 
							<option <?php if ($stm['uf'] == 'PE') echo 'selected';?> value="PE">PE</option> 	 
							<option <?php if ($stm['uf'] == 'PI') echo 'selected';?> value="PI">PI</option> 	 
							<option <?php if ($stm['uf'] == 'RJ') echo 'selected';?> value="RJ">RJ</option> 	 
							<option <?php if ($stm['uf'] == 'RN') echo 'selected';?> value="RN">RN</option> 	 
							<option <?php if ($stm['uf'] == 'RS') echo 'selected';?> value="RS">RS</option> 	 
							<option <?php if ($stm['uf'] == 'RO') echo 'selected';?> value="RO">RO</option> 	 
							<option <?php if ($stm['uf'] == 'RR') echo 'selected';?> value="RR">RR</option> 	 
							<option <?php if ($stm['uf'] == 'SC') echo 'selected';?> value="SC">SC</option> 	 
							<option <?php if ($stm['uf'] == 'SP') echo 'selected';?> value="SP">SP</option> 	 
							<option <?php if ($stm['uf'] == 'SE') echo 'selected';?> value="SE">SE</option> 	 
							<option <?php if ($stm['uf'] == 'TO') echo 'selected';?> value="TO">TO</option>
						</select>
						
						<label>Cidade:</label>
						<input name="cidade" type="text" id="cidade" size="33" maxlength="60" value="<?php echo $stm['cidade'] ; ?>" />
									
						<label>Bairro:</label>
						<input name='bairro' type='text'size='10' id='bairro' value='<?php echo $stm['bairro'] ; ?> '>
						
						<label>Número:</label>
						<input name='numero' type='text'size='5' maxlength='6' id='numero' value='<?php echo $stm['numero'] ; ?> '>
						
						<label>Tipo:</label>
						<select name="tipoEndereco" id="tipoEndereco">					
							<option <?php if ($stm['tipoEndereco'] == 'Residencial') echo 'selected'; ?> value="residencial">Residencial</option> 	 
							<option <?php if ($stm['tipoEndereco'] == 'Comercial') echo 'selected'; ?> value="comercial">Comercial</option>
						</select>
						
						<label>Logradouro:</label>
						<input name='logradouro' type='text'size='10' maxlength='30	' id='logradouro' value='<?php echo $stm ['logradouro'] ; ?> '>
					
						<label>Complemento:</label>
						<input name='complemento' type='text'size='14' id='complemento' value='<?php echo $stm ['complemento'] ; ?> '>
						
						<label>Cep:</label>
						<input name='cep' type='text'size='17' id='cep' value='<?php echo $stm ['cep'] ; ?> '>
							<br>
						<input type='submit' value='Efetuar edição' onClick='return confirmaEditar();'>
				</form>
	
<?php } ?>
			
			</div>
		</div>
	</div>
</body>
</html>
