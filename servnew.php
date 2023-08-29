
<?php
/**********************************************************************************/
function me($l)
	{
		
		$xml=simplexml_load_file("me.xml") or die("Error: Cannot create object");
		
		if ($l=="pt") { 
			echo '<h2 class="titulo" style="animation: de-baixo 0.5s;">Sobre mim</h2>';
		}
		else {
			echo '<h2 class="titulo" style="animation: de-baixo 0.5s;">About me</h2>';
		} 			
		
		
		
		echo '<div class="noticia" style="animation: de-baixo 1s;">';
		echo '<img class="imgnoticia" src=galeria\site\_MG_0483-Editar.jpg></img>' ;
		$i=0;
			
		foreach($xml->children() as $info) {
			if ($info['linguagem']==$l or $info['linguagem']=="both")	{
				if ($info['titulo']=="Sim") {
					echo '<p class="textonoticia"><h2>' . $info . '</h2></p>';
                }
				else {
					echo '<p class="textonoticia">' . $info . '</p>';
                }
			}
		}
		echo "</div>";
		mybag($l);
		
		
	}
	
/**********************************************************************************/
function educacao($l)
{
	
	$xml=simplexml_load_file("formacao.xml") or die("Error: Cannot create object");

/*
	echo '<div id="grid-educacao">';
		echo '<div id="grid-educacaomenu">menu</div>';
		echo '<div id="grid-educacaoconteudo">teste</div>';
	echo '</div>';		
*/
	
	echo '<div id="grid-educacao">';
		echo '<div id="grid-educacaomenu">';
			foreach($xml->children() as $info) {
				
				echo '<div class="educacaomenucatgoria"><h3><i class="' . $info['icon'] . '"></i> ' . $info['nome'] . '</h3></div>';
				
				foreach($info->children() as $infoitem) {
					echo '<div class="educacaomenuitem"><a id ="' . $infoitem['nome'] . '" onclick="clicarformacao(this.id)"><i class="' . $infoitem['icon'] . '"></i> ' . $infoitem['nome'] . '</a></div>';
				}
			}	
		
		echo '</div>';
		echo '<div id="grid-educacaoconteudo">teste</div>';
	echo '</div>';
}
/**********************************************************************************/
function formacao($assunto, $l)
{
	
	$xml=simplexml_load_file("formacao.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $categorias) {
		foreach($categorias->children() as $formacoes) {
				
			if ($l=="pt") { 
				$nomeutil=$formacoes['nome'];
			}
			else {
				$nomeutil=$formacoes['name'];
			}
			
			if ($assunto==$nomeutil) {
				echo '<h1>' . $nomeutil . '</h1>';
			
				foreach($formacoes->children() as $formacoesitem) {
					
					if ($formacoesitem->getName()=='texto') {
						
						if ($l==$formacoesitem['linguagem']) { 
							echo '<' . $formacoesitem[tipo] . ' class="textonoticia">' . $formacoesitem . '</' . $formacoesitem[tipo] . '></br>';
						}
					}
					else {
						echo '<div class="separador"></div>	<img src="' . $formacoesitem . '" style="display:inline-block; float:' . $formacoesitem[alinhado] . ';max-width: 50vh;max-height: 30vh;padding: 20px;page-break-before: always;">';
					}
					
				}	
			}	
					
		
		}
	}	
}
/**********************************************************************************/
function mybag($l)
	{
		
		
		$xml=simplexml_load_file("mybag.xml") or die("Error: Cannot create object");
		
		
		if ($l=="pt") { 
			echo '<h2 class="titulo" style="animation: de-baixo 0.5s;">Equipamento</h2>';
		}
		else {
			echo '<h2 class="titulo" style="animation: de-baixo 0.5s;">Equipment</h2>';
		} 	
		
		echo '<div id="noticias">';
		
		$atraso = 0.5;
		$Nova=yes;
		
		foreach($xml->children() as $info) {
			
			
			if ($info['linguagem']==$l or $info['linguagem']=="both")	{
				if ($info['titulo']=="Sim") {
			
					if ($Nova==no) {
						
						echo '</div>';
						
					}
			
					
					$atraso = $atraso + 0.5;
			
					echo '<div class="noticia" style="animation: de-baixo ' . $atraso . 's;">';
		
					$Nova=no;
			
					if ($info['fwasome']==null) {
						echo '<h3 class="titulonoticia">' . $info . '</h3>';
					}
					else {
						echo '<h3 class="titulonoticia"><i class="' . $info['fwasome'] . '"></i> ' . $info . '</h3>';
					}
                }
				else {
					if ($info['link']==null) {
						echo '<p class="textonoticia">' . $info . '</p>';
					}
					else {
						echo '<p><a target="_blank" href="' .  $info['link'] . '"><i class="fas fa-link" aria-hidden="true"></i> ' . $info . '</a></p>';
					}
                }
			}
		}
		echo "</div>";
		
	}
