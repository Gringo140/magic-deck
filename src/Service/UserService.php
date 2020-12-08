<?php


namespace MagicDeck\Service;

use PDO;
use MagicDeck\Entity\User;
use MagicDeck\Service\Manager\ManagerService;

class UserService
{
    public function findOneByEmail(string $email){
        $manager = new ManagerService();
        $dbh = $manager->getConnection();
        $sth = $dbh->prepare("SELECT `id`, `email`, `password`, `creation` FROM `user` WHERE `email` = :email");
        $sth->execute([":email" =>$email]);
        $result = $sth->fetch(PDO::FETCH_OBJ);
        if ($result){
            $user = new User();
            $user->setId($result->id);
            $user->setEmail($result->email);
            $user->setPassword($result->password);
            return $user;
        }
    }

    public function insert(User $user): bool {
        $manager = new ManagerService();
        $dbh = $manager->getConnection();
        $existingUser = $this->findOneByEmail($user->getEmail());
        if (!$existingUser) {
            $sth = $dbh->prepare(
                "INSERT INTO `user` (`email`, `password`, `creation`) 
            VALUES(:email, :password, :creation);"
            );
            $sth->execute([
                ":email" => $user->getEmail(),
                ":password" => password_hash($user->getPassword(), PASSWORD_DEFAULT),
                ":creation" => time(),
            ]);
            return true;
        }
        return false;
    }
}