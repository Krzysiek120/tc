<?php
namespace App\Controller\Customer;

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
class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $user = $this->getUser();

        $services = $this->getDoctrine()
            ->getRepository(CustomerService::class)
            ->findByCustomer($user);


        return $this->render('customer/Service/list.html.twig', ['services' => $services]);
    }
}