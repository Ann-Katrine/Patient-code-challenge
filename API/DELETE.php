<?php
    // gør at man for alle fejl frem 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./validering.php");
    include_once("../ORM/Repository/AdmissionRepository.php");
    include_once("../ORM/Repository/DepartmentRepository.php");
    include_once("../ORM/Repository/DoctorRepository.php");
    include_once("../ORM/Repository/medicalJournalRepository.php");

    class DELETE{
        private $id = 0;
        private $uriArray = array();
        private $countUri;
        private $arrayVali = array();

        public function findRoute($uri, $headers)
        {
            
            if(in_array("application/json", $headers)){

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
            $admission = new admissionRepository();
            $vali = new Validering();

            array_push($this->arrayVali, $uri[2]);
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