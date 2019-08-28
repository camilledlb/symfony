<?php
    /**
     * Created by PhpStorm.
     * User: Camille
     * Date: 28/08/2019
     * Time: 10:30
     */

    namespace App\Controller;

    use App\Entity\Car;
    use App\Repository\CarRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class CarController extends  AbstractController
    {

        /**
               * @var CarRepository $repository
         */

        private $repository;

        public function __construct(CarRepository $repository)
        {
            $this->repository = $repository;
        }

        /**
         * @Route("/voitures",name="car.index")
         * @return Response
         */

        public function index(): Response{
            // return new Response('les voitures pour votre course');

            //pour avoir accès au repository - accès aux data
            $cars= $this->repository->findAllCars();
            dump($cars);
            return $this->render('pages/car.html.twig', [
                'current_menu'=> 'cars',
                'listcars' => $cars
            ]);
        }


        //POUR ENVOYER DANS BASE DE DONNEES EXEMPLE 1
        /*
        //création de notre objet car
    $car = new Car();
    $car->setCarCaption('Ford mustang')
    ->setCarPhoto('https://picolio.auto123.com/13photo/ford/2013-ford-mustang-v6-premium-coupe_1.jpg');

        //envoie les données en bdd avec entity manager (em)
    $em=$this->getDoctrine()->getManager();
    $em->persist($car);
    $em->flush();*/

        //GET DATA FROM DB - appelle la doctrine
   /* $repository = $this->getDoctrine()->getRepository(Car::class );
    dump($repository); //voir dans la console ce que ca rend cô var_dump
    */

    }