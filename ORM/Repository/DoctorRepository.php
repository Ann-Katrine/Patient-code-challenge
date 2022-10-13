<?php 
    include_once("../Class/Db.php");
    include_once("../Class/Docter.php");

    class docterRepository{
        /*********************************/
        /*             GET               */     
        /*********************************/

        /*********************************/
        /*             POST              */     
        /*********************************/
        public function post($docter)
        {
            $db = new DB();

            $stmt = $db->conn->prepare("INSERT INTO docter(name, department) VALUES (?, ?)");

            $name = $docter->getName();
            $department = $docter->getDepartment();

            $stmt->bind_param("si", $name, $department);
            $stmt->execute();

            $result = $stmt->affected_rows;

            if($result === 1){
                
                return true;
            }
            else{

                return false;
            }

            $stmt->close();
            $stmt->conn->close();
        }

        /*********************************/
        /*              PUT              */
        /*********************************/

        /*********************************/
        /*              DELETE           */
        /*********************************/
    }
?>