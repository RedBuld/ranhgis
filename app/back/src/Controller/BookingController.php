<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/booking', name: 'booking_')]
class BookingController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // ...
    }
}