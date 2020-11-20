<?php

namespace Controller;

use App\Session;
use App\Router;

use Model\entity\Topic;
use Model\entity\Utilisateur;
use Model\Manager\UtilisateurManager;
use Model\Manager\CategoryManager;
use Model\Manager\TopicManager;
use controller\SecurityController;
use Model\Manager\MessageManager;

class HomeController extends SecurityController
{
    /**
     * Afficher la page d'accueil
     */
    public function index()
    {

        $manager = new CategoryManager();
        $topicManager = new TopicManager();
        $msgMan =  new MessageManager();
        $userMan = new UtilisateurManager();

        $cat = $manager->findAll();
        $lastInscrit =  $userMan->lastUser();
        $msgCount = $msgMan->countMessageBySujetLimit();
        $lastestMessages =  $msgMan->lastestMessages();;
        $countMessage = $msgMan->countMessage();
        $countSujet = $topicManager->countSujet();
        $countUser =  $userMan->countUtilisateur();
    

        if (isset($_GET['search'])) {
            
            $result =  $topicManager->findByName($_GET['search']);
            foreach($result as $res){
                
                if ($res->execute() ){
                    $result = json_encode($result);
                    var_dump($result);
                }
            }

            return [
                "view" => "home.php",
                "data" => [

                    "categories" => $cat,
                    "result" => $result,
                    "inscrit" => $lastInscrit,
                    "count" => $msgCount,
                    "message" => $lastestMessages,
                    'messageCount' => $countMessage,
                    'sujetCount' => $countSujet,
                    'userCount' => $countUser,
                    //'result' => json_encode($result)    
                ],
                "titrePage" => "FORUM | Accueil"
            ];
        }
        
        return [
            "view" => "home.php",
            "data" => [
                
                "categories" => $cat,
                "inscrit" => $lastInscrit,
                "count" => $msgCount,
                "message" => $lastestMessages,
                'messageCount' => $countMessage,
                'sujetCount' => $countSujet,
                'userCount' => $countUser,
                
            ],
            "titrePage" => "FORUM | Accueil"
        ];
    }
    public function listUtilisateur()
    {

        $utilisateurMan =  new UtilisateurManager();
        $utilisateur =  $utilisateurMan->findAll();



        return [
            "view" => 'listUtilisateur.php',
            "data" => [
                "utilisateur" => $utilisateur,
            ]
        ];
    }

    public function ConnectedUser()
    {

        $utilisateur = new UtilisateurManager();


        return [
            "view" => 'utilisateur.php',
        ];
    }
    public function formchangeImg()
    {
        $utilisateur  = new  UtilisateurManager();

        return [
            "view" => 'changeImgUser.php',
            "data" => []
        ];
    }
    public function changeimg()
    {
        $utilisateur  = new  UtilisateurManager();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifie si le fichier a été uploadé sans erreur.
            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 5Mo maximum
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
                // Vérifie le type MIME du fichier
                if (in_array($filetype, $allowed)) {
                    // Vérifie si le fichier existe avant de le télécharger.
                    if (file_exists("upload/" . $_FILES["photo"]["name"])) {
                        echo $_FILES["photo"]["name"] . " existe déjà.";
                    } else {
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                    }
                } else {
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                }
            } else {
                echo "Error: " . $_FILES["photo"]["error"];
            }

