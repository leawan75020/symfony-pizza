<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    #[Route('/pizza', name: 'app_pizza')]
    public function index(): Response
    {
        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
        ]);
    }
    #[Route('/pizza/nouvelle', name: 'app_pizza_newPizza')]
    public function newPizza(PizzaRepository $repository): Response
    {

        //crer une new pizza l'objet pizza
        $pizza = new Pizza();
        $pizza->setName('Regina');
        $pizza->setPrice(15.99);

        //enregistrer la pizza dans la bd
        $repository->save($pizza, true);
        //affichage une confirmation
        return new Response("La pizza avec l'id  {$pizza->getId()} a bien été reregistre");
    }
}