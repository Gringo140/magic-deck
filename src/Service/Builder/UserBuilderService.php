<?php


namespace MagicDeck\Service\Builder;


use MagicDeck\Entity\User;

class UserBuilderService
{
    public function setUser($userValue){
        $userList = [];
        foreach ($userValue as $value){
            $user = new User();
            if (!property_exists($value, "password"))
            $user->setEmail($value->email);
            $user->setPassword($value->password);
            $user->setUserList($value->userList);

            $userList [] = $user;
        }
        return $userList;
    }

}