/**********************************************************************************/
function email($l)
	{


	
	
	if ($l=="pt")	{	
	
		echo '<h2 class="titulo" style="animation: de-baixo 2s;">Contactos</h2>';
		}
	else {
		
		echo '<h2 class="titulo" style="animation: de-baixo 2s;">Contacts</h2>';
		
	}
	
	echo '<div class="galeria">';
	
	echo '<div class="itemgaleria" style="animation: de-baixo 2.5s;"><h2><i class="far fa-envelope"></i></h2><p><a target="_blank" href="mailto:david@davidcphoto.com">david@davidcphoto.com</a></p></div>';
	echo '<div class="itemgaleria" style="animation: de-baixo 3s;"><h2><i class="fab fa-instagram"></i></h2><p><a target="_blank" href="https://www.instagram.com/davidcantophotography/">@davidcantophotography</a></p></div>';
	// echo '<div class="itemgaleria" style="animation: de-baixo 3.5s;"><h2><i class="fab fa-twitter"></i></h2><p><a target="_blank" href="https://twitter.com/Davidcantophoto">@Davidcantophoto</a></p></div>';
	echo '<div class="itemgaleria" style="animation: de-baixo 4s;"><h2><i class="fab fa-facebook-square"></i></h2><p><a target="_blank" href="https://www.facebook.com/DavidCantoPhotography/">David Canto Photography</a></p></div>';
	echo '<div class="itemgaleria" style="animation: de-baixo 4.5s;"><h2><i class="fab fa-facebook-square"></i></h2><p><a target="_blank" href="https://www.facebook.com/davidcantophoto/">Paisagens</a></p></div>';
	echo '<div class="itemgaleria" style="animation: de-baixo 5s;"><h2><i class="fab fa-facebook-square"></i></h2><p><a target="_blank" href="https://www.facebook.com/fotografiaconcertos">Fotografia de Concertos</a></p></div>';

	echo '</div>';
					
	}
	
	
/**********************************************************************************/
function accoes($l)
	{
		
		$xml=simplexml_load_file("downloads.xml") or die("Error: Cannot create object");
		
		$atraso=0;
		
		
	
		if ($l=="pt")	{	
			
			echo '<h2 class="titulo" style="animation: de-baixo 2s;">Acções para o Photoshop para Download</h2>';
		}
		else {
			
			echo '<h2 class="titulo" style="animation: de-baixo 2s;">Photoshop actions for Download</h2>';
			
		}

		echo '<div class="galeria">';
		
		foreach($xml->children() as $downloads) {
			
			if ($downloads['tipo']=="accoes") {
				
				if ($downloads['linguagem']==$l or $downloads['linguagem']=="both")	
					{		
					$i = ++$i;		
					$atraso=2+($i*(0.5/$i));
					echo '<div class="itemgaleria" style="animation: de-baixo ' . $atraso . 's;"><h2><i class="fas fa-play"></i></h2> ' . $downloads['nome'] . '<a target="_blank" href="' . $downloads['link'] . '"> Download</a></div>';
					
					}
				}
			}
		
		echo "</div>";
	}
	
/**********************************************************************************/
function news($l)
	{
		
		$xml=simplexml_load_file("news.xml") or die("Error: Cannot create object");
		
		
		if ($l=="pt") { 
			echo '<h2 class="titulo" style="animation: de-baixo 0.5s;">Noticias</h2>';
		}
		else {
			echo '<h2 class="titulo" style="animation: de-baixo 0.5s;">News</h2>';
		} 	
		
		echo '<div id="noticias">';
		
		$atraso = 0.5;
		
		foreach($xml->children() as $noticias) {
			
			$atraso = $atraso + 0.5;
			$i=$i+1;
			if ($i>10) {break;} 
			
			echo '<div class="noticia" style="animation: de-baixo ' . $atraso . 's;">';
			echo '<h3 class="titulonoticia">' . $noticias["pt"] . '</h3>';
			echo '<p class="datanoticia">' . $noticias["data"] . '</p>';
			
			$foto = $noticias['imagem'];
			
			if ($foto != '') {
				echo '<img class="imgnoticia" src=' . $foto . '></img>' ;
			}
			
			foreach($noticias->children() as $text) {
				if ($text["linguagem"]==$l)	{
					if ($text['link']==null) {
						echo '<p class="textonoticia">' . $text . '</p>';
					}
					else {
						echo '<p><a target="_blank" href="' . $text['link'] . '"><i class="' . $text['fwasome'] . '" aria-hidden="true"></i> ' . $text . '</a></p>';
					}
						
				}
					
			}
			echo '</div>';
		}
		echo '</div>';

	}
