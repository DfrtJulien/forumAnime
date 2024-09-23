<?php

function isNotEmpty($value) {
    global $arrayError;
    if(empty($_POST[$value])){
        $arrayError[$value] = "Le champ $value ne peut pas être vide.";
        return $arrayError;
    }
    return false;
}

function checkFormat($nameInput, $value){
    global $arrayError;
    $regexName = '/^[a-zA-Zà-üÀ-Ü -]{2,255}$/';
    $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
    $regexTitle = '/^[a-zA-Zà-üÀ-Ü0-9 #?!@$%^,.;&*-]{4,255}$/';
    $regexContent = '/^[a-zA-Zà-üÀ-Ü0-9 #?!@$%^,.;&*-]{4,}$/';

    switch ($nameInput) {
        case 'pseudo':
            if(!preg_match($regexName, $value)){
                $arrayError['pseudo'] = 'Merci de renseigner un pseudo correcte!';
            }
            break;
        case 'mail':
            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                $arrayError['mail'] = 'Merci de renseigner un e-mail correcte!';
            }
            break;
        case 'password':
            if(!preg_match($regexPassword, $value)){
                $arrayError['password'] = 'Merci de donné un mot de passe avec au minimum : 8 caractères, 1 majuscule, 1 miniscule, 1 caractère spécial!';
            }
            break;
        case 'title':
            if(!preg_match($regexTitle, $value)){
                $arrayError['title'] = 'Merci de renseigner un titre correcte!';
            }
            break;
        case 'description':
            if(!preg_match($regexTitle, $value)){
                $arrayError['description'] = 'Merci de renseigner une description correcte!';
            }
            break;
        case 'content':
            if(!preg_match($regexContent, $value)){
                $arrayError['content'] = 'Merci de renseigner un contenu correcte!';
            }
            break;
    }
}

function check($nameInput, $value){

    isNotEmpty($nameInput);
    $value = htmlspecialchars($value);
    checkFormat($nameInput, $value);

}