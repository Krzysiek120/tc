<?php

namespace App\Controller\Customer;

use App\Entity\BillingData;
use App\Form\BillingDataType;
use App\Repository\BillingDataRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("has_role('ROLE_USER')")
 */
class BillingDataController extends Controller
{
    public function index(Request $request)
    {
        $billingDatum = $this->getDoctrine()
            ->getRepository(BillingData::class)
            ->findOneByCustomer($this->getUser());

        $form = $this->createForm(BillingDataType::class, $billingDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('billing_data_edit', ['id' => $billingDatum->getId()]);
        }

        return $this->render('customer/BillingData/edit.html.twig', [
            'billing_datum' => $billingDatum,
            'form' => $form->createView(),
        ]);
    }
}
