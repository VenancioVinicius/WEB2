<?php

	function select() {

		$cursos = array();
		$fp = fopen('cursos.txt', 'r');

        if($fp) {
            while(!feof($fp)) {
				$arr = array();
                $cpf = fgets($fp);
				$dados = fgets($fp);
				if(!empty($dados)) {
					$arr = explode("#", $dados);
					$cursos[$cpf] = $arr;
				}
			}
			fclose($fp);
		}

		return $cursos;
	}

	function select_where($cpf) {

		$cursos = select();

		foreach ($cursos as $chave => $dados) {
			// echo "$cpf=$chave<br>";
			if(strcmp($cpf, trim($chave)) == 0) { 
				return $dados;
			}
		}

		return null;	
	}

	function insert($curso) {

		$fp = fopen('cursos.txt', 'a+');

		if ($fp) {
			foreach($curso as $cpf => $dados) {
				if(!empty($dados)) {
					fputs($fp, $cpf);
					fputs($fp, "\n");
					$linha=$dados['nome']."#".$dados['endereco']."#".$dados['telefone'];
					fputs($fp, $linha);
					fputs($fp, "\n");
				}
			}
			fclose($fp);
			echo "<script> alert('[OK] Curso Cadastrado com Sucesso!') </script>";
		}
	}

	function update($new, $cpf) {

		$cursos = select();

		$fp = fopen('bkp.txt', 'a+');

		if ($fp) {
			foreach($cursos as $chave => $dados) {
				if(!empty($dados)) {
					fputs($fp, $chave);
					if($cpf == trim($chave)){
						foreach($new as $new_cpf => $new_dados) {
							if(!empty($new_dados)) {
								$linha=$new_dados['nome']."#".$new_dados['endereco']."#".$new_dados['telefone']."\n";
							}
						}
					}
					else 
						$linha=$dados[0]."#".$dados[1]."#".$dados[2];
					fputs($fp, $linha);
				}
			}
			fclose($fp);
			echo "<script> alert('[OK] Curso Alterado com Sucesso!') </script>";

			unlink("cursos.txt");
			rename("bkp.txt", "cursos.txt");
		}
	}

	function delete($cpf) {
		
		$cursos = select();

		$fp = fopen('bkp.txt', 'a+');

		if ($fp) {
			foreach($cursos as $chave => $dados) {
				if(!empty($dados)) {
					if($cpf == trim($chave)){ }					
					else {
						fputs($fp, $chave);
						$linha=$dados[0]."#".$dados[1]."#".$dados[2];
						fputs($fp, $linha);
					}
				}
			}
			fclose($fp);
			echo "<script> alert('[OK] Pessoa Removida com Sucesso!') </script>";

			unlink("cursos.txt");
			rename("bkp.txt", "cursos.txt");
		}
	}

?>
