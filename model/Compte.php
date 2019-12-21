<?php
class Compte extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function delete($id, $numero)
    {
        $sql = "DELETE FROM compte WHERE id = '$id' and numero = '$numero' ";

        return $this->db->exec($sql);
    }

    public function getOneCompte($client)
    {
        $sql = "SELECT * FROM compte WHERE client = '$client'";

        return $this->db->query($sql)->fetch();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM compte";

        return $this->db->query($sql)->fetchAll();
    }

    public function insert($solde, $numero, $client, $user)
    {
        $sql = "INSERT INTO compte values (NULL, '$solde', '$numero', '$client', '$user')";

        return $this->db->exec($sql);
    }

    public function getComptetByIdClient($client)
    {
        $sql = "SELECT * FROM compte WHERE client =$client";

        return $this->db->query($sql)->fetch();
    }

    public function update($numero, $solde)
    {
        $sql = "UPDATE compte set solde = '$solde' WHERE numero = '$numero' ";

        return $this->db->exec($sql);
    }

    function genererNumeroCompte(){
        $id = 0;
        $sql = "SELECT max(id) FROM compte";
        $array = $this->db->query($sql)->fetch();
        if($array == NULL){
            $id=1;
        }else{
            $array[0]++;
            $id = $array[0];
        }
        $numero = "BDP_".date('d').date('m').date('Y')."_CO".$id;
        return $numero;
    }
}
?>
