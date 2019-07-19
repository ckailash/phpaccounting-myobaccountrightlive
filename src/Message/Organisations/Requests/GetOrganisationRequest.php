<?php
namespace PHPAccounting\MyobAccountRight\Message\Organisations\Requests;

use Omnipay\Common\Message\ResponseInterface;
use PHPAccounting\MyobAccountRight\Message\AbstractRequest;
use PHPAccounting\MyobAccountRight\Message\Organisations\Responses\GetOrganisationResponse;
/**
 * Get Organisation(s)
 * @package PHPAccounting\MyobAccountRight\Message\Contacts\Requests
 */
class GetOrganisationRequest extends AbstractRequest
{

    public function getHttpMethod()
    {
        return 'GET';
    }

    protected function createResponse($data, $headers = [])
    {
        return $this->response =  new GetOrganisationResponse($this, $data);
    }

    public function getEndpoint()
    {
        return '';
    }
}