<?php
	//incluindo classe
	include "No.php";

	$no = new No(null);

	$no->inserir(5);

	$no->inserir(3);

	$no->inserir(1);

	$no->inserir(7);

	$no->inserir(8);

	echo "<br>Pré ordem: <br>";

	$no->preOrdem();

	echo "<br>Em ordem: <br>";

	$no->emOrdem();

	echo "<br>Pós Ordem<br>";

	$no->posOrdem();

	echo "<br><br>";

	$no->buscar(8);

	echo "<br><br>Numero de nós<br>";

	echo($no->contarNos());

 ?>