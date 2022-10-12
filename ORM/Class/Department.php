<?php 
    class Department{
        /*********************************/
        /*           properties          */
        /*********************************/
        private $id;
        private $name;

        /*********************************/
        /*           Constructer         */
        /*********************************/
        function __construct($departmentId, $departmentName)
        {
            $this->id = $departmentId;
            $this->name = $departmentName;
        }
        
        /*********************************/
        /*              Getter           */
        /*********************************/
        public function getDepartment()
        {
            return
            [
                "id" => $this->id,
                "name" => $this->name
            ];
        }

        public function getId()
        {
            return  $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        /*********************************/
        /*              Setter           */
        /*********************************/
        public function setDepartemnt($departmentName)
        {
            $this->name = $departmentName;
        }
    }
?>