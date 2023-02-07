<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Function_model extends CI_Model{
    
    
    public function updateCategorie($id,$idC){
        $sql="UPDATE objet set categorie=1,idC='%s' where idO='%s'";
        $sql=sprintf($sql,$this->db->escape($idC),$this->db->escape($id));
        $this->db->query($sql);
    }

    public function insertObject($nom,$idM,$descri,$prix){
        $sql="INSERT into  objet values(null,%s,%g,null,0,%s,%g)";
        $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($idM),$this->db->escape($descri),$this->db->escape($prix));
        $this->db->query($sql);
    }

    public function getAutreObjet($id) //fonction qui permet de selecter tous les objects des autres utilisateurs
    {
            $sql='SELECT * from objetM where idM!=%g';
            $sql=sprintf($sql,$this->db->escape($id));
            $query=$this->db->query($sql);
            foreach($query->result_array() as $row){
                $table['nom'][]=$row['nom'];
                $table['titre_desc'][]=$row['titre_desc'];
                $table['prix_estime'][]=$row['prix_estime'];
                $table['username'][]=$row['username'];
            }
            return $table;
    }

    public function getMyAllObject($id)//function qui prend tous mes objets
    {
        $sql='SELECT * from objetM where idM=%g';
        $sql=sprintf($sql,$this->db->escape($id));
        $query=$this->db->query($sql);
        foreach($query->result_array() as $row){
            $table['nom'][]=$row['nom'];
            $table['titre_desc'][]=$row['titre_desc'];
            $table['prix_estime'][]=$row['prix_estime'];
            $table['username'][]=$row['username'];
        }
        return $table;
    }

    function makaId($mail, $mdp) 
    {
        $query=$this->db->query('SELECT * from membre');
        $id=-1;
        foreach($query->result_array() as $row){
            if($mail==$row['email'] && $mdp==$row['mdp']){
                $id=$row['idM'];
            }
        }
        return $id;
    }

    public function verifierLogin($email,$mdp){
		$this->load->helper('url');
		//$this->load->library('session');
		// $email=$this->input->post('email');
		// $mdp=$this->input->post('mdp');
		if($email=='admin'&& $mdp=='1234'){
            return "Admin";
			//$this->session->set_userdata('email', $email);
			//redirect(site_url('welcome/accueil'));
		}
		else{
            if($this->makaId($email,$mdp)>=0){
                return "ok";
            }
			else{
                return "non";
            }
		}
	}

  
    public function getPourcantageSous($prix){
        $nb=$prix-($prix*(20/100));
        return $nb;
    }

    
    public function getPourcantageSup($prix){
        $nb=$prix+($prix*(20/100));
        return $nb;
    }

    public function getObjetParPourcentage($id,$prix){ //fonction qui permet de selecter tous mes objects entres les deux valeurs pourcentagesous et pourcentagesup
        $prixSous=$this->getPourcantageSous($prix);
        $prixSup=$this->getPourcantageSup($prix);
        $sql='SELECT * from objetM where idM=%g and prix_estime>=%g and prix_estime<=%g';
        $sql=sprintf($sql,$this->db->escape($id),$this->db->escape($prixSous),$this->db->escape($prixSup));
        echo $sql;
        $query=$this->db->query($sql);
        $table=array();
        foreach($query->result_array() as $row){
            $table['nom'][]=$row['nom'];
            $table['titre_desc'][]=$row['titre_desc'];
            $table['prix_estime'][]=$row['prix_estime'];
            $table['username'][]=$row['username'];
        }
        return $table;
    }

    public function insert($id,$lien){
        $sql="INSERT into  photo values(null,%g,%s)";
        $sql=sprintf($sql,$this->db->escape($id),$this->db->escape($lien));
        $this->db->query($sql);
    }

    public function verif_mdp($mdp1,$mdp2){
        // return strcmp($mdp1,$mdp2);
        if(strcmp($mdp1,$mdp2)==0){ //raha mitovy
            return 1;
        }
        return 0;
    }
    public function inscription($data){
        $this->load->helper('url');
        $this->load->library('session');
        if($this->verif_mdp($data['mdp1'],$data['mdp2'])==false){
            $this->load->Redirect(site_url('Test'));
        }
        else{
            $req = "insert into membre values(null,%s,%s,%s,0)";
            $req = sprintf($req,$this->db->escape($data['email']),$this->db->escape($data['mdp1']),$this->db->escape($data['username']));
            $this->db->query($req);
            echo $this->db->affected_rows();
        }
    }
    public function listeDemande($idM){
        $this->load->helper('url');
        $req = "select autreObjet_dem.*,mesObjet_dem.* from demande join autreObjet_dem on autreObjet_dem.ido1=demande.idO1 join mesObjet_dem on mesObjet_dem.ido2=demande.idO2 where demande.idO2=".$idM;
        $query = $this->db->query($req);
        $rep = array();
        foreach($query->result_array() as $row){

        }
    }
}
?>