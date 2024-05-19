<?php
    class BBDD {
        private $servidor; // Dirección del servidor de la base de datos
        private $user; // Nombre de usuario para la conexión a la base de datos
        private $pass; // Contraseña para la conexión a la base de datos
        private $base_datos; // Nombre de la base de datos a la que se conectará
        private $puerto; // Puerto para la conexión a la base de datos
        private $socket; // Socket para la conexión a la base de datos
        public $descriptor; // Descriptor de nuestra conexión a la base de datos
        private $resultado; // Resultado de la última consulta

        // Constructor que establece la conexión a la base de datos al instanciar el objeto
        function __construct($servidor, $user, $pass, $base_datos, $puerto, $socket) {
            $this->servidor = $servidor;
            $this->user = $user;
            $this->pass = $pass;
            $this->base_datos = $base_datos;
            $this->puerto = $puerto;
            $this->socket = $socket;

            // Establecemos la conexión y guardamos el descriptor en $this->descriptor
            $this->descriptor = mysqli_connect($this->servidor, $this->user, $this->pass, $this->base_datos, $this->puerto, $this->socket);
        }
        // Método para ejecutar consultas SQL
        public function consulta($consulta) {
            $this->resultado = mysqli_query($this->descriptor, $consulta);
        }
        // Método para extraer un registro del resultado de la consulta
        public function extraer_registro(){
            if ($fila =  mysqli_fetch_array($this->resultado, MYSQLI_ASSOC)) {
                return $fila;
            } else {
                return false; // Devolvemos false si no hay más registros
            }
        }
        // Método para obtener el número de filas en el resultado de la consulta
        public function numero_filas() {
            return mysqli_num_rows($this->resultado);
        }
        // Método para obtener el número de filas afectadas por la última consulta
        public function filas_afectadas() {
            return mysqli_affected_rows($this->descriptor);
        }
    }

    // Parámetros de conexión a la base de datos
    $host="";
    $user="";
    $password="";
    $dbname="";
    $port=;
    $socket="";

    // Instanciamos un objeto de la clase BBDD para establecer nuestra conexión a la base de datos
    $MyBBDD = new BBDD($host, $user, $password, $dbname, $port, $socket);
?>