/**********************************************************************************/
function galerias($galeria, $linguagem)
	{
		$xml=simplexml_load_file("catalgo.xml") or die("Error: Cannot create object");

		
		$i=0;
		$atraso=2;
		$nomegaleria="Galeria";
		
		if ($linguagem=="pt") { 
			switch ($galeria)
				{
				case "paisagens":
					$nomegaleria = "Fotografia de Paisagens";
					break;
				case "concertos":
					$nomegaleria = "Fotografia de Concertos";
					break;
				case "producto":
					$nomegaleria = "Fotografia de Produto";
					break;
				case"halloween":
					$nomegaleria = "Retratos de Halloween";
					break;
				}
		} else {
			
			switch ($galeria)
				{
				case "paisagens":
					$nomegaleria = "Landscape Photograhy";
					break;
				case "concertos":
					$nomegaleria = "Concert Photography";
					break;
				case "producto":
					$nomegaleria = "Product Photography";
					break;
				case"halloween":
					$nomegaleria = "Helloween Portraits";
					break;
				}
		} 	


		
		
						
		echo '<h2 class="titulo" style="animation: de-baixo 2s;">' . $nomegaleria . '</h2>';
		echo '<div class="galeria">';
				
		foreach($xml->children() as $childgaleria) {
			
			if ($childgaleria["tipo"]==$galeria) {
				
				$foto = $childgaleria->img;
				if ($linguagem == 'pt') {
					$nome = $childgaleria->info->infobasica->nome;
					$desc = $childgaleria->info->infobasica->desc;
				}
				else {
					$nome = $childgaleria->info->basicinfo->nome;
					$desc = $childgaleria->info->basicinfo->desc;
				}
				
				
				$camera = $childgaleria->info->exif->camera;
				$lente = $childgaleria->info->exif->lente;
				$distancia = $childgaleria->info->exif->distancia;
				$abertura = $childgaleria->info->exif->abertura;
				$esposicao = $childgaleria->info->exif->esposicao;
				$iso = $childgaleria->info->exif->ISO;		
				$referencia = $childgaleria->ref;
				$prints = $childgaleria->prints;
				
				
				$atraso=$atraso+(1/$i);

				echo '<div class="itemgaleria" style="animation: de-baixo ' . $atraso . 's;">';
				echo '	<img id="galeria' . $i . '" class="imggaleria" onclick="clicaritem(this);" src="' . $foto . '">';
				echo '  <div class="infoescondida">';
				echo '		<div class="nome">' . $nome . '</div>';
				echo '		<div class="descricao">' . $desc . '</div>';
				echo '		<div class="exif"><h2>exif:</h2>';
				echo '			<div class="camera"><i class="fas fa-camera"></i> ' . $camera . '</div>';
				echo '			<div class="lente"><i class="fas fa-ring"></i> ' . $lente . '</div>';
				echo '			<div class="abertura"><i class="fas fa-dot-circle"></i> ' . $abertura . '</div>';
				echo '			<div class="esposicao"><i class="fas fa-stopwatch"></i> ' . $esposicao . '</div>';
				echo '			<div class="distancia"><i class="fas fa-ruler"></i> ' . $distancia . '</div>';
				echo '			<div class="iso"><i class="fas fa-chart-line"></i> ' . $iso . '</div>';
				echo '  	</div>';
				
				if (!empty($prints)) {
					if ($linguagem == 'pt') {
						echo '		<div class="prints"><p>Para comprar uma impressão envie a referencia ' . $referencia . ' e o tamanho desejado para o email <a href="david@davidcphoto.com">david@davidcphoto.com</a>.</p>';
					} else {
						echo '		<div class="prints"><p>To buy a print email me at <a href="david@davidcphoto.com">david@davidcphoto.com</a> with the refence ' . $referencia . ' and the desired size.</p>';
						
					}
					
					echo '				<table border="1">';
					echo '					<tr>';
					echo '						<th><i class="fas fa-expand"></i></th>';
					echo '						<th><i class="fas fa-scroll"></i></th>';
					echo '						<th><i class="fas fa-euro-sign"></i></th>';
					echo '					</tr>';
					
					
					foreach($childgaleria->prints->children() as $print) {
						
						$tamanho = $print->tamanho;
						$papel = $print->papel;
						$preco = $print->preco;
					
						echo '					<tr>';
						echo '						<th>' . $tamanho . '</th>';
						echo '						<th>' . $papel . '</th>';
						echo '						<th>' . $preco . '</th>';
						echo '					</tr>';
					
					}
					echo '				</table>';
					echo '  	</div>';
					
					} 
					
				echo '  </div>';
				echo '</div>';
					
				
				$i = ++$i;
			}
		}
		echo '</div>';
		
				
			
	}
/*************************************************************************************/
$tab=$_REQUEST["q"]; 
$linguagem=substr($_REQUEST["linguagem"], 0, 2); 

if (strpos($linguagem, "pt")) {
	$lang="en";
	}
else {
	$lang="pt";
	}
switch ($tab)
	{
	case "mneu":
		me($lang);
		break;
	case "mnnoticias":
		news($lang);
		break;
	case "mncontactos":
		email($lang);
		break;
	case "mnequipamento":
		mybag($lang);
		break;
	case "educacao":
		educacao($lang);
		break;
	case "formacao":
		$formacao=$_REQUEST["formacao"]; ;
		formacao($formacao, $lang);
		break;
	case "mnaccoes":
		accoes($lang);
		break;				
	case "paisagens" || "concertos" || "producto" || "halloween":
		galerias($tab, $lang);
		break;
	default:
		if ($lang=='pt') {
			print "<p><h2>" . $tab . " opção invalida</h2></p>";
		}
		else {
			print "<p><h2>" . $tab . " invalid option</h2></p>";
		}
	}

?>