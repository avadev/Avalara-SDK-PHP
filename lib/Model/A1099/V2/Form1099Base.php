<?php
/**
 * Form1099Base
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
 * Form1099Base Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Form1099Base implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Form1099Base';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'id' => 'string',
        'issuer_id' => 'string',
        'issuer_reference_id' => 'string',
        'issuer_tin' => 'string',
        'tax_year' => 'int',
        'reference_id' => 'string',
        'tin' => 'string',
        'recipient_name' => 'string',
        'recipient_second_name' => 'string',
        'address' => 'string',
        'address2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
        'email' => 'string',
        'non_us_province' => 'string',
        'country_code' => 'string',
        'federal_efile_date' => '\DateTime',
        'postal_mail' => 'bool',
        'state_efile_date' => '\DateTime',
        'recipient_edelivery_date' => '\DateTime',
        'tin_match' => 'bool',
        'address_verification' => 'bool',
        'state_and_local_withholding' => '\Avalara\SDK\Model\A1099\V2\StateAndLocalWithholding',
        'federal_efile_status' => '\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail',
        'state_efile_status' => '\Avalara\SDK\Model\A1099\V2\StateEfileStatusDetail[]',
        'postal_mail_status' => '\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail',
        'tin_match_status' => '\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail',
        'address_verification_status' => '\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail',
        'e_delivery_status' => '\Avalara\SDK\Model\A1099\V2\Form1099StatusDetail',
        'validation_errors' => '\Avalara\SDK\Model\A1099\V2\ValidationError[]',
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
        'id' => null,
        'issuer_id' => null,
        'issuer_reference_id' => null,
        'issuer_tin' => null,
        'tax_year' => 'int32',
        'reference_id' => null,
        'tin' => null,
        'recipient_name' => null,
        'recipient_second_name' => null,
        'address' => null,
        'address2' => null,
        'city' => null,
        'state' => null,
        'zip' => null,
        'email' => null,
        'non_us_province' => null,
        'country_code' => null,
        'federal_efile_date' => 'date',
        'postal_mail' => null,
        'state_efile_date' => 'date',
        'recipient_edelivery_date' => 'date',
        'tin_match' => null,
        'address_verification' => null,
        'state_and_local_withholding' => null,
        'federal_efile_status' => null,
        'state_efile_status' => null,
        'postal_mail_status' => null,
        'tin_match_status' => null,
        'address_verification_status' => null,
        'e_delivery_status' => null,
        'validation_errors' => null,
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
        'id' => 'id',
        'issuer_id' => 'issuerId',
        'issuer_reference_id' => 'issuerReferenceId',
        'issuer_tin' => 'issuerTin',
        'tax_year' => 'taxYear',
        'reference_id' => 'referenceId',
        'tin' => 'tin',
        'recipient_name' => 'recipientName',
        'recipient_second_name' => 'recipientSecondName',
        'address' => 'address',
        'address2' => 'address2',
        'city' => 'city',
        'state' => 'state',
        'zip' => 'zip',
        'email' => 'email',
        'non_us_province' => 'nonUsProvince',
        'country_code' => 'countryCode',
        'federal_efile_date' => 'federalEfileDate',
        'postal_mail' => 'postalMail',
        'state_efile_date' => 'stateEfileDate',
        'recipient_edelivery_date' => 'recipientEdeliveryDate',
        'tin_match' => 'tinMatch',
        'address_verification' => 'addressVerification',
        'state_and_local_withholding' => 'stateAndLocalWithholding',
        'federal_efile_status' => 'federalEfileStatus',
        'state_efile_status' => 'stateEfileStatus',
        'postal_mail_status' => 'postalMailStatus',
        'tin_match_status' => 'tinMatchStatus',
        'address_verification_status' => 'addressVerificationStatus',
        'e_delivery_status' => 'eDeliveryStatus',
        'validation_errors' => 'validationErrors',
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
        'id' => 'setId',
        'issuer_id' => 'setIssuerId',
        'issuer_reference_id' => 'setIssuerReferenceId',
        'issuer_tin' => 'setIssuerTin',
        'tax_year' => 'setTaxYear',
        'reference_id' => 'setReferenceId',
        'tin' => 'setTin',
        'recipient_name' => 'setRecipientName',
        'recipient_second_name' => 'setRecipientSecondName',
        'address' => 'setAddress',
        'address2' => 'setAddress2',
        'city' => 'setCity',
        'state' => 'setState',
        'zip' => 'setZip',
        'email' => 'setEmail',
        'non_us_province' => 'setNonUsProvince',
        'country_code' => 'setCountryCode',
        'federal_efile_date' => 'setFederalEfileDate',
        'postal_mail' => 'setPostalMail',
        'state_efile_date' => 'setStateEfileDate',
        'recipient_edelivery_date' => 'setRecipientEdeliveryDate',
        'tin_match' => 'setTinMatch',
        'address_verification' => 'setAddressVerification',
        'state_and_local_withholding' => 'setStateAndLocalWithholding',
        'federal_efile_status' => 'setFederalEfileStatus',
        'state_efile_status' => 'setStateEfileStatus',
        'postal_mail_status' => 'setPostalMailStatus',
        'tin_match_status' => 'setTinMatchStatus',
        'address_verification_status' => 'setAddressVerificationStatus',
        'e_delivery_status' => 'setEDeliveryStatus',
        'validation_errors' => 'setValidationErrors',
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
        'id' => 'getId',
        'issuer_id' => 'getIssuerId',
        'issuer_reference_id' => 'getIssuerReferenceId',
        'issuer_tin' => 'getIssuerTin',
        'tax_year' => 'getTaxYear',
        'reference_id' => 'getReferenceId',
        'tin' => 'getTin',
        'recipient_name' => 'getRecipientName',
        'recipient_second_name' => 'getRecipientSecondName',
        'address' => 'getAddress',
        'address2' => 'getAddress2',
        'city' => 'getCity',
        'state' => 'getState',
        'zip' => 'getZip',
        'email' => 'getEmail',
        'non_us_province' => 'getNonUsProvince',
        'country_code' => 'getCountryCode',
        'federal_efile_date' => 'getFederalEfileDate',
        'postal_mail' => 'getPostalMail',
        'state_efile_date' => 'getStateEfileDate',
        'recipient_edelivery_date' => 'getRecipientEdeliveryDate',
        'tin_match' => 'getTinMatch',
        'address_verification' => 'getAddressVerification',
        'state_and_local_withholding' => 'getStateAndLocalWithholding',
        'federal_efile_status' => 'getFederalEfileStatus',
        'state_efile_status' => 'getStateEfileStatus',
        'postal_mail_status' => 'getPostalMailStatus',
        'tin_match_status' => 'getTinMatchStatus',
        'address_verification_status' => 'getAddressVerificationStatus',
        'e_delivery_status' => 'getEDeliveryStatus',
        'validation_errors' => 'getValidationErrors',
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

    const TYPE__1042_S = '1042-S';
    const TYPE__1095_B = '1095-B';
    const TYPE__1095_C = '1095-C';
    const TYPE__1099_DIV = '1099-DIV';
    const TYPE__1099_INT = '1099-INT';
    const TYPE__1099_K = '1099-K';
    const TYPE__1099_MISC = '1099-MISC';
    const TYPE__1099_NEC = '1099-NEC';
    const TYPE__1099_R = '1099-R';
    const TYPE_W_2 = 'W-2';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE__1042_S,
            self::TYPE__1095_B,
            self::TYPE__1095_C,
            self::TYPE__1099_DIV,
            self::TYPE__1099_INT,
            self::TYPE__1099_K,
            self::TYPE__1099_MISC,
            self::TYPE__1099_NEC,
            self::TYPE__1099_R,
            self::TYPE_W_2,
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
        $this->container['id'] = $data['id'] ?? null;
        $this->container['issuer_id'] = $data['issuer_id'] ?? null;
        $this->container['issuer_reference_id'] = $data['issuer_reference_id'] ?? null;
        $this->container['issuer_tin'] = $data['issuer_tin'] ?? null;
        $this->container['tax_year'] = $data['tax_year'] ?? null;
        $this->container['reference_id'] = $data['reference_id'] ?? null;
        $this->container['tin'] = $data['tin'] ?? null;
        $this->container['recipient_name'] = $data['recipient_name'] ?? null;
        $this->container['recipient_second_name'] = $data['recipient_second_name'] ?? null;
        $this->container['address'] = $data['address'] ?? null;
        $this->container['address2'] = $data['address2'] ?? null;
        $this->container['city'] = $data['city'] ?? null;
        $this->container['state'] = $data['state'] ?? null;
        $this->container['zip'] = $data['zip'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
        $this->container['non_us_province'] = $data['non_us_province'] ?? null;
        $this->container['country_code'] = $data['country_code'] ?? null;
        $this->container['federal_efile_date'] = $data['federal_efile_date'] ?? null;
        $this->container['postal_mail'] = $data['postal_mail'] ?? null;
        $this->container['state_efile_date'] = $data['state_efile_date'] ?? null;
        $this->container['recipient_edelivery_date'] = $data['recipient_edelivery_date'] ?? null;
        $this->container['tin_match'] = $data['tin_match'] ?? null;
        $this->container['address_verification'] = $data['address_verification'] ?? null;
        $this->container['state_and_local_withholding'] = $data['state_and_local_withholding'] ?? null;
        $this->container['federal_efile_status'] = $data['federal_efile_status'] ?? null;
        $this->container['state_efile_status'] = $data['state_efile_status'] ?? null;
        $this->container['postal_mail_status'] = $data['postal_mail_status'] ?? null;
        $this->container['tin_match_status'] = $data['tin_match_status'] ?? null;
        $this->container['address_verification_status'] = $data['address_verification_status'] ?? null;
        $this->container['e_delivery_status'] = $data['e_delivery_status'] ?? null;
        $this->container['validation_errors'] = $data['validation_errors'] ?? null;
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

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['address'] === null) {
            $invalidProperties[] = "'address' can't be null";
        }
        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
        }
        if ($this->container['country_code'] === null) {
            $invalidProperties[] = "'country_code' can't be null";
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
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Form type.
     *
     * @return self
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
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
     * @param string|null $id Form ID. Unique identifier set when the record is created.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets issuer_id
     *
     * @return string|null
     */
    public function getIssuerId()
    {
        return $this->container['issuer_id'];
    }

    /**
     * Sets issuer_id
     *
     * @param string|null $issuer_id Issuer ID - only required when creating forms
     *
     * @return self
     */
    public function setIssuerId($issuer_id)
    {
        $this->container['issuer_id'] = $issuer_id;

        return $this;
    }

    /**
     * Gets issuer_reference_id
     *
     * @return string|null
     */
    public function getIssuerReferenceId()
    {
        return $this->container['issuer_reference_id'];
    }

    /**
     * Sets issuer_reference_id
     *
     * @param string|null $issuer_reference_id Issuer Reference ID - only required when creating forms via $bulk-upsert
     *
     * @return self
     */
    public function setIssuerReferenceId($issuer_reference_id)
    {
        $this->container['issuer_reference_id'] = $issuer_reference_id;

        return $this;
    }

    /**
     * Gets issuer_tin
     *
     * @return string|null
     */
    public function getIssuerTin()
    {
        return $this->container['issuer_tin'];
    }

    /**
     * Sets issuer_tin
     *
     * @param string|null $issuer_tin Issuer TIN - readonly
     *
     * @return self
     */
    public function setIssuerTin($issuer_tin)
    {
        $this->container['issuer_tin'] = $issuer_tin;

        return $this;
    }

    /**
     * Gets tax_year
     *
     * @return int|null
     */
    public function getTaxYear()
    {
        return $this->container['tax_year'];
    }

    /**
     * Sets tax_year
     *
     * @param int|null $tax_year Tax Year - only required when creating forms via $bulk-upsert
     *
     * @return self
     */
    public function setTaxYear($tax_year)
    {
        $this->container['tax_year'] = $tax_year;

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
     * @param string|null $reference_id Internal reference ID. Never shown to any agency or recipient.
     *
     * @return self
     */
    public function setReferenceId($reference_id)
    {
        $this->container['reference_id'] = $reference_id;

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
     * @param string|null $tin Recipient's Federal Tax Identification Number (TIN).
     *
     * @return self
     */
    public function setTin($tin)
    {
        $this->container['tin'] = $tin;

        return $this;
    }

    /**
     * Gets recipient_name
     *
     * @return string|null
     * @deprecated
     */
    public function getRecipientName()
    {
        return $this->container['recipient_name'];
    }

    /**
     * Sets recipient_name
     *
     * @param string|null $recipient_name DEPRECATED: Use `businessName` for businesses; use `firstName`, `middleName`, `lastName`, and `suffixName` for individuals.
     *
     * @return self
     * @deprecated
     */
    public function setRecipientName($recipient_name)
    {
        $this->container['recipient_name'] = $recipient_name;

        return $this;
    }

    /**
     * Gets recipient_second_name
     *
     * @return string|null
     * @deprecated
     */
    public function getRecipientSecondName()
    {
        return $this->container['recipient_second_name'];
    }

    /**
     * Sets recipient_second_name
     *
     * @param string|null $recipient_second_name DEPRECATED: Use `businessName2` instead.
     *
     * @return self
     * @deprecated
     */
    public function setRecipientSecondName($recipient_second_name)
    {
        $this->container['recipient_second_name'] = $recipient_second_name;

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
     * Gets address2
     *
     * @return string|null
     */
    public function getAddress2()
    {
        return $this->container['address2'];
    }

    /**
     * Sets address2
     *
     * @param string|null $address2 Address line 2.
     *
     * @return self
     */
    public function setAddress2($address2)
    {
        $this->container['address2'] = $address2;

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
     * @return string|null
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string|null $state Two-letter US state or Canadian province code (required for US/CA addresses).
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
     * @param string|null $zip ZIP/postal code.
     *
     * @return self
     */
    public function setZip($zip)
    {
        $this->container['zip'] = $zip;

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
     * @param string|null $email Recipient's Contact email address.
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets non_us_province
     *
     * @return string|null
     */
    public function getNonUsProvince()
    {
        return $this->container['non_us_province'];
    }

    /**
     * Sets non_us_province
     *
     * @param string|null $non_us_province Province or region for non-US/CA addresses.
     *
     * @return self
     */
    public function setNonUsProvince($non_us_province)
    {
        $this->container['non_us_province'] = $non_us_province;

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
     * @param string $country_code Two-letter IRS country code (e.g., 'US', 'CA'), as defined at https://www.irs.gov/e-file-providers/country-codes.
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets federal_efile_date
     *
     * @return \DateTime|null
     */
    public function getFederalEfileDate()
    {
        return $this->container['federal_efile_date'];
    }

    /**
     * Sets federal_efile_date
     *
     * @param \DateTime|null $federal_efile_date Date when federal e-filing should be scheduled. If set between current date and beginning of blackout period, scheduled to that date. If in the past or blackout period, scheduled to next available date. For blackout period information, see https://www.track1099.com/info/IRS_info. Set to null to leave unscheduled.
     *
     * @return self
     */
    public function setFederalEfileDate($federal_efile_date)
    {
        $this->container['federal_efile_date'] = $federal_efile_date;

        return $this;
    }

    /**
     * Gets postal_mail
     *
     * @return bool|null
     */
    public function getPostalMail()
    {
        return $this->container['postal_mail'];
    }

    /**
     * Sets postal_mail
     *
     * @param bool|null $postal_mail Boolean indicating that postal mailing to the recipient should be scheduled for this form
     *
     * @return self
     */
    public function setPostalMail($postal_mail)
    {
        $this->container['postal_mail'] = $postal_mail;

        return $this;
    }

    /**
     * Gets state_efile_date
     *
     * @return \DateTime|null
     */
    public function getStateEfileDate()
    {
        return $this->container['state_efile_date'];
    }

    /**
     * Sets state_efile_date
     *
     * @param \DateTime|null $state_efile_date Date when state e-filing should be scheduled. Must be on or after federalEfileDate. If set between current date and beginning of blackout period, scheduled to that date. If in the past or blackout period, scheduled to next available date. For blackout period information, see https://www.track1099.com/info/IRS_info. Set to null to leave unscheduled.
     *
     * @return self
     */
    public function setStateEfileDate($state_efile_date)
    {
        $this->container['state_efile_date'] = $state_efile_date;

        return $this;
    }

    /**
     * Gets recipient_edelivery_date
     *
     * @return \DateTime|null
     */
    public function getRecipientEdeliveryDate()
    {
        return $this->container['recipient_edelivery_date'];
    }

    /**
     * Sets recipient_edelivery_date
     *
     * @param \DateTime|null $recipient_edelivery_date Date when recipient e-delivery should be scheduled. If set between current date and beginning of blackout period, scheduled to that date. If in the past or blackout period, scheduled to next available date. For blackout period information, see https://www.track1099.com/info/IRS_info. Set to null to leave unscheduled.
     *
     * @return self
     */
    public function setRecipientEdeliveryDate($recipient_edelivery_date)
    {
        $this->container['recipient_edelivery_date'] = $recipient_edelivery_date;

        return $this;
    }

    /**
     * Gets tin_match
     *
     * @return bool|null
     */
    public function getTinMatch()
    {
        return $this->container['tin_match'];
    }

    /**
     * Sets tin_match
     *
     * @param bool|null $tin_match Boolean indicating that TIN Matching should be scheduled for this form
     *
     * @return self
     */
    public function setTinMatch($tin_match)
    {
        $this->container['tin_match'] = $tin_match;

        return $this;
    }

    /**
     * Gets address_verification
     *
     * @return bool|null
     */
    public function getAddressVerification()
    {
        return $this->container['address_verification'];
    }

    /**
     * Sets address_verification
     *
     * @param bool|null $address_verification Boolean indicating that address verification should be scheduled for this form
     *
     * @return self
     */
    public function setAddressVerification($address_verification)
    {
        $this->container['address_verification'] = $address_verification;

        return $this;
    }

    /**
     * Gets state_and_local_withholding
     *
     * @return \Avalara\SDK\Model\A1099\V2\StateAndLocalWithholding|null
     */
    public function getStateAndLocalWithholding()
    {
        return $this->container['state_and_local_withholding'];
    }

    /**
     * Sets state_and_local_withholding
     *
     * @param \Avalara\SDK\Model\A1099\V2\StateAndLocalWithholding|null $state_and_local_withholding State and local withholding information
     *
     * @return self
     */
    public function setStateAndLocalWithholding($state_and_local_withholding)
    {
        $this->container['state_and_local_withholding'] = $state_and_local_withholding;

        return $this;
    }

    /**
     * Gets federal_efile_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null
     */
    public function getFederalEfileStatus()
    {
        return $this->container['federal_efile_status'];
    }

    /**
     * Sets federal_efile_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null $federal_efile_status Federal e-file status.  Available values:  - unscheduled: Form has not been scheduled for federal e-filing  - scheduled: Form is scheduled for federal e-filing  - airlock: Form is in process of being uploaded to the IRS (forms exist in this state for a very short period and cannot be updated while in this state)  - sent: Form has been sent to the IRS  - accepted: Form was accepted by the IRS  - corrected_scheduled: Correction is scheduled to be sent  - corrected_airlock: Correction is in process of being uploaded to the IRS (forms exist in this state for a very short period and cannot be updated while in this state)  - corrected: A correction has been sent to the IRS  - corrected_accepted: Correction was accepted by the IRS  - rejected: Form was rejected by the IRS  - corrected_rejected: Correction was rejected by the IRS  - held: Form is held and will not be submitted to IRS (used for certain forms submitted only to states)
     *
     * @return self
     */
    public function setFederalEfileStatus($federal_efile_status)
    {
        $this->container['federal_efile_status'] = $federal_efile_status;

        return $this;
    }

    /**
     * Gets state_efile_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\StateEfileStatusDetail[]|null
     */
    public function getStateEfileStatus()
    {
        return $this->container['state_efile_status'];
    }

    /**
     * Sets state_efile_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\StateEfileStatusDetail[]|null $state_efile_status State e-file status.  Available values:  - unscheduled: Form has not been scheduled for state e-filing  - scheduled: Form is scheduled for state e-filing  - airlocked: Form is in process of being uploaded to the state  - sent: Form has been sent to the state  - rejected: Form was rejected by the state  - accepted: Form was accepted by the state  - corrected_scheduled: Correction is scheduled to be sent  - corrected_airlocked: Correction is in process of being uploaded to the state  - corrected_sent: Correction has been sent to the state  - corrected_rejected: Correction was rejected by the state  - corrected_accepted: Correction was accepted by the state
     *
     * @return self
     */
    public function setStateEfileStatus($state_efile_status)
    {
        $this->container['state_efile_status'] = $state_efile_status;

        return $this;
    }

    /**
     * Gets postal_mail_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null
     */
    public function getPostalMailStatus()
    {
        return $this->container['postal_mail_status'];
    }

    /**
     * Sets postal_mail_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null $postal_mail_status Postal mail to recipient status.  Available values:  - unscheduled: Postal mail has not been scheduled  - pending: Postal mail is pending to be sent  - sent: Postal mail has been sent  - delivered: Postal mail has been delivered
     *
     * @return self
     */
    public function setPostalMailStatus($postal_mail_status)
    {
        $this->container['postal_mail_status'] = $postal_mail_status;

        return $this;
    }

    /**
     * Gets tin_match_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null
     */
    public function getTinMatchStatus()
    {
        return $this->container['tin_match_status'];
    }

    /**
     * Sets tin_match_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null $tin_match_status TIN Match status.  Available values:  - none: TIN matching has not been performed  - pending: TIN matching request is pending  - matched: Name/TIN combination matches IRS records  - unknown: TIN is missing, invalid, or request contains errors  - rejected: Name/TIN combination does not match IRS records or TIN not currently issued
     *
     * @return self
     */
    public function setTinMatchStatus($tin_match_status)
    {
        $this->container['tin_match_status'] = $tin_match_status;

        return $this;
    }

    /**
     * Gets address_verification_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null
     */
    public function getAddressVerificationStatus()
    {
        return $this->container['address_verification_status'];
    }

    /**
     * Sets address_verification_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null $address_verification_status Address verification status.  Available values:  - unknown: Address verification has not been checked  - pending: Address verification is in progress  - failed: Address verification failed  - incomplete: Address verification is incomplete  - unchanged: User declined address changes  - verified: Address has been verified and accepted
     *
     * @return self
     */
    public function setAddressVerificationStatus($address_verification_status)
    {
        $this->container['address_verification_status'] = $address_verification_status;

        return $this;
    }

    /**
     * Gets e_delivery_status
     *
     * @return \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null
     */
    public function getEDeliveryStatus()
    {
        return $this->container['e_delivery_status'];
    }

    /**
     * Sets e_delivery_status
     *
     * @param \Avalara\SDK\Model\A1099\V2\Form1099StatusDetail|null $e_delivery_status EDelivery status.  Available values:  - unscheduled: E-delivery has not been scheduled  - scheduled: E-delivery is scheduled to be sent  - sent: E-delivery has been sent to recipient  - bounced: E-delivery bounced back (invalid email)  - refused: E-delivery was refused by recipient  - bad_verify: E-delivery failed verification  - accepted: E-delivery was accepted by recipient  - bad_verify_limit: E-delivery failed verification limit reached  - second_delivery: Second e-delivery attempt  - undelivered: E-delivery is undelivered (temporary state allowing resend)
     *
     * @return self
     */
    public function setEDeliveryStatus($e_delivery_status)
    {
        $this->container['e_delivery_status'] = $e_delivery_status;

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
     * @param \Avalara\SDK\Model\A1099\V2\ValidationError[]|null $validation_errors Validation errors
     *
     * @return self
     */
    public function setValidationErrors($validation_errors)
    {
        $this->container['validation_errors'] = $validation_errors;

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


