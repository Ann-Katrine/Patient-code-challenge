<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    class Validering{
        /*************************************************/
        /*        Om pladsen findes til raw data         */
        /*************************************************/
        public function thingsExist2Values($regler, $values){
            /* 
                hvis $value er andet end Null og false 
            */
            
            $tal = 0;
            // for at finde ud af om alle pladser bliver brugt
            $antal = count($values); // for at finde antallet
            for($i = 0; $i < $antal; $i++){
                if(isset($regler[$values[$i]])){
                    $tal++;
                }
            }
            
            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
            // return $tal == $antal; er også en true eller false stadtment 
        }

        /*************************************************/
        /*          Om pladsen findes til $_POST         */
        /*************************************************/
        public function thingsExist($values){
            /* 
                hvis $value er andet end Null og false 
            */
            
            $tal = 0;
            // for at finde ud af om alle pladser bliver brugt
            $antal = count($values); // for at finde antallet
            for($i = 0; $i < $antal; $i++){
                if(isset($_POST[$values[$i]])){
                    $tal++;
                }
            }
            
            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
            // return $tal == $antal; er også en true eller false stadtment 
        }
        
        /*********************************************************/
        /*     Om pladsen findes - bruges direkte på values      */
        /*********************************************************/
        public function onlyIfThingExist($values)
        {
            /* 
                hvis $value er andet end Null og false 
            */

            $tal = 0;
            // for at finde ud af om alle plader bliver brugt
            $antal = count($values);
            for ($i = 0; $i < $antal; $i++) { 
                if(isset($value)){
                    $tal++;
                }
            }

            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
        }

        /*************************************************/
        /*              Om der er en værdi               */
        /*************************************************/
        public function notEmpty($values){
            /*
                hvis $value ikke er
                - "" (en tom string)
                - 0 (0 som en integer)
                - 0.0 (0 som en float)
                - "0" (0 som en string)
                - NULL
                - FALSE
                - array() (er en tom array)
            */ // hvad der menes
            $tal = 0;
            
            // for at finde ud af om alle har en værdi
            $antal = count($values);// for at finde antallet
            for($i = 0; $i < $antal; $i++){
                if(!empty($values[$i])){
                    $tal++;
                }
            }
            
            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
        }
        
        /*************************************************/
        /*         Om det er numerisk(tal) værdi         */
        /*************************************************/
        public function isNumeric($values){
            $tal = 0;
            
            // for at finde ud af alle værdierne er et tal
            if(is_array($values) == true){
                $antal = count($values);
                for($i = 0; $i < $antal; $i++){
                    if(is_numeric($values[$i])){
                        $tal++;
                    }
                }

                // besked tilbage
                if($tal == $antal){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                // besked tilbage
                if(is_numeric($values) == true){
                    return true;
                }
                else{
                    return false;
                }
            }
            
            
        }

        /*************************************************/
        /*              Om det er en string              */
        /*************************************************/
        public function isString($values){
            $tal = 0;

            if(is_string($values) === true){
                return true;
            }
            else{
                return false;
            }
        }

        /*************************************************/
        /*                Længden på værdi(erne)         */
        /*************************************************/
        public function isLenght($values, $lenght){
            $tal = 0;

            $antalValues = count($values);
            $antalLenght = count($lenght);

            if($antalValues == $antalLenght){
                
                for ($i = 0; $i < $antalLenght; $i++) {

                    if(strlen($values[$i]) <= $lenght[$i]){
                        $tal++;
                    }
                }

                if($tal == $antalLenght){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

        /*************************************************/
        /*                Længden på værdieren           */
        /*************************************************/
        public function isArray($values){
            $tal = 0;

            // for at finde ud af om alle værdierne er et array
            $antal = count($values);
            for ($i = 0; $i < $antal; $i++) { 
                if(is_array($values[$i])){
                    $tal++;
                }
            }

            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
        }

        /*************************************************/
        /*                Findes i array                 */
        /*************************************************/
        public function inArray($array, $values)
        {
            $tal = 0;

            // for at finde ud af om alle værdierne er et array
            $antalArray = count($array);
            $antalValues = count($values);
            for ($i = 0; $i < $antalArray; $i++) { 
                if(in_array($values[$i], $array)){
                    $tal++;
                }
            }

            // besked tilbage
            if($tal == $antalArray){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>