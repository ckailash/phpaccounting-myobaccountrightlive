<?php

namespace PHPAccounting\MyobAccountRight\Message\Payments\Responses;

use Omnipay\Common\Message\AbstractResponse;
use PHPAccounting\Xero\Helpers\IndexSanityCheckHelper;

/**
 * Delete Invoice(s) Response
 * @package PHPAccounting\MyobAccountRight\Message\Invoices\Responses
 */
class DeletePaymentResponse extends AbstractResponse
{
    /**
     * Check Response for Error or Success
     * @return boolean
     */
    public function isSuccessful()
    {
        if(array_key_exists('Errors', $this->data)){
            return !$this->data['Errors'][0]['Severity'] == 'Error';
        }
        return true;
    }

    /**
     * Fetch Error Message from Response
     * @return string
     */
    public function getErrorMessage()
    {
        if (array_key_exists('Errors', $this->data)) {
            return $this->data['Errors'][0]['Message'];
        }
        return null;
    }

    /**
     * Return all Invoices with Generic Schema Variable Assignment
     * @return array
     */
    public function getPayments(){
        $payment = [];
        foreach ($this->data as $payment) {
            $newPayment = [];
            $newPayment['accounting_id'] = IndexSanityCheckHelper::indexSanityCheck('InvoiceID', $payment);
            $newPayment['status'] = IndexSanityCheckHelper::indexSanityCheck('Status', $payment);
            $newPayment['updated_at'] = IndexSanityCheckHelper::indexSanityCheck('UpdatedDateUTC', $payment);
            array_push($payment, $newPayment);
        }

        return $payment;
    }
}