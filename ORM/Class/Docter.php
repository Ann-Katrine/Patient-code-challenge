<?php 
    class Docter{
        /*********************************/
        /*           properties          */
        /*********************************/
        private $id;
        private $name;
        private $department;

        /*********************************/
        /*           Constructer         */
        /*********************************/
        function __construct($docterId, $docterName, $docterDepartment)
        {
            $this->id = $docterId;
            $this->name = $docterName;
            $this->department = $docterDepartment;
        }
        
        /*********************************/
        /*              Getter           */
        /*********************************/
        public function getDocter()
        {
            return
            [
                "id" => $this->id,
                "name" => $this->name,
                "department" => $this->department
            ];
        }

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getDepartment()
        {
            return $this->department;
        }
        
        /*********************************/
        /*              Setter           */
        /*********************************/
        public function setDocter($docterName, $docterDepartment)
        {
            $this->name = $docterName;
            $this->department = $docterDepartment;
        }

        public function setName($docterName)
        {
            $this->name = $docterName;
        }

        public function setDepartemnt($docterDepartment)
        {
            $this->department = $docterDepartment;
        }
    }
?>