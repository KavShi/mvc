<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api/quote", name: "quote")]
    public function jsonQuote(): Response
    {
        $ulfs_nilsson = [
            "Alla människor jag har mött har varit underbara. Kanske har jag glömt några...",
            "Det är lättare att vara den som dör, än att vara den som är kvar.",
            "Jag måste förbereda mig på att dö. Kan inte bara träffa människor och prata.",
            "Att ha ett femtonårigt barn kräver kanske att man försöker se det nyktert.",
            "Ibland glömmer jag det hela. Och blir förskräkct när jag kommer på det.",
        ];

        $timestamp = date("Y-m-d H:i:s");
        $data = [
            'quote' => $ulfs_nilsson[array_rand($ulfs_nilsson)],
            'date' => $timestamp,
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];

        //return new JsonResponse($data);
        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
