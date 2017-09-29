<?php
	class No{
		public $valor;
		public $esquerda;
		public $direita;
		public $raiz;

		public function __construct($valor){
			$this->valor = $valor;
		}

		public function inserir($valor){
			$this->verificaParainserir($this->raiz,$valor);
		}

		public function verificaParainserir($no, $valor){
			if($no == null){
				echo "inserindo: ".$valor." :como raiz<br>";
				$this->raiz = new No($valor);

			}else{
				if($valor < $no->valor){
					if($no->esquerda != null){
						$this->verificaParainserir($no->esquerda, $valor);
					}else{
						echo "Inserindo: ".$valor." :a esquerda de: ".$no->valor."<br>";
						$no->esquerda = new No($valor);
					}
				}else{
					if($no->direita != null){
						$this->verificaParainserir($no->direita, $valor);
					}else{
						echo "Inserindo: ".$valor." :a direita de: ".$no->valor."<br>";
						$no->direita = new No($valor);
					}
				}
			}

		}

		//Percorrer em Pré-Ordem
		//Lembrando que vizita raiz(faz tratamento na raiz),
		// filho da esquerda, filho da direita.
		public function preOrdem(){
			$this->percorerEmPreOrdem($this->raiz);
		}

		public function percorerEmPreOrdem($nodo){
			if($nodo == null){
				echo "Arvore Vazia";
			}else{
				echo $nodo->valor."   ";
				if($nodo->esquerda != null){
					$this->percorerEmPreOrdem($nodo->esquerda);
				}

				if($nodo->direita != null){
					$this->percorerEmPreOrdem($nodo->direita);
				}
			}
		}

		//percorrer em Ordem
		//visita esquerda, visita raiz(faz tratamento), direita
		public function emOrdem(){
			$this->percorrerEmOrdem($this->raiz);
		}

		public function percorrerEmOrdem($nodo){
			if($nodo == null){
				echo "Arvore Vazia";
			}else{
				if($nodo->esquerda != null){
					$this->percorrerEmOrdem($nodo->esquerda);
				}
				echo $nodo->valor."  ";
				if($nodo->direita != null){
					$this->percorrerEmOrdem($nodo->direita);
				}

			}
		}
		//Pós ordem
		//visita filho da esquerda, visita filho da direita, faz tratamento na raiz
		public function posOrdem(){
			$this->percorrerPosOrdem($this->raiz);
		}

		public function percorrerPosOrdem($nodo){
			if($nodo == null){
				echo "Arvore Vazia";
			}else{
				if($nodo->esquerda != null){
					$this->percorrerPosOrdem($nodo->esquerda);
				}
				if($nodo->direita != null){
					$this->percorrerPosOrdem($nodo->direita);
				}
				echo $nodo->valor."  ";
			}
		}

		public function buscar($valor){
			$this->percorrerBuscar($this->raiz, $valor);
		}

		public function percorrerBuscar($nodo, $valor){
			if($nodo != null){
				if($valor == $nodo->valor){
					echo $nodo->valor."  encontrado...";
					if($nodo->esquerda != null){
						echo "  tendo a esquerda : ".$nodo->esquerda->valor;
					}else{
						echo "  tendo a esquerda vazia sem nada nula" ;
					}

					if($nodo->direita != null){
						echo " e tendo a direita : ".$nodo->direita->valor;
					}else{
						echo "  e tendo a direita vazia sem nada nula";
					}
				}

				if($valor < $nodo->valor){
					$this->percorrerBuscar($nodo->esquerda, $valor);
				}

				if($valor > $nodo->valor){
					$this->percorrerBuscar($nodo->direita,$valor);
				}
			}else{
				echo "Arvore vazia ou objeto não encontrado";
			}
		}

		public function contarNos(){
			return $this->percorrerParaContar($this->raiz);
		}

		public function percorrerParaContar($nodo){
			if($nodo == null) return 0;
				return $this->percorrerParaContar($nodo->esquerda)+1
				+$this->percorrerParaContar($nodo->direita);
		}
	}
 ?>