<?php

namespace Tests;
use Faker;
class CreateContactTest extends BaseTest
{
    public function testCreateContacts()
    {
        $this->setUp();
        $faker = Faker\Factory::create();
        try {

            $params = [
                'name' => $faker->name,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email_address' => $faker->email,
                'type' => 'CUSTOMER',
                'addresses' => [
                    [
                        'type' => 'STREET',
                        'address_line_1' => $faker->streetAddress,
                        'city' => $faker->city,
                        'postal_code' => $faker->postcode,
                        'country' => $faker->country
                    ]
                ],
                'phones' => [
                    [
                        'area_code' => '4',
                        'country_code' => '61',
                        'phone_number' => '35567535'
                    ]
                ]
            ];

            $response = $this->gateway->createContact($params)->send();
            var_dump($response);
            if ($response->isSuccessful()) {
                $contacts = $response->getContacts();
                $this->assertIsArray($contacts);
            }
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }
}