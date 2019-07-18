<?php
namespace PHPAccounting\MyobAccountRight\Message\CurrentUser\Requests;

use PHPAccounting\MyobAccountRight\Message\AbstractRequest;
use PHPAccounting\MyobAccountRight\Message\CurrentUser\Responses\GetCurrentUserResponse;

/**
 * Get Contact(s)
 * @package PHPAccounting\MyobAccountRight\Message\Contacts\Requests
 */
class GetCurrentUserRequest extends AbstractRequest
{
    public function getEndpoint()
    {

        $endpoint = 'CurrentUser/';

        return $endpoint;
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    protected function createResponse($data, $headers = [])
    {
        return $this->response = new GetCurrentUserResponse($this, $data);
    }
}