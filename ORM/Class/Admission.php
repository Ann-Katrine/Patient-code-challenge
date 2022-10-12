<?php 
    class Admission{
        /*********************************/
        /*           properties          */
        /*********************************/
        private $id;
        private $medicalJournal;
        private $department;
        private $docter;

        /*********************************/
        /*           Constructer         */
        /*********************************/
        function __construct($admissionId, $admissionMedicalJournal, $admissionDepartment, $admissionDocter)
        {
            $this->id = $admissionId;
            $this->medicalJournal = $admissionMedicalJournal;
            $this->department = $admissionDepartment;
            $this->docter = $admissionDocter;           
        }

        /*********************************/
        /*              Getter           */
        /*********************************/
        public function getAdmission()
        {
            return
            [
                "id" => $this->id,
                "medicalJournal" => $this->medicalJournal,
                "department" => $this->department,
                "docter" => $this->docter
            ];
        }

        public function getId()
        {
            return $this->id;
        }

        public function getMedicalJournal()
        {
            return $this->medicalJournal;
        }

        public function getDepartment()
        {
            return $this->department;
        }

        public function getDocter()
        {
            return $this->docter;
        }

        /*********************************/
        /*              Setter           */
        /*********************************/
        public function setAdmission($admissionMedicalJournal, $admissionDepartment, $admissionDocter)
        {
            $this->medicalJournal = $admissionMedicalJournal;
            $this->department = $admissionDepartment;
            $this->docter = $admissionDocter;
        }

        public function setMedicalJournal($admisionMdecialJournal)
        {
            $this->medicalJournal = $admisionMdecialJournal;
        }

        public function setDepartment($admissionDepartment)
        {
            $this->department = $admissionDepartment;
        }

        public function setDocter($admissionDocter)
        {
            $this->docter = $admissionDocter;
        }
    }
?>