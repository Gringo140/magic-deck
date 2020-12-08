<?php


namespace MagicDeck\Controller;


use MagicDeck\Entity\User;
use MagicDeck\Form\UserForm;
use MagicDeck\Service\UserService;


class UserController extends Controller
{

    public function Create(){
        header("HTTP/1.1 200 OK");
        header('Content-Type: text/html');

        $user = new User();

        $form = new UserForm();
        $errorList = $form->fill($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $service = new UserService();
            if ($service->insert($user)) {
                header("location: /user/login");
                exit();
            }
            $errorList["email"] = true;
        }

        $this->render("user/create.html.php", [
            "title" => "Create account",
            "user" => $user,
            "errorList" => $errorList,
        ]);
    }

}