<?php

namespace Model\entity;

use App\AbstractEntity;

class Topic extends AbstractEntity {

    private $id;
    private $nomTopic;
    private $dateTopic;
    private $corpSujet;
    private $statut;
    private $userId;
    private $categorieId;

 
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
     * Get the value of nomTopic
     */ 
    public function getNomTopic()
    {
        return $this->nomTopic;
    }

    /**
     * Set the value of nomTopic
     *
     * @return  self
     */ 
    public function setNomTopic($nomTopic)
    {
        $this->nomTopic = $nomTopic;

        return $this;
    }

    /**
     * Get the value of dateTopic
     */ 
    public function getDateTopic()
    {
        return $this->dateTopic;
    }

    /**
     * Set the value of dateTopic
     *
     * @return  self
     */ 
    public function setDateTopic($dateTopic)
    {
        $this->dateTopic = $dateTopic;

        return $this;
    }

    /**
     * Get the value of corpSujet
     */ 
    public function getCorpSujet()
    {
        return $this->corpSujet;
    }

    /**
     * Set the value of corpSujet
     *
     * @return  self
     */ 
    public function setCorpSujet($corpSujet)
    {
        $this->corpSujet = $corpSujet;

        return $this;
    }



    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of categorieId
     */ 
    public function getCategorieId()
    {
        return $this->categorieId;
    }

    /**
     * Set the value of categorieId
     *
     * @return  self
     */ 
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }
}