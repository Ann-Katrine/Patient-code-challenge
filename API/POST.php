<?php
    // gør at man for alle fejl frem 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./GET.php");
    include_once("./DELETE.php");
    include_once("./validering.php");
    include_once("../ORM/Repository/AdmissionRepository.php");
    include_once("../ORM/Repository/DepartmentRepository.php");
    include_once("../ORM/Repository/DoctorRepository.php");
    include_once("../ORM/Repository/medicalJournalRepository.php");

    class POST{
        private $arrayVali = array();
        private $countUri = 0;
        private $header;

        public function findRoute($uri, $headers)
        {
            
            if(in_array("application/json", $headers)){

                $this->header = $headers;
                switch ($uri[1]) {
                    case 'admission':
                        $this->admissionRoute($uri);
                        break;
                    case 'docter':
                        $this->docterRoute($uri);
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
            $data = json_decode(file_get_contents('php://input'), true);

            $admission = new admissionRepository();
            $GET = new GET();
            $DELETE = new delete();
            $vali = new Validering();

            $values = array("journal", "department", "docter");
            $result = $vali->thingsExist2Values($data, $values);
            if($result === true){

                $medicalJournal = $data["journal"];
                $department = $data["department"];
                $docter = $data["docter"];

                array_push($this->arrayVali, $medicalJournal, $department, $docter);
                $result = $vali->notEmpty($this->arrayVali);
                if($result === true){

                    $result = $vali->isNumeric($this->arrayVali);
                    if($result === true){

                        $admissions = new Admission(null, $medicalJournal, $department, $docter);
                        $result = $admission->postAdmission($admissions);
                        if($result[0] === true){
                            
                            $admissionId = $result[1];
                            $route = array("api", "docter", "docter-in-department", $docter);
                            $result = $GET->findRoute($route, $this->header);
                            if($result[0] === true){

                                $id = 0;
                                $antal = count($result[1]);
                                for ($i = 0; $i < $antal; $i++) { 
                                    
                                    $getId = $result[1][$i];
                                    $id = $getId->getId();
                                }

                                if($id == $department){
                                    
                                    $result = $admission->postDocterAdmission($admissionId, intval($docter));
                                    if($result === true){

                                        http_response_code(200);
                                        die("Admission blev oprettet");
                                    }
                                    else{

                                        $route = array("api", "admission", $admissionId);
                                        $result = $DELETE->findRoute($route, $this->header);
                                        if($result === true){

                                            http_response_code(404);
                                            die("404 - admission bliv ikke oprettet");
                                        }
                                        else{

                                            http_response_code(404);
                                            die("404 - admission bliv ikke oprettet og Der skete en fjel under sletning af admission");
                                        }
                                    }
                                }
                                else{
                                    
                                    $route = array("api", "admission", $admissionId);
                                    $result = $DELETE->findRoute($route, $this->header);
                                    if($result === true){
                                        
                                        http_response_code(404);
                                        die("404 - Den dokteren du har valgt høre ikke til den afdeling du har valgt.");
                                    }
                                    else{
                                        
                                        http_response_code(404);
                                        die("404 - Den dokteren du har valgt høre ikke til den afdeling du har valgt og Der skete en fjel under sletning af admission.");
                                    }
                                }
                            }
                            else{
                                
                                $route = array("api", "admission", $admissionId);
                                $result = $DELETE->findRoute($route, $this->header);
                                if($result === true){
                                    
                                    http_response_code(404);
                                    die("404 - Den dokter du har valgt findes ikke.");
                                }
                                else{
                                    
                                    http_response_code(404);
                                    die("404 - Den dokter du har valgt findes ikke og Der skete en fjel under sletning af admission.");
                                }
                            }
                        }
                        else{
                            http_response_code(404);
                            die("admission bliv ikke oprettet.");
                        }
                    }
                    else{
                        http_response_code(400);
                        die("400 - En af værdierne er ikke et tal");
                    }
                }
                else{

                    http_response_code(400);
                    die("400 - En af værdierne er ikke diffineret");
                }
            }
            else{
                http_response_code(400);
                die("400 - bad request");
            }
        }

        private function docterRoute($uri)
        {
            # code...
        }

        private function departmentRoute($uri)
        {
            # code...
        }

        private function medicalJournal($uri)
        {
            # code...
        }
    }
?>