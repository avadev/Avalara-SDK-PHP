<?php
/**
 * IssuerWriteResponse
 *
 * PHP version 7.3
 *
 * @category Class
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/*
 * AvaTax Software Development Kit for PHP
 *
 * (c) 2004-2025 Avalara, Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Avalara 1099 & W-9 API Definition
 *
 * > **Note:** You must have an active Avalara 1099 & W-9 subscription to authenticate and use these APIs. If you don't have a subscription, please contact our [Sales team](https://www.avalara.com/us/en/products/1099/request-a-demo.html).  ## Authentication  The Avalara 1099 & W-9 API uses **Bearer Token Authentication**. To authenticate, acquire a bearer token using a **Client ID** and **Client Secret** that you generate in the Avalara 1099 & W-9 web application.  The sample cURL commands below use **production** URLs. For **sandbox**, replace them with the sandbox URLs listed in the Sandbox Environment table.  ### Option 1 — Client ID and Client Secret (recommended)  **Step 1: Create API credentials in the Avalara 1099 & W-9 web app**  For a full walkthrough, see the [Avalara 1099 & W-9 integration guide](https://developer.avalara.com/products/avalara-1099-and-w9/integration-guides/1099-and-w-9/siu2796410674799/).  > **Note:** To enable credential creation you must first enter a valid company address in **Account Settings > Account** and enable two-factor authentication in **Account Settings > Security**.  1. In Avalara 1099 & W-9, open **Account Settings** (gear icon, top-right of any page) and select **API**. 2. Click **Create new credentials** (a valid company address and 2FA are required). 3. Copy your **Client Id** and **Client Secret** securely — they will not be shown again after you leave the screen.  **Step 2: Request a bearer token**  ```bash curl -X POST 'https://identity.avalara.com/connect/token' \\   --header 'Content-Type: application/x-www-form-urlencoded' \\   --data-urlencode 'grant_type=client_credentials' \\   --data-urlencode 'client_id={{client_id}}' \\   --data-urlencode 'client_secret={{client_secret}}' ```  ### Option 2 — Account ID and License Key  If your organization already uses other Avalara products (AvaTax, CertCapture) and has access to the logged-in area of Avalara.com, you can generate the bearer token using your **Account ID** and **License Key**.  > **Note:** If you already have a license key for other Avalara products you can reuse it. Generating a new key will reset any previously created key.  1. Log in to Avalara.com. 2. Go to **Settings → License and API Keys**. 3. Click **Generate New Key**. 4. Note your **Account ID** from the Account menu.  ```bash curl -X POST 'https://identity.avalara.com/connect/token' \\   --header 'Content-Type: application/x-www-form-urlencoded' \\   --data-urlencode 'grant_type=client_credentials' \\   --data-urlencode 'client_id={{accountId}}' \\   --data-urlencode 'client_secret={{licenseKey}}' ```  ### Using and renewing the bearer token  Include the token in the `Authorization` header on every request:  ```http Authorization: Bearer {access_token} ```  Tokens expire after the number of seconds in the `expires_in` field of the token response. Your integration must renew the token before it expires.  **Example token response**  ```json {   \"access_token\": \"eyJhbGciOiJIUzI1NiIsInR5cCI...\",   \"expires_in\": 3600,   \"token_type\": \"Bearer\",   \"scope\": \"avatax_api iam-ds\" } ```  ### Sandbox Environment  Use the same steps as production, replacing the base URLs:  | Purpose | Production | Sandbox | | --- | --- | --- | | Account & License Key management (web) | `https://www.avalara.com` | `https://sandbox.admin.avalara.com` | | Account & License Key management (API) | `https://rest.avatax.com` | `https://sandbox-rest.avatax.com` | | Token generation | `https://identity.avalara.com` | `https://ai-sbx.avlr.sh` |  ## Environments  #### Production - **Avalara 1099 API URL:** [`https://api.avalara.com/avalara1099`](https://api.avalara.com/avalara1099) - **Identity Token URL:** [`https://identity.avalara.com/connect/token`](https://identity.avalara.com/connect/token)  #### Sandbox - **Avalara 1099 API URL:** [`https://api.sbx.avalara.com/avalara1099`](https://api.sbx.avalara.com/avalara1099) - **Identity Token URL:** [`https://ai-sbx.avlr.sh/connect/token`](https://ai-sbx.avlr.sh/connect/token)  ---  ## API & SDK Documentation  [Avalara 1099 API Reference](https://developer.avalara.com/api-reference/avalara1099/avalara1099/)  [Avalara SDKs](https://developer.avalara.com/sdk/)  [Swagger](https://api.avalara.com/avalara1099/swagger/index.html?api-version=2.0)
 *
 * @category   Avalara client libraries
 * @package    Avalara\SDK\API\A1099\V2
 * @author     Sachin Baijal <sachin.baijal@avalara.com>
 * @author     Jonathan Wenger <jonathan.wenger@avalara.com>
 * @copyright  2004-2025 Avalara, Inc.
 * @license    https://www.apache.org/licenses/LICENSE-2.0
 * @link       https://github.com/avadev/AvaTax-REST-V3-PHP-SDK

 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Avalara\SDK\Model\A1099\V2;

use \ArrayAccess;
use \Avalara\SDK\ObjectSerializer;
use \Avalara\SDK\Model\ModelInterface;
/**
 * IssuerWriteResponse Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class IssuerWriteResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'IssuerWriteResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'business_name' => 'string',
        'business_name2' => 'string',
        'name' => 'string',
        'dba_name' => 'string',
        'tin_type' => 'string',
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string',
        'suffix' => 'string',
        'tin' => 'string',
        'reference_id' => 'string',
        'telephone' => 'string',
        'tax_year' => 'int',
        'country_code' => 'string',
        'email' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
        'foreign_province' => 'string',
        'transfer_agent_name' => 'string',
        'last_filing' => 'bool',
        'id' => 'string',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'validation_errors' => '\Avalara\SDK\Model\A1099\V2\ValidationError[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'business_name' => null,
        'business_name2' => null,
        'name' => null,
        'dba_name' => null,
        'tin_type' => null,
        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,
        'suffix' => null,
        'tin' => null,
        'reference_id' => null,
        'telephone' => null,
        'tax_year' => 'int32',
        'country_code' => null,
        'email' => null,
        'address' => null,
        'city' => null,
        'state' => null,
        'zip' => null,
        'foreign_province' => null,
        'transfer_agent_name' => null,
        'last_filing' => null,
        'id' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
        'validation_errors' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'business_name' => 'businessName',
        'business_name2' => 'businessName2',
        'name' => 'name',
        'dba_name' => 'dbaName',
        'tin_type' => 'tinType',
        'first_name' => 'firstName',
        'middle_name' => 'middleName',
        'last_name' => 'lastName',
        'suffix' => 'suffix',
        'tin' => 'tin',
        'reference_id' => 'referenceId',
        'telephone' => 'telephone',
        'tax_year' => 'taxYear',
        'country_code' => 'countryCode',
        'email' => 'email',
        'address' => 'address',
        'city' => 'city',
        'state' => 'state',
        'zip' => 'zip',
        'foreign_province' => 'foreignProvince',
        'transfer_agent_name' => 'transferAgentName',
        'last_filing' => 'lastFiling',
        'id' => 'id',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'validation_errors' => 'validationErrors'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'business_name' => 'setBusinessName',
        'business_name2' => 'setBusinessName2',
        'name' => 'setName',
        'dba_name' => 'setDbaName',
        'tin_type' => 'setTinType',
        'first_name' => 'setFirstName',
        'middle_name' => 'setMiddleName',
        'last_name' => 'setLastName',
        'suffix' => 'setSuffix',
        'tin' => 'setTin',
        'reference_id' => 'setReferenceId',
        'telephone' => 'setTelephone',
        'tax_year' => 'setTaxYear',
        'country_code' => 'setCountryCode',
        'email' => 'setEmail',
        'address' => 'setAddress',
        'city' => 'setCity',
        'state' => 'setState',
        'zip' => 'setZip',
        'foreign_province' => 'setForeignProvince',
        'transfer_agent_name' => 'setTransferAgentName',
        'last_filing' => 'setLastFiling',
        'id' => 'setId',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'validation_errors' => 'setValidationErrors'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'business_name' => 'getBusinessName',
        'business_name2' => 'getBusinessName2',
        'name' => 'getName',
        'dba_name' => 'getDbaName',
        'tin_type' => 'getTinType',
        'first_name' => 'getFirstName',
        'middle_name' => 'getMiddleName',
        'last_name' => 'getLastName',
        'suffix' => 'getSuffix',
        'tin' => 'getTin',
        'reference_id' => 'getReferenceId',
        'telephone' => 'getTelephone',
        'tax_year' => 'getTaxYear',
        'country_code' => 'getCountryCode',
        'email' => 'getEmail',
        'address' => 'getAddress',
        'city' => 'getCity',
        'state' => 'getState',
        'zip' => 'getZip',
        'foreign_province' => 'getForeignProvince',
        'transfer_agent_name' => 'getTransferAgentName',
        'last_filing' => 'getLastFiling',
        'id' => 'getId',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'validation_errors' => 'getValidationErrors'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const TIN_TYPE_UNKNOWN = 'UNKNOWN';
    const TIN_TYPE_INDIVIDUAL = 'INDIVIDUAL';
    const TIN_TYPE_BUSINESS = 'BUSINESS';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTinTypeAllowableValues()
    {
        return [
            self::TIN_TYPE_UNKNOWN,
            self::TIN_TYPE_INDIVIDUAL,
            self::TIN_TYPE_BUSINESS,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['business_name'] = $data['business_name'] ?? null;
        $this->container['business_name2'] = $data['business_name2'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['dba_name'] = $data['dba_name'] ?? null;
        $this->container['tin_type'] = $data['tin_type'] ?? null;
        $this->container['first_name'] = $data['first_name'] ?? null;
        $this->container['middle_name'] = $data['middle_name'] ?? null;
        $this->container['last_name'] = $data['last_name'] ?? null;
        $this->container['suffix'] = $data['suffix'] ?? null;
        $this->container['tin'] = $data['tin'] ?? null;
        $this->container['reference_id'] = $data['reference_id'] ?? null;
        $this->container['telephone'] = $data['telephone'] ?? null;
        $this->container['tax_year'] = $data['tax_year'] ?? null;
        $this->container['country_code'] = $data['country_code'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
        $this->container['address'] = $data['address'] ?? null;
        $this->container['city'] = $data['city'] ?? null;
        $this->container['state'] = $data['state'] ?? null;
        $this->container['zip'] = $data['zip'] ?? null;
        $this->container['foreign_province'] = $data['foreign_province'] ?? null;
        $this->container['transfer_agent_name'] = $data['transfer_agent_name'] ?? null;
        $this->container['last_filing'] = $data['last_filing'] ?? null;
        $this->container['id'] = $data['id'] ?? null;
        $this->container['created_at'] = $data['created_at'] ?? null;
        $this->container['updated_at'] = $data['updated_at'] ?? null;
        $this->container['validation_errors'] = $data['validation_errors'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['business_name'] === null) {
            $invalidProperties[] = "'business_name' can't be null";
        }
        $allowedValues = $this->getTinTypeAllowableValues();
        if (!is_null($this->container['tin_type']) && !in_array($this->container['tin_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'tin_type', must be one of '%s'",
                $this->container['tin_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['telephone'] === null) {
            $invalidProperties[] = "'telephone' can't be null";
        }
        if ($this->container['tax_year'] === null) {
            $invalidProperties[] = "'tax_year' can't be null";
        }
        if ($this->container['country_code'] === null) {
            $invalidProperties[] = "'country_code' can't be null";
        }
        if ($this->container['address'] === null) {
            $invalidProperties[] = "'address' can't be null";
        }
        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
        }
        if ($this->container['state'] === null) {
            $invalidProperties[] = "'state' can't be null";
        }
        if ($this->container['zip'] === null) {
            $invalidProperties[] = "'zip' can't be null";
        }
        if ($this->container['last_filing'] === null) {
            $invalidProperties[] = "'last_filing' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets business_name
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->container['business_name'];
    }

    /**
     * Sets business_name
     *
     * @param string $business_name Business name. Required when the recipient of the form is a business; should only be used for businesses.
     *
     * @return self
     */
    public function setBusinessName($business_name)
    {
        $this->container['business_name'] = $business_name;

        return $this;
    }

    /**
     * Gets business_name2
     *
     * @return string|null
     */
    public function getBusinessName2()
    {
        return $this->container['business_name2'];
    }

    /**
     * Sets business_name2
     *
     * @param string|null $business_name2 Business name line 2. Should only be used for businesses. Use either this or 'transferAgentName'.
     *
     * @return self
     */
    public function setBusinessName2($business_name2)
    {
        $this->container['business_name2'] = $business_name2;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     * @deprecated
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Legal name. Not the DBA name. Deprecated alias for 'businessName'.
     *
     * @return self
     * @deprecated
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets dba_name
     *
     * @return string|null
     * @deprecated
     */
    public function getDbaName()
    {
        return $this->container['dba_name'];
    }

    /**
     * Sets dba_name
     *
     * @param string|null $dba_name Doing Business As (DBA) name or continuation of a long legal name. Deprecated alias for 'businessName2'. Use either this or 'transferAgentName'.
     *
     * @return self
     * @deprecated
     */
    public function setDbaName($dba_name)
    {
        $this->container['dba_name'] = $dba_name;

        return $this;
    }

    /**
     * Gets tin_type
     *
     * @return string|null
     */
    public function getTinType()
    {
        return $this->container['tin_type'];
    }

    /**
     * Sets tin_type
     *
     * @param string|null $tin_type Recipient classification.  The platform is transitioning from tax identifier classifications to recipient entity classifications. New values represent recipient entity types and should be preferred. Deprecated values represent identifier formats and remain supported for backward compatibility only.  Available values: - INDIVIDUAL: Recipient is an individual - BUSINESS: Recipient is a business - UNKNOWN: Recipient classification is unknown - EIN: (Deprecated - use BUSINESS) Employer Identification Number - SSN: (Deprecated - use INDIVIDUAL) Social Security Number - ITIN: (Deprecated - use INDIVIDUAL) Individual Taxpayer Identification Number - ATIN: (Deprecated - use INDIVIDUAL) Adoption Taxpayer Identification Number
     *
     * @return self
     */
    public function setTinType($tin_type)
    {
        $allowedValues = $this->getTinTypeAllowableValues();
        if (!is_null($tin_type) && !in_array($tin_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'tin_type', must be one of '%s'",
                    $tin_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tin_type'] = $tin_type;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string|null $first_name First name. Required when the recipient of the form is an individual; should only be used for individuals.
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets middle_name
     *
     * @return string|null
     */
    public function getMiddleName()
    {
        return $this->container['middle_name'];
    }

    /**
     * Sets middle_name
     *
     * @param string|null $middle_name Middle name. Should only be used for individuals.
     *
     * @return self
     */
    public function setMiddleName($middle_name)
    {
        $this->container['middle_name'] = $middle_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string|null $last_name Last name. Required when the recipient of the form is an individual; should only be used for individuals.
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets suffix
     *
     * @return string|null
     */
    public function getSuffix()
    {
        return $this->container['suffix'];
    }

    /**
     * Sets suffix
     *
     * @param string|null $suffix Suffix name. Should only be used for individuals.
     *
     * @return self
     */
    public function setSuffix($suffix)
    {
        $this->container['suffix'] = $suffix;

        return $this;
    }

    /**
     * Gets tin
     *
     * @return string|null
     */
    public function getTin()
    {
        return $this->container['tin'];
    }

    /**
     * Sets tin
     *
     * @param string|null $tin Federal Tax Identification Number (TIN).
     *
     * @return self
     */
    public function setTin($tin)
    {
        $this->container['tin'] = $tin;

        return $this;
    }

    /**
     * Gets reference_id
     *
     * @return string|null
     */
    public function getReferenceId()
    {
        return $this->container['reference_id'];
    }

    /**
     * Sets reference_id
     *
     * @param string|null $reference_id Internal reference ID. Never shown to any agency or recipient. If present, it will prefix download filenames. Allowed characters: letters, numbers, dashes, underscores, and spaces.
     *
     * @return self
     */
    public function setReferenceId($reference_id)
    {
        $this->container['reference_id'] = $reference_id;

        return $this;
    }

    /**
     * Gets telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->container['telephone'];
    }

    /**
     * Sets telephone
     *
     * @param string $telephone Contact phone number (must contain at least 10 digits, max 15 characters). For recipient inquiries.
     *
     * @return self
     */
    public function setTelephone($telephone)
    {
        $this->container['telephone'] = $telephone;

        return $this;
    }

    /**
     * Gets tax_year
     *
     * @return int
     */
    public function getTaxYear()
    {
        return $this->container['tax_year'];
    }

    /**
     * Sets tax_year
     *
     * @param int $tax_year Tax year for which the forms are being filed (e.g., 2024). Must be within current tax year and current tax year - 4. It's only required on creation, and cannot be modified on update.
     *
     * @return self
     */
    public function setTaxYear($tax_year)
    {
        $this->container['tax_year'] = $tax_year;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string $country_code Two-letter IRS country code (e.g., 'US', 'CA'), as defined at https://www.irs.gov/e-file-providers/country-codes. If there is a transfer agent, use the transfer agent's shipping address.
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email Contact email address. For recipient inquiries. Phone will be used on communications if you don't specify an email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param string $address Address.
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city City.
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets state
     *
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string $state Two-letter US state or Canadian province code (required for US/CA addresses).
     *
     * @return self
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     *
     * @param string $zip ZIP/postal code.
     *
     * @return self
     */
    public function setZip($zip)
    {
        $this->container['zip'] = $zip;

        return $this;
    }

    /**
     * Gets foreign_province
     *
     * @return string|null
     */
    public function getForeignProvince()
    {
        return $this->container['foreign_province'];
    }

    /**
     * Sets foreign_province
     *
     * @param string|null $foreign_province Province or region for non-US/CA addresses.
     *
     * @return self
     */
    public function setForeignProvince($foreign_province)
    {
        $this->container['foreign_province'] = $foreign_province;

        return $this;
    }

    /**
     * Gets transfer_agent_name
     *
     * @return string|null
     */
    public function getTransferAgentName()
    {
        return $this->container['transfer_agent_name'];
    }

    /**
     * Sets transfer_agent_name
     *
     * @param string|null $transfer_agent_name Name of the transfer agent, if applicable — optional; use either this or 'dbaName'.
     *
     * @return self
     */
    public function setTransferAgentName($transfer_agent_name)
    {
        $this->container['transfer_agent_name'] = $transfer_agent_name;

        return $this;
    }

    /**
     * Gets last_filing
     *
     * @return bool
     */
    public function getLastFiling()
    {
        return $this->container['last_filing'];
    }

    /**
     * Sets last_filing
     *
     * @param bool $last_filing Indicates if this is the issuer's final year filing.
     *
     * @return self
     */
    public function setLastFiling($last_filing)
    {
        $this->container['last_filing'] = $last_filing;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id Unique identifier set when the record is created.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime|null $created_at Date time when the record was created.
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime|null $updated_at Date time when the record was last updated.
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets validation_errors
     *
     * @return \Avalara\SDK\Model\A1099\V2\ValidationError[]|null
     */
    public function getValidationErrors()
    {
        return $this->container['validation_errors'];
    }

    /**
     * Sets validation_errors
     *
     * @param \Avalara\SDK\Model\A1099\V2\ValidationError[]|null $validation_errors Field-level validation errors. Populated when a POST or PUT request violated business rules  but the issuer was still persisted. Each entry identifies the affected field and the issue.  Empty array when the payload was fully valid.
     *
     * @return self
     */
    public function setValidationErrors($validation_errors)
    {
        $this->container['validation_errors'] = $validation_errors;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset):bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset):mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value):void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset):void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize():mixed
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString():string
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue():string
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


