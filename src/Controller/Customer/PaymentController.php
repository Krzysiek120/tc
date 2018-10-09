<?php
namespace App\Controller\Customer;

use App\Entity\CustomerService;
use App\Entity\Service;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Security("has_role('ROLE_USER')")
 */
class PaymentController extends Controller
{
    public function new(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $user = $this->getUser();
            $serviceId = (int)$request->request->get('id');

            $services = $this->getDoctrine()
                ->getRepository(CustomerService::class)
                ->find($serviceId);

            $price = 10000;
            $orderId = 'tomicom_test_123456';

            $this->PayViaPayu($price, $orderId);
        }

        die();

        return $this->render('customer/Service/list.html.twig');
    }

    private function PayViaPayu($price, $orderId)
    {
        $url = 'https://secure.payu.com/api/v2_1/orders/';
        $access_token = 'Bearer 3e5cac39-7e38-4139-8fd6-30adc06a61bd';
        $headers = array(
            'Content-Type: application/json',
            "Authorization: $access_token"
        );

        $json = '
            {
                "notifyUrl": "http://127.0.0.1:8000/admin/payu/",
                "customerIp": "127.0.0.1",
                "merchantPosId": "145227",
                "description": "RTV market",
                "currencyCode": "PLN",
                "totalAmount": "'.$price.'",
                "extOrderId":"'.$orderId.'",
                "buyer": {
                    "email": "john.doe@example.com",
                    "phone": "654111654",
                    "firstName": "John",
                    "lastName": "Doe"
                },
                "products": [
                    {
                        "name": "Wireless Mouse for Laptop",
                        "unitPrice": "15000",
                        "quantity": "1"
                    }
                ]
             }
        ';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        $json = curl_exec($ch);
        $arr = json_decode($json);

        $url = $arr->redirectUri;

        header('Location: '.$url);
    }
}