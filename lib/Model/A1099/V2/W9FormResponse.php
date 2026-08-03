<?php
/**
 * W9FormResponse
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
 * W9FormResponse Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class W9FormResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'W9FormResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'name' => 'string',
        'business_name' => 'string',
        'business_classification' => 'string',
        'business_other' => 'string',
        'foreign_partner_owner_or_beneficiary' => 'bool',
        'exempt_payee_code' => 'string',
        'exempt_fatca_code' => 'string',
        'foreign_country_indicator' => 'bool',
        'address' => 'string',
        'foreign_address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
        'account_number' => 'string',
        'tin_type' => 'string',
        'tin' => 'string',
        'backup_withholding' => 'bool',
        'is1099able' => 'bool',
        'tin_match_status' => '\Avalara\SDK\Model\A1099\V2\TinMatchStatusResponse',
        'id' => 'string',
        'entry_status' => '\Avalara\SDK\Model\A1099\V2\EntryStatusResponse',
        'reference_id' => 'string',
        'company_id' => 'string',
        'display_name' => 'string',
        'email' => 'string',
        'archived' => 'bool',
        'ancestor_id' => 'string',
        'signature' => 'string',
        'signed_date' => '\DateTime',
        'e_delivery_consented_at' => '\DateTime',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'name' => null,
        'business_name' => null,
        'business_classification' => null,
        'business_other' => null,
        'foreign_partner_owner_or_beneficiary' => null,
        'exempt_payee_code' => null,
        'exempt_fatca_code' => null,
        'foreign_country_indicator' => null,
        'address' => null,
        'foreign_address' => null,
        'city' => null,
        'state' => null,
        'zip' => null,
        'account_number' => null,
        'tin_type' => null,
        'tin' => null,
        'backup_withholding' => null,
        'is1099able' => null,
        'tin_match_status' => null,
        'id' => null,
        'entry_status' => null,
        'reference_id' => null,
        'company_id' => null,
        'display_name' => null,
        'email' => null,
        'archived' => null,
        'ancestor_id' => null,
        'signature' => null,
        'signed_date' => 'date-time',
        'e_delivery_consented_at' => 'date-time',
        'created_at' => 'date-time',
        'updated_at' => 'date-time'
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
        'type' => 'type',
        'name' => 'name',
        'business_name' => 'businessName',
        'business_classification' => 'businessClassification',
        'business_other' => 'businessOther',
        'foreign_partner_owner_or_beneficiary' => 'foreignPartnerOwnerOrBeneficiary',
        'exempt_payee_code' => 'exemptPayeeCode',
        'exempt_fatca_code' => 'exemptFatcaCode',
        'foreign_country_indicator' => 'foreignCountryIndicator',
        'address' => 'address',
        'foreign_address' => 'foreignAddress',
        'city' => 'city',
        'state' => 'state',
        'zip' => 'zip',
        'account_number' => 'accountNumber',
        'tin_type' => 'tinType',
        'tin' => 'tin',
        'backup_withholding' => 'backupWithholding',
        'is1099able' => 'is1099able',
        'tin_match_status' => 'tinMatchStatus',
        'id' => 'id',
        'entry_status' => 'entryStatus',
        'reference_id' => 'referenceId',
        'company_id' => 'companyId',
        'display_name' => 'displayName',
        'email' => 'email',
        'archived' => 'archived',
        'ancestor_id' => 'ancestorId',
        'signature' => 'signature',
        'signed_date' => 'signedDate',
        'e_delivery_consented_at' => 'eDeliveryConsentedAt',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'name' => 'setName',
        'business_name' => 'setBusinessName',
        'business_classification' => 'setBusinessClassification',
        'business_other' => 'setBusinessOther',
        'foreign_partner_owner_or_beneficiary' => 'setForeignPartnerOwnerOrBeneficiary',
        'exempt_payee_code' => 'setExemptPayeeCode',
        'exempt_fatca_code' => 'setExemptFatcaCode',
        'foreign_country_indicator' => 'setForeignCountryIndicator',
        'address' => 'setAddress',
        'foreign_address' => 'setForeignAddress',
        'city' => 'setCity',
        'state' => 'setState',
        'zip' => 'setZip',
        'account_number' => 'setAccountNumber',
        'tin_type' => 'setTinType',
        'tin' => 'setTin',
        'backup_withholding' => 'setBackupWithholding',
        'is1099able' => 'setIs1099able',
        'tin_match_status' => 'setTinMatchStatus',
        'id' => 'setId',
        'entry_status' => 'setEntryStatus',
        'reference_id' => 'setReferenceId',
        'company_id' => 'setCompanyId',
        'display_name' => 'setDisplayName',
        'email' => 'setEmail',
        'archived' => 'setArchived',
        'ancestor_id' => 'setAncestorId',
        'signature' => 'setSignature',
        'signed_date' => 'setSignedDate',
        'e_delivery_consented_at' => 'setEDeliveryConsentedAt',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'name' => 'getName',
        'business_name' => 'getBusinessName',
        'business_classification' => 'getBusinessClassification',
        'business_other' => 'getBusinessOther',
        'foreign_partner_owner_or_beneficiary' => 'getForeignPartnerOwnerOrBeneficiary',
        'exempt_payee_code' => 'getExemptPayeeCode',
        'exempt_fatca_code' => 'getExemptFatcaCode',
        'foreign_country_indicator' => 'getForeignCountryIndicator',
        'address' => 'getAddress',
        'foreign_address' => 'getForeignAddress',
        'city' => 'getCity',
        'state' => 'getState',
        'zip' => 'getZip',
        'account_number' => 'getAccountNumber',
        'tin_type' => 'getTinType',
        'tin' => 'getTin',
        'backup_withholding' => 'getBackupWithholding',
        'is1099able' => 'getIs1099able',
        'tin_match_status' => 'getTinMatchStatus',
        'id' => 'getId',
        'entry_status' => 'getEntryStatus',
        'reference_id' => 'getReferenceId',
        'company_id' => 'getCompanyId',
        'display_name' => 'getDisplayName',
        'email' => 'getEmail',
        'archived' => 'getArchived',
        'ancestor_id' => 'getAncestorId',
        'signature' => 'getSignature',
        'signed_date' => 'getSignedDate',
        'e_delivery_consented_at' => 'getEDeliveryConsentedAt',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt'
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

    const TYPE_W4 = 'W4';
    const TYPE_W8_BEN = 'W8Ben';
    const TYPE_W8_BEN_E = 'W8BenE';
    const TYPE_W8_IMY = 'W8Imy';
    const TYPE_W9 = 'W9';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_W4,
            self::TYPE_W8_BEN,
            self::TYPE_W8_BEN_E,
            self::TYPE_W8_IMY,
            self::TYPE_W9,
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
        $this->container['type'] = $data['type'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['business_name'] = $data['business_name'] ?? null;
        $this->container['business_classification'] = $data['business_classification'] ?? null;
        $this->container['business_other'] = $data['business_other'] ?? null;
        $this->container['foreign_partner_owner_or_beneficiary'] = $data['foreign_partner_owner_or_beneficiary'] ?? null;
        $this->container['exempt_payee_code'] = $data['exempt_payee_code'] ?? null;
        $this->container['exempt_fatca_code'] = $data['exempt_fatca_code'] ?? null;
        $this->container['foreign_country_indicator'] = $data['foreign_country_indicator'] ?? null;
        $this->container['address'] = $data['address'] ?? null;
        $this->container['foreign_address'] = $data['foreign_address'] ?? null;
        $this->container['city'] = $data['city'] ?? null;
        $this->container['state'] = $data['state'] ?? null;
        $this->container['zip'] = $data['zip'] ?? null;
        $this->container['account_number'] = $data['account_number'] ?? null;
        $this->container['tin_type'] = $data['tin_type'] ?? null;
        $this->container['tin'] = $data['tin'] ?? null;
        $this->container['backup_withholding'] = $data['backup_withholding'] ?? null;
        $this->container['is1099able'] = $data['is1099able'] ?? null;
        $this->container['tin_match_status'] = $data['tin_match_status'] ?? null;
        $this->container['id'] = $data['id'] ?? null;
        $this->container['entry_status'] = $data['entry_status'] ?? null;
        $this->container['reference_id'] = $data['reference_id'] ?? null;
        $this->container['company_id'] = $data['company_id'] ?? null;
        $this->container['display_name'] = $data['display_name'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
        $this->container['archived'] = $data['archived'] ?? null;
        $this->container['ancestor_id'] = $data['ancestor_id'] ?? null;
        $this->container['signature'] = $data['signature'] ?? null;
        $this->container['signed_date'] = $data['signed_date'] ?? null;
        $this->container['e_delivery_consented_at'] = $data['e_delivery_consented_at'] ?? null;
        $this->container['created_at'] = $data['created_at'] ?? null;
        $this->container['updated_at'] = $data['updated_at'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
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
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type The form type (always \"W9\" for this model).
     *
     * @return self
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The name of the individual or entity associated with the form.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets business_name
     *
     * @return string|null
     */
    public function getBusinessName()
    {
        return $this->container['business_name'];
    }

    /**
     * Sets business_name
     *
     * @param string|null $business_name The name of the business associated with the form.
     *
     * @return self
     */
    public function setBusinessName($business_name)
    {
        $this->container['business_name'] = $business_name;

        return $this;
    }

    /**
     * Gets business_classification
     *
     * @return string|null
     */
    public function getBusinessClassification()
    {
        return $this->container['business_classification'];
    }

    /**
     * Sets business_classification
     *
     * @param string|null $business_classification The classification of the business.
     *
     * @return self
     */
    public function setBusinessClassification($business_classification)
    {
        $this->container['business_classification'] = $business_classification;

        return $this;
    }

    /**
     * Gets business_other
     *
     * @return string|null
     */
    public function getBusinessOther()
    {
        return $this->container['business_other'];
    }

    /**
     * Sets business_other
     *
     * @param string|null $business_other The classification description when \"businessClassification\" is \"Other\".
     *
     * @return self
     */
    public function setBusinessOther($business_other)
    {
        $this->container['business_other'] = $business_other;

        return $this;
    }

    /**
     * Gets foreign_partner_owner_or_beneficiary
     *
     * @return bool|null
     */
    public function getForeignPartnerOwnerOrBeneficiary()
    {
        return $this->container['foreign_partner_owner_or_beneficiary'];
    }

    /**
     * Sets foreign_partner_owner_or_beneficiary
     *
     * @param bool|null $foreign_partner_owner_or_beneficiary Indicates whether the individual is a foreign partner, owner, or beneficiary.
     *
     * @return self
     */
    public function setForeignPartnerOwnerOrBeneficiary($foreign_partner_owner_or_beneficiary)
    {
        $this->container['foreign_partner_owner_or_beneficiary'] = $foreign_partner_owner_or_beneficiary;

        return $this;
    }

    /**
     * Gets exempt_payee_code
     *
     * @return string|null
     */
    public function getExemptPayeeCode()
    {
        return $this->container['exempt_payee_code'];
    }

    /**
     * Sets exempt_payee_code
     *
     * @param string|null $exempt_payee_code The exempt payee code.
     *
     * @return self
     */
    public function setExemptPayeeCode($exempt_payee_code)
    {
        $this->container['exempt_payee_code'] = $exempt_payee_code;

        return $this;
    }

    /**
     * Gets exempt_fatca_code
     *
     * @return string|null
     */
    public function getExemptFatcaCode()
    {
        return $this->container['exempt_fatca_code'];
    }

    /**
     * Sets exempt_fatca_code
     *
     * @param string|null $exempt_fatca_code The exemption from FATCA reporting code.
     *
     * @return self
     */
    public function setExemptFatcaCode($exempt_fatca_code)
    {
        $this->container['exempt_fatca_code'] = $exempt_fatca_code;

        return $this;
    }

    /**
     * Gets foreign_country_indicator
     *
     * @return bool|null
     */
    public function getForeignCountryIndicator()
    {
        return $this->container['foreign_country_indicator'];
    }

    /**
     * Sets foreign_country_indicator
     *
     * @param bool|null $foreign_country_indicator Indicates whether the individual or entity is in a foreign country.
     *
     * @return self
     */
    public function setForeignCountryIndicator($foreign_country_indicator)
    {
        $this->container['foreign_country_indicator'] = $foreign_country_indicator;

        return $this;
    }

    /**
     * Gets address
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param string|null $address The address of the individual or entity.
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets foreign_address
     *
     * @return string|null
     */
    public function getForeignAddress()
    {
        return $this->container['foreign_address'];
    }

    /**
     * Sets foreign_address
     *
     * @param string|null $foreign_address The foreign address of the individual or entity.
     *
     * @return self
     */
    public function setForeignAddress($foreign_address)
    {
        $this->container['foreign_address'] = $foreign_address;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string|null $city The city of the address.
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
     * @return string|null
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string|null $state The state of the address.
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
     * @return string|null
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     *
     * @param string|null $zip The ZIP code of the address.
     *
     * @return self
     */
    public function setZip($zip)
    {
        $this->container['zip'] = $zip;

        return $this;
    }

    /**
     * Gets account_number
     *
     * @return string|null
     */
    public function getAccountNumber()
    {
        return $this->container['account_number'];
    }

    /**
     * Sets account_number
     *
     * @param string|null $account_number The account number associated with the form.
     *
     * @return self
     */
    public function setAccountNumber($account_number)
    {
        $this->container['account_number'] = $account_number;

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
        $this->container['tin_type'] = $tin_type;

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
     * @param string|null $tin The taxpayer identification number (TIN).
     *
     * @return self
     */
    public function setTin($tin)
    {
        $this->container['tin'] = $tin;

        return $this;
    }

    /**
     * Gets backup_withholding
     *
     * @return bool|null
     */
    public function getBackupWithholding()
    {
        return $this->container['backup_withholding'];
    }

    /**
     * Sets backup_withholding
     *
     * @param bool|null $backup_withholding Indicates whether backup withholding applies.
     *
     * @return self
     */
    public function setBackupWithholding($backup_withholding)
    {
        $this->container['backup_withholding'] = $backup_withholding;

        return $this;
    }

    /**
     * Gets is1099able
     *
     * @return bool|null
     */
    public function getIs1099able()
    {
        return $this->container['is1099able'];
    }

    /**
     * Sets is1099able
     *
     * @param bool|null $is1099able Indicates whether the individual or entity should be issued a 1099 form.
     *
     * @return self
     */
    public function setIs1099able($is1099able)
    {
        $this->container['is1099able'] = $is1099able;

        return $this;
    }

    /**
     * Gets tin_match_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\TinMatchStatusResponse|null
     */
    public function getTinMatchStatus()
    {
        return $this->container['tin_match_status'];
    }

    /**
     * Sets tin_match_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\TinMatchStatusResponse|null $tin_match_status The TIN Match status from IRS.
     *
     * @return self
     */
    public function setTinMatchStatus($tin_match_status)
    {
        $this->container['tin_match_status'] = $tin_match_status;

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
     * @param string|null $id The unique identifier for the form.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets entry_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\EntryStatusResponse|null
     */
    public function getEntryStatus()
    {
        return $this->container['entry_status'];
    }

    /**
     * Sets entry_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\EntryStatusResponse|null $entry_status The entry status information for the form.
     *
     * @return self
     */
    public function setEntryStatus($entry_status)
    {
        $this->container['entry_status'] = $entry_status;

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
     * @param string|null $reference_id A reference identifier for the form.
     *
     * @return self
     */
    public function setReferenceId($reference_id)
    {
        $this->container['reference_id'] = $reference_id;

        return $this;
    }

    /**
     * Gets company_id
     *
     * @return string|null
     */
    public function getCompanyId()
    {
        return $this->container['company_id'];
    }

    /**
     * Sets company_id
     *
     * @param string|null $company_id The ID of the associated company.
     *
     * @return self
     */
    public function setCompanyId($company_id)
    {
        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets display_name
     *
     * @return string|null
     */
    public function getDisplayName()
    {
        return $this->container['display_name'];
    }

    /**
     * Sets display_name
     *
     * @param string|null $display_name The display name associated with the form.
     *
     * @return self
     */
    public function setDisplayName($display_name)
    {
        $this->container['display_name'] = $display_name;

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
     * @param string|null $email The email address of the individual associated with the form.
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets archived
     *
     * @return bool|null
     */
    public function getArchived()
    {
        return $this->container['archived'];
    }

    /**
     * Sets archived
     *
     * @param bool|null $archived Indicates whether the form is archived.
     *
     * @return self
     */
    public function setArchived($archived)
    {
        $this->container['archived'] = $archived;

        return $this;
    }

    /**
     * Gets ancestor_id
     *
     * @return string|null
     */
    public function getAncestorId()
    {
        return $this->container['ancestor_id'];
    }

    /**
     * Sets ancestor_id
     *
     * @param string|null $ancestor_id Form ID of previous version.
     *
     * @return self
     */
    public function setAncestorId($ancestor_id)
    {
        $this->container['ancestor_id'] = $ancestor_id;

        return $this;
    }

    /**
     * Gets signature
     *
     * @return string|null
     */
    public function getSignature()
    {
        return $this->container['signature'];
    }

    /**
     * Sets signature
     *
     * @param string|null $signature The signature of the form.
     *
     * @return self
     */
    public function setSignature($signature)
    {
        $this->container['signature'] = $signature;

        return $this;
    }

    /**
     * Gets signed_date
     *
     * @return \DateTime|null
     */
    public function getSignedDate()
    {
        return $this->container['signed_date'];
    }

    /**
     * Sets signed_date
     *
     * @param \DateTime|null $signed_date The date the form was signed.
     *
     * @return self
     */
    public function setSignedDate($signed_date)
    {
        $this->container['signed_date'] = $signed_date;

        return $this;
    }

    /**
     * Gets e_delivery_consented_at
     *
     * @return \DateTime|null
     */
    public function getEDeliveryConsentedAt()
    {
        return $this->container['e_delivery_consented_at'];
    }

    /**
     * Sets e_delivery_consented_at
     *
     * @param \DateTime|null $e_delivery_consented_at The date when e-delivery was consented.
     *
     * @return self
     */
    public function setEDeliveryConsentedAt($e_delivery_consented_at)
    {
        $this->container['e_delivery_consented_at'] = $e_delivery_consented_at;

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
     * @param \DateTime|null $created_at The creation date of the form.
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
     * @param \DateTime|null $updated_at The last updated date of the form.
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

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


