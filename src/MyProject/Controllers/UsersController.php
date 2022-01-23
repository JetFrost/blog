<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UserActivationService;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Services\Db;
use MyProject\Services\EmailSender;
use MyProject\View\View;

class UsersController {
    /** @var View */
    private $view;

    public function __construct() {
        $this->view = new View(__DIR__ . '/../../templates');
    }

    public function signUp():void {

        if (!empty($_POST)) {

            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $exception){
                $this->view->renderHtml('users/signUp.php', ['error' => $exception->getMessage()]);
                return;
            }

            if ($user instanceof User) {

                $code = UserActivationService::createActivationCode($user);

                EmailSender::send(
                    $user,
                    'Активация',
                    'userActivation.php',
                    [
                        'userId' => $user->getId(),
                        'code' => $code
                    ]
                );

                $this->view->renderHtml('users/signUpSuccessful.php');
                return;

            }

        }

        $this->view->renderHTML('users/signUp.php');
    }

    public function activate(int $userId, string $activationCode):void {
        $user = User::getById($userId);

        if ($user === null){
            $this->view->renderHTML('errors/405.php', [], 405);
            return;
        }

        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
        if ($isCodeValid){
            $user->activate();
            UserActivationService::deleteCheckedCode($activationCode);
            echo 'Ok!';
        }else {
            $this->view->renderHTML('errors/406.php', [], 406);
            return;
        }
    }

    public function login() {

        if (!empty($_POST)){
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (InvalidArgumentException $exception){
                $this->view->renderHTML('users/login.php', ['error' => $exception->getMessage()]);
                return;
            }
        }

        $this->view->renderHTML('users/login.php');
    }

    public function logOut(){
        UsersAuthService::deleteToken();
        header('Location: /');
    }
}