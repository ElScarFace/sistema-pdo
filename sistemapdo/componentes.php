<?php
/**
	 * 
	 */
	class Conexion
	{
		public $Servidor;
		public $BaseDatos;
		public $Usuario;
		public $Password;

		public $Respuesta;


		function __construct($srv, $bd, $user, $pass)
		{
			$this->Servidor=$srv;
			$this->BaseDatos=$bd;
			$this->Usuario = $user;
			$this->Password=$pass;
		}

		public function Conectar(){

			$cn = new PDO("mysql:host=".$this->Servidor."; dbname=".$this->BaseDatos,$this->Usuario,$this->Password);
			$this->Respuesta = True;
			return $cn;
		}
	}

	class Producto
	{
		// Campos de la clase son los mismos campos de la tabla
		// que representa
		public $Codigo;
		public $Nombre;
		public $Descripcion;
		public $Precio;
		public $Imagen;

		/* Añadir campos funcionales o estados*/

		public $Pdo; // Almacenará el Objeto de conexion PDO
		public $Estado; // Almacenará (True o False) el el resultado del proceso CRUD
		public $Message;  // Almacena un mensaje segun el estado del porceso CRUD
		public $Listado; // Se crea para el metodo Vistai()
		
		function __construct()
		{
			# code...
		}

		// Metodos CRUD: Create Read UpDate Delete

		public function Create($objPDO){
			// Ejecutar el Procedimiento Almacenado sp_Create

			/* 1. Generar una conexion PDO a la base de datos Sistema*/
			/* 2. Los valores de los Parametros de entrada de sp_Create: Son los campos de la clase*/
			
			$objPDOStm=$objPDO->prepare("call sp_Create(:dato1, :dato2, :dato3, :dato4, :dato5)");
			$objPDOStm->bindParam(':dato1', $this->Codigo);
			$objPDOStm->bindParam(':dato2', $this->Nombre);
			$objPDOStm->bindParam(':dato3', $this->Descripcion);
			$objPDOStm->bindParam(':dato4', $this->Precio);
			$objPDOStm->bindParam(':dato5', $this->Imagen);

			$objPDOStm->execute();
		}
		// Metodo Create mejorado
		public function Createi(){
			// Usar el campo Pdo de la clase Producto como Objeto de Conexion PDO
			$objPDOStm=$this->Pdo->prepare("call sp_Create(:dato1, :dato2, :dato3, :dato4, :dato5)");
			$objPDOStm->bindParam(':dato1', $this->Codigo);
			$objPDOStm->bindParam(':dato2', $this->Nombre);
			$objPDOStm->bindParam(':dato3', $this->Descripcion);
			$objPDOStm->bindParam(':dato4', $this->Precio);
			$objPDOStm->bindParam(':dato5', $this->Imagen);
			// Cuando se ejecuta el metodo execute devuelve True o False (True si se ejecuto el sp corectamente)
			// EL resutado del metodo execute() se almacena en el campo Estado de la clase producto
			$this->Estado = $objPDOStm->execute();

			if ($this->Estado) {
				$this->Message = "Registro guardado";
			}else{
				$this->Message = "El Registro no se guardo";
			}

		}

		public function Vista(){
			$stmPdo = $this->Pdo->prepare("call sp_Vista()");
			$stmPdo->execute();
			// Que al ejecutar sp_Vista se optiene todos los registros de la tabla Productos
			// Por tanto se deben almacenar dichos registros en una variable
			$lista = $stmPdo->FetchAll(PDO::FETCH_OBJ);
			// ¿Como pasamos esta informacion a la aplicacion?
			// Haciendo return
			return $lista;
		}

		public function Vistai(){
			$stmPdo = $this->Pdo->prepare("call sp_Vista()");
			$stmPdo->execute();
			$lista = $stmPdo->FetchAll(PDO::FETCH_OBJ);
			// ¿Como pasamos esta informacion a la aplicacion?
			// Almacenando la informacion en una campo
			$this->Listado = $lista;
		}
	public function Delete($nro){
			$stmPdo = $this->Pdo->prepare("call sp_Delete(:dato)");
			$stmPdo->bindParam(':dato', $nro);
			$r = $stmPdo->execute();
			$this->Estado = $r;
		}

	}

?>











