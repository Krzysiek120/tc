<?php
namespace App\Controller;

use App\Entity\CustomerService;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Security("has_role('ROLE_USER')")
 */
class HelpdeskController extends Controller
{
    public function index(Request $request)
    {
        return $this->render('helpdesk/index.html.twig', []);
    }
}