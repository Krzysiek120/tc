<?php

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Security("has_role('ROLE_USER')")
 */
class PayUController extends Controller
{
    public function index(Request $request)
    {

        $from = 'Eco';
        $to = '48535936320';
        $message = 'Siema tutaj TOMICOM, proszę kurła opłacić fakturę bo wjadę na chatę!';

        dump($this->sendSMS($from, $to, $message));
        die();

        $url = 'https://secure.payu.com/api/v2_1/orders/';
        $access_token = 'Bearer 3e5cac39-7e38-4139-8fd6-30adc06a61bd';
        $headers = array(
            'Content-Type: application/json',
            "Authorization: $access_token"
        );

        $metoda = 'POST';
//        $metoda = 'GET';

        // GET

        if ($metoda == 'GET') {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            dump(curl_exec($ch));
        }


        // POST

        if ($metoda == 'POST') {

            $json = '
            {
                "notifyUrl": "http://127.0.0.1:8000/admin/payu/",
                "customerIp": "127.0.0.1",
                "merchantPosId": "145227",
                "description": "RTV market",
                "currencyCode": "PLN",
                "totalAmount": "15000",
                "extOrderId":"asddsadsssasssadsa1s1ssds32313212",
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

        die();
    }

    protected function sendSMS($from, $to, $message)
    {
        $access_token = 'DDKAIz5T1GNUCaGqmFWOwit7BglOtNaEhAjLwriT';

//        $url = "https://api.smsapi.pl/sms.do?from=Eco&to=48535936320&message=dsf sdfd ds&format=json";
        $url = "https://api.smsapi.pl/sms.do?";

//        $headers = [
//            "Authorization: Bearer ".$access_token
//        ];

        $headers = [
            "POST /sms.do HTTP/1.1",
            "Host: api.smsapi.pl",
            "Authorization: Bearer ".$access_token
        ];

        $json = '
            {
                "from": "Eco",
                "to": "48535936320",
                "message": "Testowa_wiadomosc",
                "format": "json"
             }
        ';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        $json = curl_exec($ch);

        $result = json_decode($json);

        dump($result);
        die();

        if ($result['error'] == null) {
            return true;
        }

        return false;
    }
}

