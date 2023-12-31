<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/room', name: 'room_')]
class RoomController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // ...
    }
}