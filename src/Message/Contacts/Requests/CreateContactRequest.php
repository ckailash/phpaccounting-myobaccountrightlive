<?php

namespace PHPAccounting\MyobAccountRight\Message\Contacts\Requests;
use PHPAccounting\MyobAccountRight\Helpers\BuildEndpointHelper;
use PHPAccounting\MyobAccountRight\Message\AbstractRequest;
use PHPAccounting\MyobAccountRight\Message\Contacts\Responses\CreateContactResponse;
use PHPAccounting\MyobAccountRight\Helpers\IndexSanityCheckHelper;

/**
 * Create Contact(s)
 * @package PHPAccounting\MyobAccountRight\Message\Contacts\Requests
 */
class CreateContactRequest extends AbstractRequest
{


    /**
     * Set Name Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param string $value Contact Name
     * @return CreateContactRequest
     */
    public function setName($value){
        return $this->setParameter('name', $value);
    }

    /**
     * Set First Name Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param string $value Contact First Name
     * @return CreateContactRequest
     */
    public function setFirstName($value) {
        return $this->setParameter('first_name', $value);
    }

    /**
     * Set Last Name Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param string $value Contact Last Name
     * @return CreateContactRequest
     */
    public function setLastName($value) {
        return $this->setParameter('last_name', $value);
    }

    /**
     * Set Is Individual Boolean Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param string $value Contact Individual Status
     * @return CreateContactRequest
     */
    public function setIsIndividual($value) {
        return $this->setParameter('is_individual', $value);
    }

    /**
     * Set Email Address Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param string $value Contact Email Address
     * @return CreateContactRequest
     */
    public function setEmailAddress($value){
        return $this->setParameter('email_address', $value);
    }

    /**
     * Set Phones Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param array $value Array of Contact Phone Numbers
     * @return CreateContactRequest
     */
    public function setPhones($value){
        return $this->setParameter('phones', $value);
    }

    /**
     * Get Phones Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contactgroups
     * @return mixed
     */
    public function getPhones(){
        return $this->getParameter('phones');
    }

    /**
     * Set Addresses Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param array $value Array of Contact Addresses
     * @return CreateContactRequest
     */
    public function setAddresses($value){
        return $this->setParameter('addresses', $value);
    }

    /**
     * Set Contact Groups Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param array $value Array of Contact Groups
     * @return CreateContactRequest
     */
    public function setContactGroups($value) {
        return $this->setParameter('contact_groups', $value);
    }

    /**
     * Get ContactGroups Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contactgroups
     * @return mixed
     */
    public function getContactGroups() {
        return $this->getParameter('contact_groups');
    }

    /**
     * Get Addresses Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contactgroups
     * @return mixed
     */
    public function getAddresses(){
        return $this->getParameter('addresses');
    }


    /**
     * Set Status Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @param $value
     * @return mixed
     */
    public function setStatus($value){
        return $this->setParameter('status', $value);
    }


    /**
     * Get Status Parameter from Parameter Bag
     * @see https://developer.xero.com/documentation/api/contacts
     * @return mixed
     */
    public function getStatus(){
        return $this->getParameter('status');
    }

    public function getContactType(){
        return $this->getParameter('type');
    }

    public function setContactType($param){
        return $this->setParameter('type', $param);
    }

    /**
     * Get Phones Array with Phone Details for Contact
     * @access public
     * @param array $data Array of Xero Phones
     * @return array
     */
    public function getPhoneData($data) {
        $phones = [];

        return $phones;
    }

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('name', 'type');
        $this->issetParam('Name', 'name');
        $this->issetParam('FirstName', 'display_name');
        $this->issetParam('LastName', 'last_name');
        $this->issetParam('EmailAddress', 'email_address');
        $this->issetParam('Website', 'website');
        $this->issetParam('BankAccountDetails', 'bank_account_details');
        $this->issetParam('TaxNumber', 'tax_number');
        $this->issetParam('AccountsReceivableTaxType', 'accounts_receivable_tax_type');
        $this->issetParam('AccountsPayableTaxType', 'accounts_payable_tax_type');
        $this->issetParam('DefaultCurrency', 'default_currency');
        $this->issetParam('ContactStatus','status');

        $this->data['Phones'] = ($this->getPhones() != null ? $this->getPhoneData($this->getPhones()) : null);
        $this->data['Addresses'] = ($this->getAddresses() != null ? $this->getAddressData($this->getAddresses()) : null);
        $this->data['ContactGroups'] = ($this->getContactGroups() != null ? $this->getContactGroupData($this->getContactGroups()) : null);
        return $this->data;
    }

    public function getEndpoint()
    {
        $endpoint = 'Contact/';
        return BuildEndpointHelper::contactType($endpoint, $this->getContactType());
    }

    /**
     * Create Generic Response from Xero Endpoint
     * @param mixed $data Array Elements or Xero Collection from Response
     * @return CreateContactResponse
     */
    public function createResponse($data)
    {
        return $this->response = new CreateContactResponse($this, $data);
    }
}