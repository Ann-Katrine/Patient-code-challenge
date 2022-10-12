<?php 
    class MedicalJournal{
        /*********************************/
        /*           properties          */
        /*********************************/
        private $id;
        private $name;
        private $socialSecurityNumber;

        /*********************************/
        /*           Constructer         */
        /*********************************/
        function __construct($medicalJournald, $medicalJournalName, $medicalJournalSocialSecurityNumber)
        {
            $this->id = $medicalJournald;
            $this->name = $medicalJournalName;
            $this->socialSecurityNumber = $medicalJournalSocialSecurityNumber;
        }
        
        /*********************************/
        /*              Getter           */
        /*********************************/
        public function getMedicalJournal()
        {
            return
            [
                "id" => $this->id,
                "name" => $this->name,
                "socialSecurityNumber" => $this->socialSecurityNumber
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

        public function getSocialSecurityNumber()
        {
            return $this->socialSecurityNumber;
        }
        
        /*********************************/
        /*              Setter           */
        /*********************************/
        public function setMedicalJournal($medicalJournalName, $medicalJournalSocialsecurityNumber)
        {
            $this->name = $medicalJournalName;
            $this->socialSecurityNumber = $medicalJournalSocialsecurityNumber;
        }

        public function setName($medicalJournalName)
        {
            $this->name = $medicalJournalName;
        }

        public function setSocialSecurityNumber($medicalJournalSocialsecurityNumber)
        {
            $this->socialSecurityNumber = $medicalJournalSocialsecurityNumber;
        }
    }
?>