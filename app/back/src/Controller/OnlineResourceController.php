<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/online_resource', name: 'online_resource_')]
class OnlineResourceController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // ...
    }
}