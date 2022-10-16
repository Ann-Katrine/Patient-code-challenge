<?php 
    include_once("../ORM/Class/Db.php");
    include_once("../ORM/Class/MedicalJournal.php");

    class medicalJournalRepository{
        /*********************************/
        /*             GET               */     
        /*********************************/
        public function getPatiantByIdAndDocter($patiantId, $doctorId)
        {
            $db = new DB();
            $finish = array();

            $stmt = $db->conn->prepare("SELECT medicaljournal.name AS name FROM medicaljournal
                                        INNER JOIN admission ON admission.medicalJournal = medicaljournal.id
                                        INNER JOIN docter_has_admission ON docter_has_admission.admissionId = admission.id
                                        INNER JOIN docter ON docter.id = docter_has_admission.docterId
                                        WHERE docter.id = ? AND medicaljournal.id = ?");
            
            $stmt->bind_param("ii", $doctorId, $patiantId);
            $stmt->execute();

            $result = $stmt->get_result();

            if($result != false && $result->num_rows > 0){

                $patiant = array();
                while ($row = $result->fetch_object()) {
                    $patiant[] = new MedicalJournal(null, $row->name, null);
                }

                array_push($finish, true, $patiant);
            }
            else{
                array_push($finish, false);
            }

            return $finish;
            $stmt->close();
            $db->conn->close();
            
        }

        public function getAllPatiantFromDepartmentWithId($id)
        {
            $db = new DB();
            $finish = array();

            $stmt = $db->conn->prepare("SELECT medicaljournal.id AS id, medicaljournal.name AS name, medicaljournal.socialSecurityNumber AS cpr FROM department
                                        INNER JOIN admission ON admission.department = department.id
                                        INNER JOIN medicaljournal ON medicaljournal.id = admission.medicalJournal
                                        WHERE department.id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();

            if($result != false && $result->num_rows > 0){

                $person = array();
                while ($row = $result->fetch_object()) {
                    $person[] = new MedicalJournal($row->id, $row->name, $row->cpr);
                }

                array_push($finish, true, $person);
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
        public function postMedicalJournal($patiant)
        {
            $db = new DB();
            
            $stmt = $db->conn->prepare("INSERT INTO medicaljournal(name, socialSecurityNumber) VALUES (?, ?)");

            $name = $patiant->getName();
            $socialSecurityNumber = $patiant->getSocialSecurityNumber();

            $stmt->bind_param("si", $name, $socialSecurityNumber);
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