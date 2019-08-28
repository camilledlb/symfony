<?php
   namespace App\Controller;



   use Symfony\Component\HttpFoundation\Response;
   use Twig\Environment;

   class HomeController{

       /**
        * @var Environment
        */
       private $twig;


       public function __construct(Environment $twig){
           $this->twig = $twig;
       }


       public function index():Response{

            //affiche le message sur la page : return new Response('Salut les gens !');
           //afficher notre template (page)
           return new Response($this->twig->render('pages/home.html.twig'));
       }
   }