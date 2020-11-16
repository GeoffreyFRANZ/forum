<?php

namespace Model\entity;

use App\AbstractEntity;

class Message extends AbstractEntity
{

    private $id;
    private $corpMessage;
    private $dateMessage;
    private $sujetId;
    private $userId;

    public function __construct($data)
    {
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
     * Get the value of corpMessage
     */ 
    public function getCorpMessage()
    {
        return $this->corpMessage;
    }

    /**
     * Set the value of corpMessage
     *
     * @return  self
     */ 
    public function setCorpMessage($corpMessage)
    {
        $this->corpMessage = $corpMessage;

        return $this;
    }

    /**
     * Get the value of dateMessage
     */ 
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set the value of dateMessage
     *
     * @return  self
     */ 
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get the value of sujetId
     */ 
    public function getSujetId()
    {
        return $this->sujetId;
    }

    /**
     * Set the value of sujetId
     *
     * @return  self
     */ 
    public function setSujetId($sujetId)
    {
        $this->sujetId = $sujetId;

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
}