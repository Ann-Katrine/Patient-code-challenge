<?php 
    include_once("../Class/Db.php");
    include_once("../Class/MedicalJournal.php");

    class medicalJournalRepository{
        /*********************************/
        /*             GET               */     
        /*********************************/
        public function getAllPatiantByIdAndDocter($patiantId, $doctorId)
        {
            $db = new DB();
            $finish = array();

            $stmt = $db->conn->prepare("Select medicalJournal.name AS name FROM docter
                                        INNER JOIN docter_has_admission ON docter_has_admission.docterId = docter.id
                                        INNER JOIN admission ON admission.id = docter_has_admission.admissionId
                                        INNER JOIN medicalJournal ON medicalJournal.id = admission.medicalJournal
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
            $stmt->conn->close();
            
        }

        /*********************************/
        /*             POST              */     
        /*********************************/

        /*********************************/
        /*              PUT              */
        /*********************************/

        /*********************************/
        /*              DELETE           */
        /*********************************/
    }
?>