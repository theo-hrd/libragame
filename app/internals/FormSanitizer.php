<?php

namespace Project\internals;

class FormSanitizer{

    
    public static function sanitizeFormString($inputText){
    
        $inputText = htmlspecialchars($inputText); //preventing injections in the input
        $inputText = trim($inputText); //remove any spaces before or after the input but keeps spaces in between 
        $inputText = strtolower($inputText); // putting everything to lowercase

        return $inputText;
    }
}