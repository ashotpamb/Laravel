<?php

namespace App\Services;


use App\Services\logs\LogService;

class ApiService
{
    private LogService $logService;

    public function __construct(LogService $logService)
    {

        $this->logService = $logService;
    }

    public function getApi($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result, true);
        if (empty($obj['result'])) {
            $this->logService->addLog();
        }
        return $obj;
    }

}
