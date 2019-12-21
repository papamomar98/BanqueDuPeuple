<?php
class Client extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM client";

        return $this->db->query($sql)->fetchAll();
    }

    public function getClientById($id)
    {
        $sql = "SELECT * FROM client WHERE id =$id";

        return $this->db->query($sql)->fetch();
    }

    public function insert($nom, $prenom, $adresse, $tel)
    {
        $sql = "INSERT INTO client values (NULL, '$nom', '$prenom', '$adresse', '$tel')";

        return $this->db->exec($sql);
    }

    public function verifierTel($tel)
    {
        $sql = "SELECT * FROM client WHERE tel = '$tel'";

        return $this->db->query($sql)->fetch();
    }

    public function update($id, $nom, $prenom, $adresse, $tel)
    {
        $sql = "UPDATE client set nom = '$nom' , prenom = '$prenom' , adresse = '$adresse' , tel = '$tel' WHERE id = $id ";

        return $this->db->exec($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM client WHERE id = '$id' ";

        return $this->db->exec($sql);
    }

}
?>
