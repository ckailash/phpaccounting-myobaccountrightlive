<?php
namespace PHPAccounting\MyobAccountRight\Message\Organisations\Responses;

use Omnipay\Common\Message\AbstractResponse;
use PHPAccounting\MyobAccountRight\Helpers\IndexSanityCheckHelper;

/**
 * Get Contact(s) Response
 * @package PHPAccounting\MyobAccountRight\Message\Contacts\Responses
 */
class GetOrganisationResponse extends AbstractResponse
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
            if ($this->data['Errors'][0]['Message'] === 'The supplied OAuth token (Bearer) is not valid') {
                return 'The access token has expired';
            }
            else {
                return $this->data['Errors'][0]['Message'];
            }
        }
        return null;
    }


    /**
     * Return all Contacts with Generic Schema Variable Assignment
     * @return array
     */
    public function getOrganisations(){
        $organisations = [];
        foreach ($this->data as $organisation) {
            var_dump($organisation);
            $newOrganisation = [];
            $newOrganisation['accounting_id'] = IndexSanityCheckHelper::indexSanityCheck('Id', $organisation);
            $newOrganisation['name'] = IndexSanityCheckHelper::indexSanityCheck('Name', $organisation);
            $newOrganisation['uri'] = IndexSanityCheckHelper::indexSanityCheck('Uri', $organisation);
            $newOrganisation['country_code'] = IndexSanityCheckHelper::indexSanityCheck('Country', $organisation);
            array_push($organisations, $newOrganisation);
        }

        return $organisations;
    }
}