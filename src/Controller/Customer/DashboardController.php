<?php
namespace App\Controller\Customer;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("has_role('ROLE_USER')")
 */
class DashboardController extends Controller
{
    public function index()
    {
        return $this->render('customer/DashboardUser/index.html.twig', []);
    }
}