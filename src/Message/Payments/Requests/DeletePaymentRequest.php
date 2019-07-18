<?php

namespace PHPAccounting\MyobAccountRight\Message\Payments\Requests;

use PHPAccounting\MyobAccountRight\Message\AbstractRequest;
use PHPAccounting\MyobAccountRight\Message\Payments\Responses\DeletePaymentResponse;

/**
 * Delete Invoice
 * @package PHPAccounting\MyobAccountRight\Message\Invoices\Requests
 */
class DeletePaymentRequest extends AbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Send Data to Xero Endpoint and Retrieve Response via Response Interface
     * @param mixed $data Parameter Bag Variables After Validation
     * @return \Omnipay\Common\Message\ResponseInterface|DeleteContactResponse
     */
    public function sendData($data)
    {
        $response = [];

        return $this->createResponse($response->getElements());
    }

    /**
     * Create Generic Response from Xero Endpoint
     * @param mixed $data Array Elements or Xero Collection from Response
     * @return DeletePaymentResponse
     */
    public function createResponse($data)
    {
        return $this->response = new DeletePaymentResponse($this, $data);
    }
}