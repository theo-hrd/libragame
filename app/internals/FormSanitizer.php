<?php

class FormSanitizer{

    public static function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText); //removing html tags from the input
        $inputText = trim($inputText); //remove any spaces before or after the input but keeps spaces in between 
        $inputText = strtolower($inputText); // putting everything to lowercase
        $inputText = htmlspecialchars($inputText); //preventing injections in the input
        return $inputText;
    }
}