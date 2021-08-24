<?php

use Awork\Api;
use Awork\Awork;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\Request;
use Pest\TestSuite;
use PHPUnit\Framework\TestCase;

function this(): TestCase
{
    return TestSuite::getInstance()->test;
}

function awork(): Awork
{
    return this()->awork ??= new Awork('test-token');
}

function httpClient(): Factory
{
    return awork()->api->httpClient;
}

function getJsonFixture($filename)
{
    return json_decode(file_get_contents(__DIR__ . sprintf('/Fixtures/%s', $filename)), true);
}

function fakeResponse($body)
{
    httpClient()->fake([
                           sprintf('%s/%s/*', Api::BASE_URL, Api::VERSION) => httpClient()->response($body),
                       ]);

    return $body;
}

function fakeJsonResponse($filename): array
{
    $fixture = getJsonFixture($filename);

    return fakeResponse($fixture);
}

function assertBodySent($fixture)
{
    httpClient()->assertSent(function (Request $request) use ($fixture) {
        return $request->body() === json_encode($fixture);
    });
}
