<?php
namespace PHPAccounting\MyobAccountRightLive\Message\CurrentUser\Requests\AccountRight;

use PHPAccounting\MyobAccountRightLive\Message\AbstractRequest;
use PHPAccounting\MyobAccountRightLive\Message\CurrentUser\Responses\AccountRight\GetCurrentUserResponse;

/**
 * Get Contact(s)
 * @package PHPAccounting\MyobAccountRightLive\Message\Contacts\Requests
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