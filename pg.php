<?php 

class Pg{

	public $dbconn;
	public $result;

	public function __construct(){
		$this->dbconn = pg_connect("host=172.16.0.26 port=5432 dbname=registro-documentos user=postgres password=jakeli");
	}
	public function query($query){
		$this->result= pg_query($this->dbconn,$query);
		return $this->result;
	}
	public function getFetchObject(){
		while ($fila = pg_fetch_object($this->result)) {
			$filas[]=$fila;
		}
		return $filas;
	}
	public function getFetchAssoc(){
		while ($fila = pg_fetch_assoc($this->result)) {
			$filas[]=$fila;
		}
		//pre($filas);
		return $filas;
	}
	public function getKeys($array){
		return array_keys($array);
	}
}

class Documento extends Pg{

	public $codDocumento;
    public $de;
    public $parapersona;
    public $para;
    public $degerencia;
    public $asunto;
    public $fecha;
    public $saludo;
    public $contenido;
    public $tipodocumento;

	public function __construct(){
		parent::__construct();
	}
	public function initializeByPost(){
		$vars_clase = get_class_vars(get_class($this));
		foreach ($vars_clase as $nombre => $valor) {
			if ($nombre != "dbconn") {
		    	$this->$nombre = $_POST[$nombre];
			}
		}

	}
	public function procesarContenido(){
		$this->contenido = htmlentities($this->contenido);
	}
	public function save($json = null){
		$this->procesarContenido();
		$query = "INSERT INTO documento (codocumento,de,parapersona,para,degerencia,asunto,fecha,saludo,contenido,tipodocumento) VALUES 
					('{$this->codDocumento}','{$this->de}','{$this->parapersona}','{$this->para}','{$this->degerencia}','{$this->asunto}','{$this->fecha}'
						,'{$this->saludo}','{$this->contenido}','{$this->tipodocumento}')";
		
		if($this->query($query)){
			if ($json) {
				return json_encode(array("correcto"=>true));
			}
			return true;
		}else{
			if ($json) {
				return json_encode(array("correcto"=>pg_last_error($this->dbconn)));
			}
			return pg_last_error($this->dbconn);
		}
	}
	public function get(){
		$query = "SELECT * from documento order by id desc group by tipodocumento";
		$this->query($query);
		return $this->getFetchObject();
	}
	public function getCantidadDocumento(){
		$query = "select distinct on (tipodocumento) count(tipodocumento) as cuentatipodocumento,tipodocumento from documento group by tipodocumento";
		$this->query($query);
		return $this->getFetchObject();
	}
	public function getAsuntosDeDocumentos(){
		$query = "select distinct on (asunto) count(asunto) as cuentaasunto,asunto from documento group by asunto";
		$this->query($query);
		return $this->getFetchObject();
	}
	public function getDeDeDocumentos(){
		$query = "select distinct on (de) count(de) as cuentade,de from documento group by de";
		$this->query($query);
		return $this->getFetchObject();
	}
	public function buscar(){
		if (isset($_GET['busqueda'])) {
			$query = "select codocumento as \"Cod.Doc\",
							 de as De,
							 para as Para,
							 degerencia as DeGerencia,
							 asunto as Asunto,
							 fecha,
							 saludo,
							 contenido,
							 tipodocumento as \"Tipo de Doc\" 
					  from documento where 1=1 ";
			if (isset($_GET['tipodocumento']) and $_GET['tipodocumento']) {
				//die("as");
				$query.="and tipodocumento = '".$_GET['tipodocumento']."' ";
			}
			if (isset($_GET['asunto']) and $_GET['asunto']) {
				$query.="and asunto = '".$_GET['asunto']."' ";
			}
			if (isset($_GET['de']) and $_GET['de']) {
				$query.="and de = '".$_GET['de']."' ";
			}
			//echo $query;
			$this->query($query);

			return $this->getFetchAssoc();
		}
	}

}

class Formato extends Pg{
	public $referencia;
    public $de;
    public $parapersona;
    public $para;
    public $degerencia;
    public $asunto;
    public $fecha;
    public $saludo;
    public $contenido;
    public $tipodocumento;
    public function __construct(){
		parent::__construct();
	}
	public function initializeByPost(){
		$vars_clase = get_class_vars(get_class($this));
		foreach ($vars_clase as $nombre => $valor) {
			if ($nombre != "dbconn") {
		    	$this->$nombre = $_POST[$nombre];
			}
		}

	}
    public function procesarContenido(){
		$this->contenido = htmlentities($this->contenido);
		$this->contenido = str_replace("(", "[", $this->contenido);
		$this->contenido = str_replace(")", "]", $this->contenido);
	}
	public function save($json = null){
		$this->procesarContenido();
		$query = "INSERT INTO formato (referencia,de,parapersona,para,degerencia,asunto,fecha,saludo,contenido,tipodocumento) VALUES 
					('{$this->referencia}','{$this->de}','{$this->parapersona}','{$this->para}','{$this->degerencia}','{$this->asunto}','{$this->fecha}'
						,'{$this->saludo}','{$this->contenido}','{$this->tipodocumento}')";
		
		if($this->query($query)){
			if ($json) {
				return json_encode(array("correcto"=>true));
			}
			return true;
		}else{
			if ($json) {
				return json_encode(array("correcto"=>pg_last_error($this->dbconn)));
			}
			return pg_last_error($this->dbconn);
		}
	}
	public function get($id = null){
		if ($id) {
			$query = "SELECT * from formato where id='$id' order by fecha_sistema";
		}else{
			$query = "SELECT * from formato order by fecha_sistema";
		}
		$this->query($query);
		return $this->getFetchObject();
	}
	public function getComboFormatos(){
		$data = $this->get();
		$select = "<select name='formatos' onchange=\"javascript:location.href='?formato='+this.value\" id='formatos'>";
			$select.="<option value=''>Elegir Formato</option>";
		foreach ($data as $key => $value) {
			$select.="<option value=\"{$value->id}\">$value->referencia</option>";
		}
		return $select.="</select>";
	}
}
?>
