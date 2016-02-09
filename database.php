<?php
	/*				 	CRUD - ISUD  - by: Fabrício da Silva Dias
	 ____________________________________________________________
	|| 														    ||
	|| crud = [C]reate, [R]ead, [U]pdate e [D]elete ou Destroy	||
	|| isud = [I]NSERT, [S]ELECT, [U]pdate, [D]elete			||
	||__________________________________________________________||
	
	*/

	// Função para conexão com banco de dados.
	function conexaoPDO(){	
		#Iniciando conexão com banco de dados
		$pdo = new PDO ('mysql:unix_socket=/opt/lampp/var/mysql/mysql.sock;dbname=CrudProfissional','root', '');
		$pdo->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		return $pdo;
		

	}
	
	#função para atualizar \ Update das informações do Profissional.
	function updateProfissional($nome, $idade, $nascimento, $sexo, $estadoCivil, $habilidade, $vinculo, $horarioEntrada , $horarioSaida, $observacao, $idProfissional){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare( 
			'update Profissional '.    
			'set nome = :nome,'.
			'idade = :idade,'.
			'nascimento = :nascimento, '.
			'sexo = :sexo, '.
			'estadoCivil = :estadoCivil,'.
			'habilidade = :habilidade, '.
			'vinculo = :vinculo,'.
			'horarioEntrada = :horarioEntrada,'.
			'horarioSaida = :horarioSaida,'.
			'observacao = :observacao '.
			'where idProfissional = :idProfissional');

		$stmt->bindValue(":nome", $nome);
		$stmt->bindValue(":idade", $idade);
		$stmt->bindValue(":nascimento", $nascimento);
		$stmt->bindValue(":sexo", $sexo);
		$stmt->bindValue(":estadoCivil", $estadoCivil);
		$stmt->bindValue(":habilidade", $habilidade);
		$stmt->bindValue(":vinculo", $vinculo);
		$stmt->bindValue(":horarioEntrada", $horarioEntrada);
		$stmt->bindValue(":horarioSaida", $horarioSaida);	
		$stmt->bindValue(":observacao", $observacao);		
		$stmt->bindValue(":idProfissional", $idProfissional);
		$stmt->execute();
		$pdo = null;
	}	
	
	# Função de insert, usada para inserir dados no banco de dados.
	function inserirProfissional($nome, $idade, $nascimento, $sexo, $estadoCivil, $habilidade, $vinculo, $horarioEntrada , $horarioSaida, $observacao){ 
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('
			INSERT INTO Profissional(
				nome,
				idade,
				nascimento, 
				sexo, 
				estadoCivil,
				habilidade,
				vinculo,
				horarioEntrada,
				horarioSaida,
				observacao
			)VALUES(
				:nome, 
				:idade,
				:nascimento, 
				:sexo, 
				:estadoCivil,
				:habilidade,
				:vinculo,
				:horarioEntrada,
				:horarioSaida,
				:observacao
			);' 	
		);

		$stmt->bindValue(":nome", $nome);
		$stmt->bindValue(":idade", $idade);
		$stmt->bindValue(":nascimento", $nascimento);
		$stmt->bindValue(":sexo", $sexo);
		$stmt->bindValue(":estadoCivil", $estadoCivil);
		$stmt->bindValue(":habilidade", $habilidade);
		$stmt->bindValue(":vinculo", $vinculo);
		$stmt->bindValue(":horarioEntrada", $horarioEntrada);
		$stmt->bindValue(":horarioSaida", $horarioSaida);
		$stmt->bindValue(":observacao", $observacao);
		$stmt->execute();
		
		return $pdo->lastInsertId();
	}		

	# Função para efetuar buscas, essa função busca todos os profissionais.
	function buscarTodosProfissionais(){	
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare("select * from Profissional;");
		$stmt->execute();
		$pdo = null;
		return $stmt;
	}
	
	#função para efetuar a deleção de um registro específicado pelo ID.
	function deletarProf($id){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('DELETE FROM Profissional WHERE idProfissional = :idProfissional;');
		$stmt->bindValue(":idProfissional", $id);   
		$stmt->execute();               
		$pdo = null;
		return $stmt;
	}

	#função para efetuar buscas de registro específicado pelo ID;
	function buscarProfissional($idProfissional){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('SELECT FROM Profissional WHERE idProfissional = :idProfissional;');
		$stmt->bindValue(":idProfissional", $idProfissional);   
		$stmt->execute();               
		$pdo = null;
		return $stmt;
	}
	
	#Função de inserção, utilizada para inserir os dados preenchidos no formulario "endereço" na tabela "Endereco" do banco de dados.
	function inserirEndereco($idProfissional, $cidade, $logradouro, $bairro, $numero, $tipoEndereco, $complemento , $cep, $uf){ 
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('
			INSERT INTO Endereco(
				idProfissional,
				cidade,
				logradouro,
				bairro, 
				numero, 
				tipoEndereco,
				complemento, 
				cep,
				uf
			)VALUES(
				:idProfissional, 
				:cidade,
				:logradouro,
				:bairro, 
				:numero, 
				:tipoEndereco,
				:complemento,
				:cep,	
				:uf
			);' 	
		);
		$stmt->bindValue(":idProfissional", $idProfissional);
		$stmt->bindValue(":cidade", $cidade);
		$stmt->bindValue(":logradouro", $logradouro);
		$stmt->bindValue(":bairro", $bairro);
		$stmt->bindValue(":numero", $numero);
		$stmt->bindValue(":tipoEndereco", $tipoEndereco);
		$stmt->bindValue(":complemento", $complemento);
		$stmt->bindValue(":cep", $cep);
		$stmt->bindValue(":uf", $uf);
		$stmt->execute();
		$pdo = null;
		
	}			

	#Função de inserção, utilizada para inserir os dados preenchidos no formulario "Contato" na tabela "Contato" do banco de dados.
	function inserirContato($idProfissional, $tipoTelefone, $operadora, $numero, $tipoEmail, $Email){ 
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('
			INSERT INTO Contato(
				idProfissional,
				tipoTelefone,
				operadora,
				numero, 
				tipoEmail, 
				Email
			)VALUES(
				:idProfissional, 
				:tipoTelefone,
				:operadora,
				:numero, 
				:tipoEmail, 
				:Email
			);' 	
		);
			
		$stmt->bindValue(":idProfissional", $idProfissional);
		$stmt->bindValue(":tipoTelefone", $tipoTelefone);
		$stmt->bindValue(":operadora", $operadora);
		$stmt->bindValue(":numero", $numero);
		$stmt->bindValue(":tipoEmail", $tipoEmail);
		$stmt->bindValue(":Email", $Email);
		$stmt->execute();
		$pdo = null;	
	}			
	
	#Função para buscar todos os endereços, sem especificação.
	function buscarTodosEnderecos(){	
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare("select * from Endereco;");
		$stmt->execute();
		$pdo = null;
		return $stmt;
	}

	#Função para buscar todos os Contatos, sem especificação.	
	function buscarTodosContatos(){	
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare("select * from Contato;");
		$stmt->execute();
		$pdo = null;
		return $stmt;
	}

	#Função para buscar os registros de profissionais especificos utilizando ID do profissional.
	function buscarProfissionalPorID($idProfissional){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('select * from Profissional WHERE idProfissional = :idProfissional;');
		$stmt->bindValue(":idProfissional", $idProfissional);   
		$stmt->execute();               
		$pdo = null;
		return $stmt;
	}
	
	#Função para buscar os registros de Endereços especificos utilizando ID do Endereco.	
	function buscarEnderecoPorID($idEndereco){
		$pdo = conexaoPDO();
		$stm = $pdo->prepare("select * from Endereco WHERE idEndereco = :idEndereco;");
		$stm->bindValue(":idEndereco", $idEndereco);   
		$stm->execute();               
		$pdo = null;
		return $stm;
	}

	#Função para buscar os registros de endereço por ID do Profissional.
	function buscarEnderecoPorIdProfissional($idProfissional){
		$pdo = conexaoPDO();
		$stm = $pdo->prepare("select * from Endereco WHERE idProfissional = :idProfissional;");
		$stm->bindValue(":idProfissional", $idProfissional);   
		$stm->execute();               
		$pdo = null;
		return $stm;
	}

	#Função para efetuar a deleção de endereço especificado pelo ID do Profissional
	function deletarEndereco($idProfissional){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('DELETE FROM Endereco WHERE idEndereco = :idProfissional;');
		$stmt->bindValue(":idProfissional", $idProfissional);   
		$stmt->execute();               
		$pdo = null;
		return $stmt;
	}

	#Função para efetuar a deleção de Contato especificado pelo ID do Profissional	
	function deletarContato($idProfissional){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare('DELETE FROM Contato WHERE idContato = :idProfissional;');
		$stmt->bindValue(":idProfissional", $idProfissional);   
		$stmt->execute();               
		$pdo = null;
		return $stmt;
	}

	#Função utilizada para atualizar(Update) Endereco.
	function atualizar($cidade, $logradouro, $bairro, $numero, $tipoEndereco, $complemento , $cep, $uf, $idEndereco){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare( 
			'update Endereco '.    
			'set cidade = :cidade,'.
			'logradouro = :logradouro,'.
			'bairro = :bairro, '.
			'numero = :numero, '.
			'complemento = :complemento,'.
			'tipoEndereco = :tipoEndereco, '.
			'cep = :cep,'.
			'uf = :uf '.
			'where idEndereco = :idEndereco');

		$stmt->bindValue(":cidade", $cidade);
		$stmt->bindValue(":logradouro", $logradouro);
		$stmt->bindValue(":bairro", $bairro);
		$stmt->bindValue(":numero", $numero);
		$stmt->bindValue(":complemento", $complemento);
		$stmt->bindValue(":tipoEndereco", $tipoEndereco);
		$stmt->bindValue(":cep", $cep);
		$stmt->bindValue(":uf", $uf);
		$stmt->bindValue(":idEndereco", $idEndereco);
		$stmt->execute();
		$pdo = null;
	}	
	
	#Função utilizada para atualizar(Update) Contato.
	function updateContato($tipoTelefone, $operadora, $numero, $tipoEmail, $Email, $idContato){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare( 
			'update Contato '.    
			'set tipoTelefone = :tipoTelefone, '.
			'operadora = :operadora, '.
			'numero = :numero, '.
			'tipoEmail = :tipoEmail, '.
			'Email = :Email '.
			'where idContato = :idContato');

		$stmt->bindValue(":tipoTelefone", $tipoTelefone);
		$stmt->bindValue(":operadora", $operadora);
		$stmt->bindValue(":numero", $numero);
		$stmt->bindValue(":tipoEmail", $tipoEmail);
		$stmt->bindValue(":Email", $Email);
		$stmt->bindValue(":idContato", $idContato);
		$stmt->execute();
		$pdo = null;
	}	
	
	#Função para efetuar buscas de contato por ID do contato.
	function buscarContatoPorID($idContato){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare("select * from Contato WHERE idContato = :idContato;");
		$stmt->bindValue(":idContato", $idContato);   
		$stmt->execute();               
		$pdo = null;
		return $stmt;
	}
	
	#Função para efetuar buscas de contato por ID do Profissional.
	function buscarContatoPorIdProfissional($idProfissional){
		$pdo = conexaoPDO();
		$stmt = $pdo->prepare("select * from Contato WHERE idProfissional = :idProfissional;");
		$stmt->bindValue(":idProfissional", $idProfissional);   
		$stmt->execute();               
		$pdo = null;
		return $stmt;
	}

	#Função para efetuar buscas de contato por ID do Profissional (Diferencia da anterior apenas no retorno).	
	function buscarContatoPorIdProfissionalStm($idProfissional){
		$pdo = conexaoPDO();
		$stm = $pdo->prepare("select * from Contato WHERE idProfissional = :idProfissional;");
		$stm->bindValue(":idProfissional", $idProfissional);   
		$stm->execute();               
		$pdo = null;
		return $stm;
	}
?>