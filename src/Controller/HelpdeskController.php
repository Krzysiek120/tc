<?php
namespace App\Controller;

use App\Entity\CustomerService;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Security("has_role('ROLE_USER')")
 */
class HelpdeskController extends Controller
{
    public function index(Request $request)
    {


        $form = $this->createFormBuilder()
            ->add('Title', TextType::class, array('label' => 'Tytuł'))
            ->add('content', TextType::class, array('label' => 'Opis sprawy'))
            ->add('attachment', FileType::class, array('label' => 'Dodaj załącznik'))
            ->add('save', SubmitType::class, array('label' => 'Wyślij'))
            ->getForm();

        return $this->render('helpdesk/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}