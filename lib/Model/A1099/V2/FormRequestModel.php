<?php
/**
 * FormRequestModel
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
 * ## 🔐 Authentication  Use **username/password** or generate a **license key** from: *Avalara Portal → Settings → License and API Keys*.  [More on authentication methods](https://developer.avalara.com/avatax-dm-combined-erp/common-setup/authentication/authentication-methods/)  [Test your credentials](https://developer.avalara.com/avatax/test-credentials/)  ## 📘 API & SDK Documentation  [Avalara SDK (.NET) on GitHub](https://github.com/avadev/Avalara-SDK-DotNet#avalarasdk--the-unified-c-library-for-next-gen-avalara-services)  [Code Examples – 1099 API](https://github.com/avadev/Avalara-SDK-DotNet/blob/main/docs/A1099/V2/Class1099IssuersApi.md#call1099issuersget)
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
 * FormRequestModel Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class FormRequestModel implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FormRequestModel';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'type' => 'string',
        'form_type' => 'string',
        'company_id' => 'int',
        'company_name' => 'string',
        'company_email' => 'string',
        'reference_id' => 'string',
        'signed_at' => '\DateTime',
        'tin_match_status' => 'string',
        'expires_at' => '\DateTime',
        'signed_pdf' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'type' => null,
        'form_type' => null,
        'company_id' => 'int32',
        'company_name' => null,
        'company_email' => null,
        'reference_id' => null,
        'signed_at' => 'date-time',
        'tin_match_status' => null,
        'expires_at' => 'date-time',
        'signed_pdf' => null
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
        'id' => 'id',
        'type' => 'type',
        'form_type' => 'formType',
        'company_id' => 'companyId',
        'company_name' => 'companyName',
        'company_email' => 'companyEmail',
        'reference_id' => 'referenceId',
        'signed_at' => 'signedAt',
        'tin_match_status' => 'tinMatchStatus',
        'expires_at' => 'expiresAt',
        'signed_pdf' => 'signedPdf'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'type' => 'setType',
        'form_type' => 'setFormType',
        'company_id' => 'setCompanyId',
        'company_name' => 'setCompanyName',
        'company_email' => 'setCompanyEmail',
        'reference_id' => 'setReferenceId',
        'signed_at' => 'setSignedAt',
        'tin_match_status' => 'setTinMatchStatus',
        'expires_at' => 'setExpiresAt',
        'signed_pdf' => 'setSignedPdf'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'type' => 'getType',
        'form_type' => 'getFormType',
        'company_id' => 'getCompanyId',
        'company_name' => 'getCompanyName',
        'company_email' => 'getCompanyEmail',
        'reference_id' => 'getReferenceId',
        'signed_at' => 'getSignedAt',
        'tin_match_status' => 'getTinMatchStatus',
        'expires_at' => 'getExpiresAt',
        'signed_pdf' => 'getSignedPdf'
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

    const TYPE_FORM_REQUEST = 'FormRequest';
    const FORM_TYPE_W9 = 'W9';
    const TIN_MATCH_STATUS_NONE = 'None';
    const TIN_MATCH_STATUS_MATCHED = 'Matched';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_FORM_REQUEST,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFormTypeAllowableValues()
    {
        return [
            self::FORM_TYPE_W9,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTinMatchStatusAllowableValues()
    {
        return [
            self::TIN_MATCH_STATUS_NONE,
            self::TIN_MATCH_STATUS_MATCHED,
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
        $this->container['id'] = $data['id'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['form_type'] = $data['form_type'] ?? null;
        $this->container['company_id'] = $data['company_id'] ?? null;
        $this->container['company_name'] = $data['company_name'] ?? null;
        $this->container['company_email'] = $data['company_email'] ?? null;
        $this->container['reference_id'] = $data['reference_id'] ?? null;
        $this->container['signed_at'] = $data['signed_at'] ?? null;
        $this->container['tin_match_status'] = $data['tin_match_status'] ?? null;
        $this->container['expires_at'] = $data['expires_at'] ?? null;
        $this->container['signed_pdf'] = $data['signed_pdf'] ?? null;
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

        $allowedValues = $this->getFormTypeAllowableValues();
        if (!is_null($this->container['form_type']) && !in_array($this->container['form_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'form_type', must be one of '%s'",
                $this->container['form_type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTinMatchStatusAllowableValues();
        if (!is_null($this->container['tin_match_status']) && !in_array($this->container['tin_match_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'tin_match_status', must be one of '%s'",
                $this->container['tin_match_status'],
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
     * @param string|null $id id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
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
     * @param string|null $type type
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
     * Gets form_type
     *
     * @return string|null
     */
    public function getFormType()
    {
        return $this->container['form_type'];
    }

    /**
     * Sets form_type
     *
     * @param string|null $form_type \"W9\" is currently the only supported value
     *
     * @return self
     */
    public function setFormType($form_type)
    {
        $allowedValues = $this->getFormTypeAllowableValues();
        if (!is_null($form_type) && !in_array($form_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'form_type', must be one of '%s'",
                    $form_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['form_type'] = $form_type;

        return $this;
    }

    /**
     * Gets company_id
     *
     * @return int|null
     */
    public function getCompanyId()
    {
        return $this->container['company_id'];
    }

    /**
     * Sets company_id
     *
     * @param int|null $company_id Track1099's ID of your company, found in the W-9 UI
     *
     * @return self
     */
    public function setCompanyId($company_id)
    {
        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets company_name
     *
     * @return string|null
     */
    public function getCompanyName()
    {
        return $this->container['company_name'];
    }

    /**
     * Sets company_name
     *
     * @param string|null $company_name Name of your company, set in the W-9 UI
     *
     * @return self
     */
    public function setCompanyName($company_name)
    {
        $this->container['company_name'] = $company_name;

        return $this;
    }

    /**
     * Gets company_email
     *
     * @return string|null
     */
    public function getCompanyEmail()
    {
        return $this->container['company_email'];
    }

    /**
     * Sets company_email
     *
     * @param string|null $company_email Contact email of your company, set in the W-9 UI
     *
     * @return self
     */
    public function setCompanyEmail($company_email)
    {
        $this->container['company_email'] = $company_email;

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
     * @param string|null $reference_id Your internal identifier for the vendor from whom you are requesting a form
     *
     * @return self
     */
    public function setReferenceId($reference_id)
    {
        $this->container['reference_id'] = $reference_id;

        return $this;
    }

    /**
     * Gets signed_at
     *
     * @return \DateTime|null
     */
    public function getSignedAt()
    {
        return $this->container['signed_at'];
    }

    /**
     * Sets signed_at
     *
     * @param \DateTime|null $signed_at The timestamp this vendor (identified by your ReferenceId) last signed a complete W-9, null if you did not include a ReferenceId or the vendor has not yet signed a W-9 in Track1099
     *
     * @return self
     */
    public function setSignedAt($signed_at)
    {
        $this->container['signed_at'] = $signed_at;

        return $this;
    }

    /**
     * Gets tin_match_status
     *
     * @return string|null
     */
    public function getTinMatchStatus()
    {
        return $this->container['tin_match_status'];
    }

    /**
     * Sets tin_match_status
     *
     * @param string|null $tin_match_status Result of IRS TIN match query for name and TIN in the last signed form, null if signed_at is null
     *
     * @return self
     */
    public function setTinMatchStatus($tin_match_status)
    {
        $allowedValues = $this->getTinMatchStatusAllowableValues();
        if (!is_null($tin_match_status) && !in_array($tin_match_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'tin_match_status', must be one of '%s'",
                    $tin_match_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tin_match_status'] = $tin_match_status;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return \DateTime|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param \DateTime|null $expires_at Timestamp when this FormRequest will expire, ttl (or 3600) seconds from creation
     *
     * @return self
     */
    public function setExpiresAt($expires_at)
    {
        $this->container['expires_at'] = $expires_at;

        return $this;
    }

    /**
     * Gets signed_pdf
     *
     * @return string|null
     */
    public function getSignedPdf()
    {
        return $this->container['signed_pdf'];
    }

    /**
     * Sets signed_pdf
     *
     * @param string|null $signed_pdf URL of PDF representation of just-signed form, otherwise null. Integrations may use this value to offer a \"download for your records\" function after a vendor completes and signs a form. Link expires at the same time as this FormRequest. Treat the format of this URL as opaque and expect it to change in the future.
     *
     * @return self
     */
    public function setSignedPdf($signed_pdf)
    {
        $this->container['signed_pdf'] = $signed_pdf;

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


