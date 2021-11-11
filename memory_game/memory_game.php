<?php	
	session_start();
	include ("conexion.php"); 
	
	if ( isset($_REQUEST["won"]) ){	
		unset($_SESSION['board']);
		$_SESSION['games_won'] = ++$_SESSION['games_won'];	
		$var_user =  $_SESSION['user']; 
     	$var_level = $_REQUEST['level'];
    	$var_games = $_SESSION['games_won'];
		
	    $consulta="insert into memoria_score(user, nivel, juegos_finalizados) VALUES('$var_user','$var_level','$var_games')";
     	$result=mysqli_query($conn,$consulta);
		
		$response = array("status" => "ok");		
		exit(json_encode($response));		
	}

	
	$CARDS = array("images/image0001.png",
					"images/image0002.png","images/image0003.png",
					"images/image0004.png","images/image0005.png",
					"images/image0006.png","images/image0007.png",
					"images/image0008.png","images/image0009.png",
					"images/image0010.png","images/image0011.png",
					"images/image0012.png","images/image0013.png",
					"images/image0014.png","images/image0015.png",
					"images/image0016.png","images/image0017.png",
					"images/image0018.png","images/image0019.png",
					"images/image0020.png");
	
	class Board
	{
		private $css = array();  //imagenes para las cartas 
		private $cards = array();  // almacenar las cartas
		private $cards_names = array();
		private $cols = 0;
		private $rows = 0;
		private $modes = array(6, 8, 10, 12, 15, 18); //Dificultades 
		
		function __construct($level, $card_files) {
			$num_of_cards = $this->modes[$level - 1];
			
			// Cambiar posicion de cartas 
			// 
			shuffle($card_files);
			// burbuja: Arreglar las cartas
			$cards = array();
			for ( $i = 0; $i < $num_of_cards; ++$i ){
				$cards[$i] = new Card($card_files[$i]);
				$this->css[] = $cards[$i]->get_css_block();
			}
			// Doblar el arreglo para tener un par en caso de aumentar la dificultad
			$this->cards = array_merge($cards, $cards);
			
			// Cambiar posicion en caso de que intente transposicionarse
			shuffle($this->cards);
			
			// Obtener: Columnas 
			$num = count($this->cards);
			$sr = sqrt($num);
			$this->rows = floor($sr);
			while ( $num % $this->rows ){
				--$this->rows;
			}
			$this->cols = $num / $this->rows;
		}
		
		function max_level(){
			return count($this->modes);
		}
		
		function get_css(){
			return implode("\n",$this->css);
		}
		
		function debug_print(){
			$p_rslt = array("cards"=>$this->cards, "rows"=>$this->rows, "cols"=>$this->cols);
			print "<br/ >".json_encode($p_rslt);
		}
		
		function get_rows(){
			return $this->rows;
		}
		
		function get_cols(){
			return $this->cols;
		}
		
		function get_cards(){
			return $this->cards;
		}
		
		
		function get_size(){
			return count($this->cards);
		}
		
		function get_card($index){
			return $this->cards[$index];
		}
		
		function get_html(){
			// 4 each cartas
			for ( $i = 0 ; $i < $this->get_size() ; ++$i ){
				
				if ( ($i % $this->get_cols()) == 0 ){
					print "\r<div class=\"clear\"></div>";
				}
				print $this->get_card($i)->get_html_block();
			}
		}
	}

	class Card{	
		private $css_class = "";
		private $url = "";
		
		function __construct($url) {
			$this->url = $url;
			$this->css_class = $this->extract_name($url);
		}
		
		function get_name(){
			return $this->css_class;
		}
		
		function get_css_block(){
			return "\n.".$this->get_name()."{background:url(".$this->url.") center center no-repeat;}";
		}
		
		function get_html_simple_block(){
			return "\r<div class=\"card {toggle:'".$this->get_name()."'}\"></div>";
		}
		
		function get_html_block(){
			return "\r<div class=\"card {toggle:'".$this->get_name()."'}\">
						\r<div class=\"off\"></div>
						\r<div class=\"on\"></div>
					</div>";
		}
		private function extract_name($str){
			$tmp = pathinfo($str);
			return $tmp['filename'];
		}
	}

	$level = 1;

	

	if (!isset($_SESSION['games_won'])) {  //Sesion aumenta +1 si gana

		$_SESSION['games_won'] = 0;	
	}
	
	if (isset($_REQUEST['level']) ) {  //Obtenida de js 
		$level = $_REQUEST['level']; 
		
		$board = new Board($level, $CARDS);
		$_SESSION['board'] = $board;
	} else {
		if (!isset($_SESSION['board'])) {
			$board = new Board($level, $CARDS);
			$_SESSION['board'] = $board;
		} else {
			$board = $_SESSION['board'];
		}
	}
	
	   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	
	<title>Memorizando</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" href="memory_game.css" type="text/css" />
 
  <!-- Vendor -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!-- CSS  -->
   <link href="../assets/css/landing_page.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- script -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.metadata.js"></script>
	<script type="text/javascript" src="jquery.quickflip.js"></script>
	<script type="text/javascript" src="memory_game.js"></script>
	<script type="text/javascript" src="swfobject.js"></script>
    <script type="text/javascript">
	var flashvars = false;
	var attributes = {};
	var params = {
	  allowscriptaccess : "always",
	  wmode : "transparent",
	  menu: "false"
	};
	swfobject.embedSWF("sfx.swf", "sfx_movie", "1", "1", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
   </script>
</head>
<style>

	<?php 
		print $board->get_css();
	?>
</style>
<body style="background-color:rgba(25, 25, 25, 0.95);">

 <!-- ======= Top  ======= -->
 <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center"> 
      </div>
      <div class="social-links d-none d-md-block"> 
      </div>
    </div>
  </section>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="../menu.php"> Bienvenido/a:   <?php echo $_SESSION['user']; ?> </a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../menu.php">Pagina principal</a></li> 
          <li><a class="nav-link scrollto active" href="memory_game.php">Memorizando</a></li>
          <li><a class="nav-link scrollto" href="../camino.php">Camino Sin fin</a></li>
        
      </nav>  
	  <a href="logout.php">
          <button type="button" class="btn btn-outline-danger btn-lg btn3d"><span ></span> Cerrar sesión</button>
    </a>
    </div>
  </header> 
<div id="sfx_movie"></div><br><br>


<!-- ======= TABLA ======= -->
<div id="control" style="width:<?php print $board->get_cols()*75; ?>px;">
	<label class="text-white">Nivel:</label>
	<select id="level_chooser">
		<?php 
			print "<!-- ".$board->max_level()." -->";
			for ( $i = 0; $i < $board->max_level(); ++$i ){
					$selected = ( ($i+1) == $level ) ? " selected=selected" : "";
					print "\r<option value=\"".($i+1)."\"".$selected.">".($i+1)."</option>";
			}
		?>
	</select>
	<label class="text-white">victorias: </label>
	<span class="text-white"><?php print $_SESSION["games_won"]; ?></span>
	<label class="text-white">Movimientos:</label>
	<span class="text-white" id="num_of_moves">0</span> 

</div> <br/>
<div id="game_board" style="width:<?php print $board->get_cols()*75; ?>px;">
<?php
	print $board->get_html();
	
?>


<!-- ======= Victoria ======= -->
</div>
<div id="player_won"></div>
<div  id="start_again"><a id="again" href="#">volver a jugar</a>
</div>
<div id="sfx_movie"> </div>


<!-- ======= Score ======= -->
<div class="container">
<h2 class="text-center text-light">Puntuación personal</h2> <br/>
<div class="table-responsive">
                    <table class="table">
                      <thead class=" text-light">
                        <th>
                          Usuario
                        </th>
                        <th>
                          Nivel
                        </th>
                        <th>
                          Juegos finalizados
                        </th>             
                        <th>
                          ACCIONES
                        </th>
                      </thead>
                      <tbody class= "text-light">
                      <?php 
					     $var_usuario = $_SESSION['user']; 
                         include ("conexion.php");
                         $consulta="SELECT * FROM memoria_score where user='$var_usuario'";
                         $result=mysqli_query($conn,$consulta);
                          while($fila=$result->fetch_assoc()){
                            echo "<tr>";                          
                            echo "<td>"; echo $fila['user']; echo"</td>";
                            echo "<td>"; echo $fila['nivel']; echo"</td>";
                            echo "<td>"; echo $fila['juegos_finalizados']; echo"</td>";
                            echo "<td>"; echo"<a href='./eliminar.php?data=".$fila['idmemoria_score']."'> <buttontype='button' class='btn btn-danger'>borrar score</button>"; echo"</td>";                                 
                            echo "</tr>";
                           }
                         ?>
                      </tbody>
                    </table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

