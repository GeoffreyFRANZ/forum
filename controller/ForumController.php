<?php

namespace Controller;

use App\Session;
use App\Router;

use Model\entity\Category;
use Model\entity\Topic;
use  Model\entity\Message;


use Model\Manager\UtilisateurManager;
use Model\Manager\TopicManager;
use Model\Manager\CategoryManager;
use Model\Manager\MessageManager;
use controller\SecurityController;
use Model\entity\Utilisateur;

class ForumController extends SecurityController
{


    /**
     * Afficher tous les topics
     */
    public function allTopics()
    {

        $manTopic = new TopicManager();
        $userMan = new UtilisateurManager();
        $topics = $manTopic->findAll();


                return [
                    "view" => "listTopics.php",
                    "data" => [
                        "topics" => $topics]
                ];
            
    }

    /**
     * Afficher les posts d'un topic
     */
    public function allTopicsByCat()
    {

        $id = $_GET['id'];

        $manTopic = new TopicManager();
        $userMan = new UtilisateurManager();
        $manCat = new CategoryManager();
        $messageManager = new MessageManager();

        $titre = $manCat->findOneById($id);
        $topics = $manTopic->findOneBy($id);
        
        foreach($topics as $topic){
            $auteur = $topic->getUserId();
            $idTopic =  $topic->getId();
            $countMessage = $messageManager->countMessageBySujet($idTopic);
            if(empty($countMessage)){
                $countMessage = '0';
            }
        
        }
        $utilisateur = $userMan->findOneById($auteur);

            return [
                "view" => "listTopic.php",
                "data" => [
                    "topic" => $topics,
                    "titre" => $titre,
                    "auteur" => $utilisateur                    
                ],

            ];
        
    }
    public function allMessageBySujet()
    {

        $id = $_GET['id'];
        $manMsg = new MessageManager();
        $userMan = new UtilisateurManager();
        $topicMan =  new TopicManager();
        $msg = $manMsg->findOneBy($id);
         
        $titre = $topicMan->findBy($id);
      
                
        
        return [
            'view' => "listMessage.php",
            "data" => [
                'msg' => $msg,
                "titre" => $titre,
               
            ]
        ];
    }
    public function addTopics()
    {

        $newTopic =  new TopicManager();
        $user = new UtilisateurManager();

        if ($_POST['topic'] && $_POST['corpTopic']) {
            $titre =  filter_var($_POST['topic'], FILTER_SANITIZE_STRING);
            $message =  filter_var($_POST['corpTopic'], FILTER_SANITIZE_STRING);


            $idUser = $user->findBy($_SESSION['user']->getEmail());
            foreach ($idUser as $users) {
                $id =   $users->getId();
            }

            $params =  [
                "nomTopic" => $titre,
                "corpSujet" => $message,
                "userId" => $id,
                "categorieId" => $_GET['id']
            ];


            $newTopic->createTopic($params);
        }
        return [
            Router::redirectTo("home", "index")
        ];
    }
    
    public function addMessage()
    {
        $newMessage  =  new MessageManager();
        $user = new UtilisateurManager();

        if (!empty($_POST['message'])) {
            $message  =  filter_var($_POST['message'], FILTER_SANITIZE_STRING);

            $idUser = $user->findBy($_SESSION['user']->getEmail());
            foreach ($idUser as $users) {
                $id =   $users->getId();
            }
            $params = [
                "corpMessage" => $message,
                "sujetId" => $_GET['id'],
                "userId" => $id
            ];
            $newMessage->createMessage($params);

            return [
                Router::redirectTo("home", "index")
            ];
        }
    }
    public function deleteMessage()
    {
        $deleteMessage  = new  MessageManager();

        $message = $deleteMessage->findBy($_GET['id']);

        foreach ($message as $msg) {
            $id = $msg->getId();
        }
        $deleteMessage->deleteMessage($id);
        return [Router::redirectTo("home", "index")];
    }
    public function formulaireModifMessage()
    {

        $userMan = new UtilisateurManager();
        $message =  new MessageManager();
        $utilisateur =  $userMan->findBy($_SESSION['user']->getEmail());

        $modifMessage =  $message->findBy($_GET['id']);


        return [
            "view" => "modifMessage.php",
            "data" => [
               
                "user" => $utilisateur,
                "message" => $modifMessage
            ]
        ];
    }
    public function modifMessage()
    {
        $message = new MessageManager();
        if (!empty($_POST['message'])) {

            filter_var($_POST['message'], FILTER_SANITIZE_STRING);

            $params = [
                "newMessage" => $_POST['message'],
                "id" => $_GET['id']
            ];

            $update =  $message->modifMessage($params);

            return [Router::redirectTo('home', "index")];
        }
    }

    public function modifTopic()
    {
        $modifTopic = new TopicManager();
        $userMan = new UtilisateurManager();
        $categorie = new CategoryManager();

      
        $cat  = $categorie->findAll();
        $afficheNomCat = $modifTopic->nomCatbysujet();

        $sujet =  $modifTopic->findBy($_GET['id']);

        if (!empty($_POST)) {
            $titre = filter_var($_POST['nomTopic'], FILTER_SANITIZE_STRING);
            $message = filter_var($_POST['corpSujet'], FILTER_SANITIZE_STRING);
            $categorie =  filter_var($_POST['categorie'], FILTER_SANITIZE_STRING);

            $modif =  $modifTopic->modifTopic($titre, $message, $categorie, $_GET['id']);
        }

        return [
            "view" => "modifTopic.php",
            "data" => [
                "categorie" => $cat,
                "sujet" => $sujet
            ]
        ];
    }  

 
    
}
