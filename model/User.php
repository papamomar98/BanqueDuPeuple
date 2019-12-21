<?php

class User extends DB
{
    public function __construct()
    {
        parent::__construct();
    }


    public function login($login, $password)
    {
        $sql = "SELECT * FROM user WHERE login = '$login' and password = '$password' ";

        return $this->db->query($sql);
    }

    public function getUserByEmail($login)
    {
        $sql = "SELECT * FROM user WHERE login ='$login'";

        return $this->db->query($sql)->fetch();
    }

    public function verifUserByEmail($login)
    {
        $sql = "SELECT * FROM user WHERE login ='$login'";

        return $this->db->query($sql);
    }

    public function insert($nom, $prenom, $login, $password)
    {
        $sql = "INSERT INTO user values (NULL, '$nom','$prenom','$login','$password')";

        return $this->db->exec($sql);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM user";

        return $this->db->query($sql)->fetchAll();
    }

}