            Session::setUser($_SESSION['user']->setAvatar("upload/" . $_FILES["photo"]["name"]));
            $utilisateur->modifImgUser($_GET["id"],  "upload/" . $_FILES["photo"]["name"]);
        }
        return Router::redirectTo("home", "ConnectedUser");
    }
    public function rechercheSujet()
    {
        $topicManager =  new TopicManager();


        $result =  $topicManager->findByName($_GET['search']);

        return [

            "view" => "home.php",
            "data" => [

                "result" => $result
            ]
        ];
    }
    public function rechercheUser()
    {

        $userMan = new UtilisateurManager();
        $manager = new CategoryManager();

        $utilisateur =  $userMan->findAll();


        if (!empty($_POST['search'])) {
            $search =  filter_var($_POST['search'], FILTER_SANITIZE_STRING);
            $result =  $userMan->searchPseudo($search);




            return [
                "view" => "listUtilisateur.php",
                "data" => [

                    "utilisateur" => $utilisateur,
                    "resultat" => $result
                ],
                "titrePage" => "FORUM | Accueil"
            ];
        }
    }
    public function infoUtilisateur()
    {

        $userMan = new UtilisateurManager();

        $utilisateur =  $userMan->findOneById($_GET['id']);


        return [
            "view" => "utilisateurTiers.php",
            "data" => [

                "utilisateur" => $utilisateur,

            ],
            "titrePage" => "FORUM | Accueil"
        ];
    }
    public function formMail()
    {
        $utilisateur  = new  UtilisateurManager();


        return [
            "view" => 'modifEmail.php',
            "data" => null
        ];
    }
    public function changeEmail()
    {
        $utilisateur  = new  UtilisateurManager();

        if (!empty($_POST)) {
            $email =  filter_var($_POST['email'], FILTER_SANITIZE_STRING);

            $utilisateur->modifEmailUser($_GET['id'], $email);
        }
        Session::setUser($_SESSION['user']->setEmail($email));
        return Router::redirectTo("home", "ConnectedUser");
    }

    public function formPseudo()
    {
        $utilisateur  = new  UtilisateurManager();


        return [
            "view" => 'modifPseudo.php',
            "data" => null
        ];
    }

    public function changePseudo()
    {
        $utilisateur  = new  UtilisateurManager();
        $pseudo =  filter_var($_POST['pseudo'], FILTER_SANITIZE_STRING);

        if (!empty($_POST)) {

            Session::setUser($_SESSION['user']->setPseudo($pseudo));
            $utilisateur->modifPseudo($_GET['id'], $pseudo);
        }

        return Router::redirectTo("home", "ConnectedUser");
    }
    public function confirmChangeMdp()
    {

        return [
            "view" => 'confirmChangeMdp.php',
            "data" => null
        ];
    }
    public function formChangeMdp()
    {

        $utilisateur  = new  UtilisateurManager();


        if (!empty($_POST['ancien']) and !empty($_POST['newMdp']) and !empty($_POST["confirmNewMdp"])) {

            $oldMdp = filter_var($_POST['ancien'], FILTER_SANITIZE_STRING);
            $newMdp = filter_var($_POST['newMdp'], FILTER_SANITIZE_STRING);
            $confirmNewMdp = filter_var($_POST['confirmNewMdp'], FILTER_SANITIZE_STRING);



            $verification  =    Session::changeMdp($oldMdp,  Session::getUser()->getMdp(), $newMdp, $confirmNewMdp);

            var_dump($verification);
            $hashMdp =  password_hash($verification, PASSWORD_BCRYPT);

            if ($verification !== false) {

                $utilisateur->modifMdp($_GET['id'], $hashMdp);
            }
        }
        return [
            "view" => "formChangeMdp.php",
            "data" => null
        ];
    }

    public function panneauAdmin()
    {

        $userMan = new UtilisateurManager();
        $catMan = new CategoryManager();


        $allUser =  $userMan->findAll();
        $allCat =  $catMan->findAll();

        if (!empty($_POST['search'])) {
            $search =  filter_var($_POST['search'], FILTER_SANITIZE_STRING);
            $result =  $userMan->searchPseudo($search);


            return [
                "view" => "panneauAdmin.php",
                "data" => [

                    "allUser" => $allUser,
                    "resultat" => $result,
                    "categorie" => $allCat
                ],
                "titrePage" => "FORUM | Accueil"
            ];
        }
        return [
            "view" => 'panneauAdmin.php',
            "data" => [

                "allUser" => $allUser,
                "categorie" => $allCat
            ]
        ];
    }
    public function formChangeRole()
    {

        $userMan = new UtilisateurManager();
        $user =  $userMan->findBy($_SESSION['user']->getPseudo());

        return [
            "view" => "FormChangerole.php",

        ];
    }
    public function changeRole()
    {
        $userMan = new UtilisateurManager();

        var_dump($_POST['role']);

        $user = $userMan->findBy($_SESSION['connected']);

        $changeRole  =  $userMan->changeRole($_GET['id'], $_POST['role']);

        return Router::redirectTo("Home", "panneauAdmin");
    }
}
