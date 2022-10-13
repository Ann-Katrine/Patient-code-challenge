<?php 
    class DB{
        /*********************************/
        /*          Properties           */     
        /*********************************/
        public $conn;
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "codechallenges";

        /*********************************/
        /*          Construter           */     
        /*********************************/
        function __construct()
        {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

            if($this->conn->connect_errno != ""){
                echo '<h1>'.$this->conn->connect_error.'</h1>';
                die('Der er ikke forbindelse til databasen');
            }
            else{
                $this->conn->set_charset('UTF8');
            }
        }
    }
?>