<?php

namespace MyProject\Services;

use MyProject\Models\Users\User;

class EmailSender {
    public static function send(
        User $receiver,
        string $sub,
        string $tName,
        array $tVars = []
    ) {

        extract($tVars);

        ob_start();
//        require __DIR__.'../../templates/mail/'.$tName;
        require_once __DIR__.'/../../templates/mail/'.$tName;
        $body = ob_get_contents();
        ob_end_clean();

        mail($receiver->getEmail(), $sub, $body, 'Content-Type: text/html; charset=UTF-8');

    }
}