<html>
<head>
 <meta charset="utf8">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	
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
			var campo1 = document.getElementById("ano").value;
			var resultado = parseInt(campo1);
			resultado = 2016-campo1;
			document.getElementById('idade').value = resultado;
		}
		

		function SomenteNumero(e){
			 var tecla=(window.event)?event.keyCode:e.which;
			 if((tecla>47 && tecla<58)) return true;
			 else{
			 if (tecla==8 || tecla==0) return true;
			 else  return false;
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
				<div class="form">
					
					<form name='CadastrarProfissional'  method='post' action='registroProf.php' onsubmit='return validarCadastro();'> 
						<label for="Nome:">Nome: </label>
						<input name='nome' type='text' id='nome' size='65' maxlength='50' placeholder="Insira seu nome completo">
						
						<label>Nascimento:</label>
						<input name='nascimento[0]' type='text' size='3'  maxlength='2' id="dia" placeholder="Dia" onkeypress="return SomenteNumero(event);" > /
						<input name='nascimento[1]' type='text' size='3'  maxlength='2' id="mes" placeholder="Mês" onkeypress="return SomenteNumero(event);" > /
						<input name='nascimento[2]' type='text' size='7' maxlength='4' id="ano" placeholder="Ano" onChange="calcularIdade(this.value);"/>
						
						<label>Idade:</label>
						<input name='idade' type='text' size='8' maxlength='3' id="idade"  placeholder="Idade" onChange='CalcularIdade(this.value);'onkeypress="return SomenteNumero(event);">
						
						<label>Sexo:</label> 	
						<select name="sexo" id="sexo">
							<option  value="M">Masculino</option>
							<option  value="F">Feminino</option>
						</select>	
						
						
						<label>Estado Civil:</label>
						<select name="estadoCivil" id="estadoCivil">
							<option  value="solteiro">Solteiro</option>
							<option  value="casado">Casado</option>
							<option  value="divorciado">Divorciado</option>
							<option  value="separado">Separado</option>
							<option  value="viuvo">Viuvo</option>
						</select>	
												
						<label>Vínculo:</label> 
						<select name="vinculo" id="vinculo">
							<option value="CLT">CLT</option>
							<option value="Temporario">Temporário</option>
						</select>
						
						<label>Horário de entrada:</label> 
						<input name='horarioEntrada' type='text'size='3'  maxlength='5' id='horarioEntrada' placeholder="12:00" />	
						
						<label>Horário de saída:</label> 
						<input name='horarioSaida' type='text' size='3' maxlength='5' id='horarioSaida' placeholder="12:00" />		
						
						<label>Habilidades:</label>
						<input type="checkbox" name="habilidade[0]" value="Html">HTML
						<input type="checkbox" name="habilidade[1]" value="Css">CSS
						<input type="checkbox" name="habilidade[2]" value="Javascript">Javascript
						<input type="checkbox" name="habilidade[3]" value="Php">PHP
						<input type="checkbox" name="habilidade[4]" value="BancoDados">Banco de dados
						
						<label>Observações:</label>
						<textarea rows="6" name='observacao' id='observacao'  placeholder="O preenchimento deste campo não é obrigatório!"></textarea>	
						
						<input type='submit' value='Cadastrar'/>
						
					</form>
				</div>
			</div>
		</div>	
	</div>	
</body>
</html>	
	
	