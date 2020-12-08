<?php


namespace MagicDeck\Form;


use MagicDeck\Entity\User;

class UserForm implements FormInterface
{
    private array $errorList;

    public function fill($entity): array
    {
        // TODO: Implement fill() method.

        $this->errorList = [];

        $entity->setEmail((string)filter_input(INPUT_POST, "email"));
        $entity->setPassword((string)filter_input(INPUT_POST, "password"));

        if($this->isSubmitted()) {
            if (!filter_var($entity->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->errorList["email"] = true;
            }
            if (!$entity->getPassword()) {
                $this->errorList["password"] = true;
            }
            $confirm = filter_input(INPUT_POST,"confirm");

            if (null !== $confirm && $entity->getPassword() !== $confirm){
                $this->errorList["confirm"] = true;
            }
        }

//        $user = new User();
//        $email = "";
//        $password = "";
//        $passwordTwo = "";
//
//        if (null !== filter_input(INPUT_POST, "user-create")) {
//            $nullpassword = filter_input(INPUT_POST, "password");
//            if (null === $nullpassword){
//                $nullpassword = "";
//            }
//            $nullemail = filter_input(INPUT_POST,"email");
//            if (null === $nullemail){
//                $nullemail = "";
//            }
//            $email = $user->setEmail($nullemail);
//            $password = $user->setPassword($nullpassword);
//            $passwordTwo = filter_input(INPUT_POST, "confirm");
//            if ($email === "") {
//                $errorList["email"] = "erreur email";
//            }
//            if ($password === "") {
//                $errorList["password"] = "erreur password";
//            }
//            if ($passwordTwo === $password) {
//                $errorList["passwordTwo"] = "erreur passwordTwo";
//            }
//        }
    return $this->errorList;


    }

    public function isSubmitted(): bool
    {
        // TODO: Implement isSubmitted() method.
        return (bool)filter_input(INPUT_POST, "user-create");
    }

    public function isValid(): bool
    {
        // TODO: Implement isValid() method.
        if (!$this->errorList){
            return true;
        }
        return false;
    }
}
/*
    Tes filter input fait le dans fill
    Passe à la vue le user
    Vérifie que filter input ne renvoie pas null
    Le builder est inutile
    Fait ça dans fill
    Et passe à ta vue user et errors
    Pas pleins de variables
    Et les erreur fait le dans fill
    Et quand le form est valid faut enchaîner sur l'insertion

  */