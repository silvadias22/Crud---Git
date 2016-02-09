<html>
<head>
	<meta charset='utf8'>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
			<script language="javascript">
	
		function confirmaEdit(){
			var r = confirm("Tem certeza que deseja editar esse registro?");
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
		$idContato = $_GET['id'];
		$stm = buscarContatoPorID($idContato);		
		$stm = $stm->fetch();
		if(empty($stm)){

	?>
		 Registro não localizado na base de dados!

	<?php 
		}else{ ?>
		
			<form name='descricao'  method='post' action='updateContato.php' onsubmit='return RegistroProf();'> 
					<?php
						echo "<input type='hidden' name='idContato' value='".$_GET['id']."'>";		
					?>
			
				<h2><label>Telefones</label></h2>
				
				<label>Tipo:</label>
				<select name="tipoTelefone" id="tipoTelefone">
					<option <?php if ($stm['tipoTelefone'] == 'Celular') echo 'selected';?>  value="Celular">Celular</option>
					<option <?php if ($stm['tipoTelefone'] == 'Residencial') echo 'selected';?>  value="Residencial">Residencial</option>
					<option <?php if ($stm['tipoTelefone'] == 'Comercial') echo 'selected';?>  value="Comercial">Comercial</option>
				</select>	
				
				<label>Operadora:</label>
				<select name="operadora" id="operadora">
					<option <?php if ($stm['operadora'] == 'Claro') echo 'selected';?>  value="Claro">Claro</option>
					<option <?php if ($stm['operadora'] == 'Tim') echo 'selected';?> value="Tim">Tim</option>
					<option <?php if ($stm['operadora'] == 'Vivo') echo 'selected';?> value="Vivo">Vivo</option>
					<option <?php if ($stm['operadora'] == 'Oi') echo 'selected';?> value="Oi">Oi</option>
					<option <?php if ($stm['operadora'] == 'Outra') echo 'selected';?> value="Outra">Outra</option>
				</select>
				
				<label>Numero:</label>
				<input name="numero" type="text" id="numero" size="25" maxlength="60" value="<?php echo $stm['numero'] ; ?>" />
				
				<h2><label>Emails</label></h2>
					
				<label>Tipo:</label> 
				<select name="tipoEmail" id="tipoEmail">
					<option  <?php if ($stm['tipoEmail'] == 'emailPessoal') echo 'selected';?>  value="emailPessoal">Pessoal</option>
					<option  <?php if ($stm['tipoEmail'] == 'emailComercial') echo 'selected';?>  value="emailComercial">Comercial</option>
				</select>
					
				<label>Email:</label>
				<input name="Email" type="text" id="Email" size="48" maxlength="60" value="<?php echo $stm['Email'] ; ?>" />
					
				<br>
				
				<input type='submit' value='Atualizar' onClick="return confirmaEdit();">
			</form>


	<?php 
		}
	?>
				</div>
			</div>
		</div>
</body>