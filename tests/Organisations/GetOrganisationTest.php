<?php


namespace Tests\Organisations;


use Tests\BaseTest;

class GetOrganisationTest extends BaseTest
{

    public function testGetOrganisation()
    {
        $this->setUp();
        try {
            $response = $this->gateway->getOrganisation()->send();
            var_dump($response);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }
}