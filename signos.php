<?php
	$nome 		=	$_GET['nome'];
	$nascimento	=	$_GET['nascimento'];

	$vData 			= new DateTime($nascimento);
	$nascimento 		= $vData->format('md');
	$int_nascimento	= intval( $nascimento );
	
	$xml = simplexml_load_file('signo.xml');
	
	foreach ($xml->signo as $linha) :

		$int_dataIncio		=	intval($linha->dataInicio);
		$int_dataFim		=	intval($linha->dataFim);

		if 	(
				($int_nascimento >= $int_dataIncio) and ($int_nascimento <= $int_dataFim) 
				or 
				(($int_nascimento <= 120) and ($int_dataFim == 120))
				or 
				(($int_nascimento >= 1222) and ($int_dataFim == 120))
			)
		{
				echo $nome . ' seu signo é ' . $linha->signoNome;
				echo '<br><br>';
				echo 'Suas principais caractaristicas são: ';
				echo $linha->descricao;
		}
	 endforeach;
?>
