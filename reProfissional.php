<html>
<head>
	<meta charset='utf8'>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
			
	
	<script language='javascript'>

		function validarCadastro(){
			
			if(document.CadastrarProfissional.nome.value.trim()==""){
				alert("Por favor, preencha o campo nome!");
				document.CadastrarProfissional.nome.focus();
				return false;
			}
			
			if(document.CadastrarProfissional.nascimento.value.trim()==	""){
				alert("Por favor, preencha o campo Data de Nascimento!");
				document.CadastrarProfissional.nascimento.focus();
				return false;
			}
			if(document.CadastrarProfissional.sexo.value.trim()==""){
				alert("Por favor, preencha o campo Sexo!");
				document.CadastrarProfissional.sexo.focus();
				return false;
			}
				if(document.CadastrarProfissional.estadoCivil.value.trim()==""){
				alert("Por favor, preencha o campo Estado Civil!");
				document.CadastrarProfissional.estadoCivil.focus();
				return false;
			}
				
			if(document.CadastrarProfissional.horarioEntrada.value.trim()==""){
				alert("Por favor, preencha o campo Horário de entrada!");
				document.CadastrarProfissional.horarioEntrada.focus();
				return false;
			}
			if(document.CadastrarProfissional.horarioSaida.value.trim()==""){
				alert("Por favor, preencha o campo horario de saida!");
				document.CadastrarProfissional.horarioSaida.focus();
				return false;
			}
		
		}
		
		function calcularIdade(valor){
			var campo1 = document.getElementById("nascimento").value;
			var resultado = parseInt(campo1);
			resultado = 2016-campo1;
			document.getElementById('idade').value = resultado;
		}
	
	</script>
	
	<?php 

		include "database.php";
		$idProfissional = $_GET["id"];
		$stmt =  buscarProfissionalPorID($idProfissional);
		$stmt = $stmt->fetch();
		$habilidade = explode(",", $stmt['habilidade']);	#Explode separa os itens do array, nesse caso em vígula;

		$nascimento = $stmt['nascimento'] ; 
		$nascimento = implode('/',array_reverse(explode('-',$nascimento))); # O array está tendo sua posição invertida pelo "array_reverse" .
		$anoNascimento = substr($nascimento, -4); #substr, nesse caso está sendo utilizada para pegar apenas os ultimos 4 dígitos dos dados armazenados na variável $nascimento.
		$idade = 2016 - $anoNascimento;

		#print_r ($anoNascimento);
		#print_ ($idade);

		#$data = DateTime::createFromFormat("Y-m-d", $stmt['nascimento']);
		#echo $data->format('Y');

		#Página para de edição de dados transcritos no formulario de cadastro.
		if(empty($stmt)){
	?>
			 Registro não localizado na base de dados!
	<?php 
		}else{
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
				<div class="form">
				


				 <form name='CadastrarProfissional'  method='post' action='updateProfissional.php' onsubmit='return validarCadastro();'> 
				   
				 	<input type='hidden' name='idProfissional' value='<?php echo $_GET['id']; ?>'>
					<label>Cadastrar profissional</label>
				 
					<label>Nome:</label>
				 	<input name='nome' type='text'  id='nome' value="<?php echo $stmt['nome'] ; ?>" size='47' maxlength='60'>		
					
					<label>Nascimento:</label>
				 	<input name='nascimento' id='nascimento' type='text' placeholder="dia/mes/ano" size='11' value="<?php echo $nascimento; ?>" onChange="IdadeCorreta(this.value);"/>
					
					<label>Idade:</label>
				 	<input name='idade' id='idade' type='text' size='10'  maxlength='3' value="<?php echo $idade ; ?>"  onkeypress="return SomenteNumero(event);"/>	
				
				    <label>Sexo:</label> 	
					<select name="sexo" id="sexo">
						<option  <?php if ($stmt['sexo'] == 'M') echo 'selected';?>  value="M">Masculino</option>
						<option  <?php if ($stmt['sexo'] == 'F') echo 'selected';?>  value="F">Feminino</option>
					</select>	
					
				 	<label>Estado Civil:</label>
					<select name="estadoCivil" id="estadoCivil">
						<option  <?php if ($stmt['estadoCivil'] == 'Solteiro') echo 'selected';?>  value="solteiro">Solteiro</option>
						<option  <?php if ($stmt['estadoCivil'] == 'Casado') echo 'selected';?>  value="casado">Casado</option>
						<option  <?php if ($stmt['estadoCivil'] == 'Divorciado') echo 'selected'; ?> value="divorciado">Divorciado</option>
						<option  <?php if ($stmt['estadoCivil'] == 'Separado') echo 'selected';?> value="separado">Separado</option>
						<option  <?php if ($stmt['estadoCivil'] == 'Viuvo') echo 'selected';?> value="viuvo">Viuvo</option>
					</select>	
					
				 	<label>Vínculo:</label> 
					<select name="vinculo" id="vinculo">
						<option <?php if ($stmt['vinculo'] == 'CLT') echo 'selected';?>  value="CLT">CLT</option>
						<option <?php if ($stmt['vinculo'] == 'Temporario') echo 'selected';?> value="Temporario">Temporário</option>
					</select>
					
				 
				 	<label>Horário de entrada:</label>
				 	<input name='horarioEntrada' type='text'size='2' maxlength='5'  value="<?php echo $stmt['horarioEntrada'] ; ?>"  id='horarioEntrada'>		
					
				 	<label>Horário de saída:</label>
				 	<input name='horarioSaida' type='text' size='2' maxlength='5' value="<?php echo $stmt['horarioSaida'] ; ?>"  id='horarioSaida'>		
					
					<label>Habilidades:</label>
					<input type="checkbox" name="habilidade[0]" value="Html" <?php if (in_array('Html' , $habilidade)){ echo "checked" ; } ?>>HTML 
					<input type="checkbox" name="habilidade[1]" value="Css" <?php if (in_array('Css' , $habilidade)) { echo "checked" ; } ?>>CSS 
					<input type="checkbox" name="habilidade[2]" value="Javascript" <?php if (in_array('Javascript' , $habilidade)) { echo "checked" ; } ?>>Javascript 
					<input type="checkbox" name="habilidade[3]" value="Php" <?php if (in_array('Php' , $habilidade)) { echo "checked" ; } ?>>PHP
					<input type="checkbox" name="habilidade[4]" value="BancoDados" <?php if (in_array('BancoDados' , $habilidade)) { echo "checked" ; } ?>>Banco de dados 
							
					<label>Observações:</label><textarea rows="3" cols="50" name='observacao' id='observacao'  placeholder="O preenchimento deste campo não é obrigatório!" ></textarea>		
				<input type='submit' value='Cadastrar'>
			</form>



	<?php } ?>
			
					<script>
						function IdadeCorreta(valor){
							document.getElementById('idade').value = parseInt( new Date().getFullYear() ) - parseInt( valor.substr(-4) );
						}					
					</script>
			
					</div>
				</div>
			</div>
		</div>

</body>
</html>