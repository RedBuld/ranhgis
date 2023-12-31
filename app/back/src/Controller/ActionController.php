<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/action', name: 'action_')]
class ActionController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // ...
    }
}