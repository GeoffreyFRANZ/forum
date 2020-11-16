<?php

namespace Model\entity;

use App\AbstractEntity;

class Utilisateur extends AbstractEntity {

    private $id;
    private $pseudo;
    private $email;
    private $avatar;
    private $inscription;
    private $mdp;
    private $rang;

    public function __construct($data){
        $this->hydrate($data);
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of inscription
     */ 
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
     * Set the value of inscription
     *
     * @return  self
     */ 
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of rang
     */ 
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set the value of rang
     *
     * @return  self
     */ 
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }
}

  