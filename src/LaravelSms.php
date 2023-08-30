<?php

namespace Mediamaxdk\LaravelSms;

class LaravelSms
{

    public function send()
    {
        $x = $this->sendSMS(array('4528353546'), "test sms fra package");
        return $x;
    }

    function sendSMS($recipients, $msg) {
        //Send an SMS using Gatewayapi.com
        $url = "https://gatewayapi.com/rest/mtsms";
        $api_token = getenv('SMS_API_KEY');

        $json = [
            'sender' => 'MediaMax',
            'message' => $msg,
            'recipients' => [],
        ];
        foreach ($recipients as $msisdn) {
            $json['recipients'][] = ['msisdn' => $msisdn];
        }

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch,CURLOPT_USERPWD, $api_token.":");
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($json));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        #dd($result);
        return "SMS sent";
    }
}
