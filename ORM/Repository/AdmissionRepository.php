<?php 
    include_once("../Class/Db.php");
    include_once("../Class/Admission.php");

    class admissionRepository{
        /*********************************/
        /*             GET               */     
        /*********************************/

        /*********************************/
        /*             POST              */     
        /*********************************/
        public function postAdmission($admission)
        {
            $db = new DB();
            $finish = array();

            $stmt = $db->conn->prepare("INSERT INTO admission(medicalJournal, department) VALUES (?, ?)");

            $medicalJournal = $admission->getMedicalJournal();
            $department = $admission->getDepartment();

            $stmt->bind_param('ii', $medicalJournal, $department);
            $stmt->execute();

            $result = $stmt->affected_rows;

            if($result === 1){

                $id = $db->conn->insert_id;
                array_push($finish, true, $id);
                return $finish;
            }
            else{

                array_push($finish, false);
                return $finish;
            }

            $stmt->close();
            $db->conn->close();
        }

        public function postDocterAdmission($admissionId, $docterId)
        {
            $db = new DB();

            $stmt = $db->conn->prepare("INSERT INTO docter_has_admission(docterId, admissionId) VALUES (?, ?)");

            $stmt->bind_result("ii", $admissionId, $docterId);
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