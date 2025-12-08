<?php

namespace Papimod\Date\Test;

use Papi\Action;
use Papi\enumerator\HttpMethods;
use Papimod\Date\DateService;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class FakeAction implements Action
{
    private readonly DateService $dateService;

    public function __construct(DateService $dateService)
    {
        $this->dateService = $dateService;
    }

    public static function getMethod(): string
    {
        return HttpMethods::GET;
    }

    /**
     * @var string
     */
    public static function getPattern(): string
    {
        return "/fake";
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        $date = $this->dateService->dateFromString("2025-12-05 12:00:00");
        $body = $this->dateService->dateToString($date);
        $response->getBody()->write($body);
        return $response;
    }
}
