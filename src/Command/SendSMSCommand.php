<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendSMSCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('cron:send-sms')
            ->setDescription('Send SMS from API system')
            ->setHelp('This command allows you to send SMS to customer...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'SMS Sender',
            '============',
            '',
        ]);

        $token = "DDKAIz5T1GNUCaGqmFWOwit7BglOtNaEhAjLwriT";

        $params = [
            'to' => '48535936320',
            'from' => 'Eco',
            'message' => "Bardzo proszę o opłacenie faktury. Wiadomość wygenerowana automatycznie",
            'encoding' => 'utf-8',
            'format' => 'json'
        ];

        $send = $this->sendSMS($params,$token);

        if ($send->list[0]->error == null) {
            $output->writeln('<info>Status [OK]</info>');
        }else {
            $output->writeln('<error>Status [FAILDED]</error>');
        }
    }


    protected function sendSMS($params, $token)
    {
        $url = 'https://api.smsapi.pl/sms.do';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $params);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $token"
        ));

        $content = curl_exec($c);
        $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

        curl_close($c);

        return json_decode($content);
    }

}
