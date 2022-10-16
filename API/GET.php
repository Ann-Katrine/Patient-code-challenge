<?php
    // gør at man for alle fejl frem 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./validering.php");
    include_once("../ORM/Repository/AdmissionRepository.php");
    include_once("../ORM/Repository/DepartmentRepository.php");
    include_once("../ORM/Repository/DoctorRepository.php");
    include_once("../ORM/Repository/medicalJournalRepository.php");

    class GET{
        private $id = 0;
        private $uriArray = array();
        private $countUri;
        private $arrayVali = array();

        public function findRoute($uri, $headers)
        {
            
            if(in_array("application/json", $headers)){

                $this->uriArray = $uri;
                $this->countUri = count($this->uriArray);
                
                switch ($uri[1]) {
                    case 'admission':
                        $this->admissionRoute($uri);
                        break;
                    case 'docter':
                        $result = $this->docterRoute($uri);
                        return $result;
                        break;
                    case 'department':
                        $this->departmentRoute($uri);
                        break;
                    case 'medical-journal':
                        $this->medicalJournal($uri);
                        break;
                    default:
                        http_response_code(400);
                        die("400 - bad request method!");
                        break;
                }
            }
            else{
                http_response_code(412);
				die('412 - Wrong Accept type. Only JSON supported!');
            }
        }

        private function admissionRoute($uri)
        {
            # code...
        }

        private function docterRoute($uri)
        {
            $docter = new docterRepository();
            $vali = new Validering();
            $finish = array();
            
            if($this->countUri === 2){
                // Bruger til at vise all fra docter
            }
            else if($this->countUri > 2){

                $this->arrayVali = [];
                array_push($this->arrayVali, $uri[2]);
                $result = $vali->isNumeric($this->arrayVali);
                if($result === true){
                    // Til hvis man kun skal have en admission frem                     
                }
                else{
                    
                    if($uri[2] == "all-docter-too-patiant-with-name"){

                        $this->arrayVali = [];
                        array_push($this->arrayVali, $uri[3]);
                        $result = $vali->isNumeric($this->arrayVali);

                        if($result === true){

                            $result = $docter->getAllDocterTooPatiantsWithId($uri[3]);
                            if($result[0] === true){

                                $antal = count($result[1]);
                                for ($i = 0; $i < $antal; $i++) { 
                                    
                                    $getResult = $result[1][$i];
                                    $finish[] = $getResult->getName();
                                }

                                http_response_code(200);
                                echo json_encode($finish);
                            }
                            else{
                                
                                http_response_code(404);
                                die("Der blev ikke fundet nogen dokter.");
                            }
                        }
                        else{
                            http_response_code(400);
                            die("400 - bad request method!");
                        }
                    }
                    else if($uri[2] == "all-docter-from-department-with-id"){

                        $this->arrayVali = [];
                        array_push($this->arrayVali, $uri[3]);
                        $result = $vali->isNumeric($this->arrayVali);
                        if($result === true){

                            $id = intval($uri[3]);
                            $result = $docter->getAllDocterFromdepartmentWithId($id);
                            if($result[0] === true){
                                
                                $antal = count($result[1]);
                                for ($i = 0; $i < $antal; $i++) { 
                                    
                                    $getResult = $result[1][$i];
                                    $finish[] = $getResult->getDocter();
                                }

                                http_response_code(200);
                                echo json_encode($finish);
                            }
                            else{
                                
                                http_response_code(404);
                                die("Der blev ikke fundet nogen dokter.");
                            }
                        } 
                        else{
                            
                            http_response_code(400);
                            die("400 - bad request method!");
                        }
                    }
                    else if($uri[2] == "docter-in-department"){

                        $this->arrayVali = [];
                        array_push($this->arrayVali, $uri[3]);
                        $result = $vali->isNumeric($this->arrayVali);
                        if($result === true){

                            $result = $docter->getTheDoctersDepartment($uri[3]);
                            return $result;
                        }
                    }
                    else{
                        http_response_code(400);
                        die("400 - bad request method!");
                    }
                }
            }
            else{
                http_response_code(400);
                die("400 - bad request method!");
            }
        }

        private function departmentRoute($uri)
        {
            # code...
        }

        private function medicalJournal($uri)
        {
            $medialJournal = new medicalJournalRepository();
            $vali = new Validering();
            $finish = array();

            if($this->countUri === 2){
                // Bruger til at vise all fra docter
            }
            else if($this->countUri > 2){

                $this->arrayVali = [];
                array_push($this->arrayVali, $uri[2]);
                $result = $vali->isNumeric($this->arrayVali);
                if($result === true){
                    // Til hvis man kun skal have en admission frem 
                }
                else{

                    $search = explode("?", $uri[2]);
                    if($uri[2] = "all-patiant-from-depatment"){

                        $this->arrayVali = [];
                        array_push($this->arrayVali, $uri[3]);
                        $result = $vali->isNumeric($this->arrayVali);
                        if($result === true){

                            $id = intval($uri[3]);
                            $result = $medialJournal->getAllPatiantFromDepartmentWithId($id);
                            if($result[0] === true){

                                $antal = count($result[1]);
                                for ($i = 0; $i < $antal; $i++) { 
                                    
                                    $getResult = $result[1][$i];
                                    $finish[] =$getResult->getMedicalJournal();
                                }

                                http_response_code(200);
                                echo json_encode($finish);
                            }
                            else{
                                
                                http_response_code(404);
                                die("Der blev ikke fundet nogen medicin journaler.");
                            }
                        }
                        else{
                            http_response_code(400);
                            die("400 - bad request method!");
                        }
                    }
                    else if($search[0] == "get-patient"){
                        
                        $search = explode("&", $search[1]);

                        $patientId = explode("=", $search[0]);
                        $patientId = $patientId[1];
                        $dockerId = explode("=", $search[1]);
                        $dockerId = $dockerId[1];

                        $this->arrayVali = [];
                        array_push($this->arrayVali, $patientId, $dockerId);
                        $result = $vali->isNumeric($this->arrayVali);
                        if($result === true){

                            $result = $medialJournal->getPatiantByIdAndDocter($patientId, $dockerId);
                            if($result[0] === true){

                                $antal = count($result[1]);
                                for ($i = 0; $i < $antal; $i++) { 
                                    
                                    $getResult = $result[1][$i];
                                    $finish[] = $getResult->getName();
                                }

                                http_response_code(200);
                                echo json_encode($finish);
                            }
                            else{

                                http_response_code(404);
                                die("Du har ikke adgang til denne patientjournal.");
                            }
                        }
                        else{
                            http_response_code(400);
                            die("400 - bad request method!");
                        }
                    }
                    else{
                        http_response_code(404);
                        die("Det blev ikke fundet");
                    }
                }
            }
            else{
                http_response_code(400);
                die("400 - bad request method!");
            }
        }
    }
?>