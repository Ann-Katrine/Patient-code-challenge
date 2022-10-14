<?php 
    include_once("../Class/Db.php");
    include_once("../Class/Docter.php");

    class docterRepository{
        /*********************************/
        /*             GET               */     
        /*********************************/
        public function getAllDocterTooPatiantsWithId($name)
        {
            $db = new DB();
            $finish = array();

            $stmt = $db->conn->prepare("SELECT docter.name AS name FROM docter
                                        INNER JOIN docter_has_admission ON docter_has_admission.docterId = docter.id
                                        INNER JOIN admission ON admission.id = docter_has_admission.admissionId
                                        INNER JOIN medicaljournal ON medicaljournal.id = admission.medicalJournal
                                        WHERE medicaljournal.name = ?");
            $stmt->bind_param("s", $name);
            $stmt->execute();

            $result = $stmt->get_result();

            if($result != false && $result->num_rows > 0){
                
                $patiant = array();
                while($row = $result->fetch_object()){
                    $patiant[] = new Docter(null, $row->name, null);
                }

                array_push($finish, true, $patiant);
                return $finish;
            }
            else{

                array_push($finish, false);
                return $finish;
            }

            $stmt->close();
            $db->conn->close();
        }

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
            $db->conn->close();
        }

        /*********************************/
        /*              PUT              */
        /*********************************/

        /*********************************/
        /*              DELETE           */
        /*********************************/
    }
?>