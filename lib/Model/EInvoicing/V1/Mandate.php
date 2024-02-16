<?php
/**
 * Mandate
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
 * (c) 2004-2022 Avalara, Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Avalara E-Invoicing API
 *
 * An API that supports sending data for an E-Invoicing compliance use-case.
 *
 * @category   Avalara client libraries
 * @package    Avalara\SDK\API\EInvoicing\V1
 * @author     Sachin Baijal <sachin.baijal@avalara.com>
 * @author     Jonathan Wenger <jonathan.wenger@avalara.com>
 * @copyright  2004-2022 Avalara, Inc.
 * @license    https://www.apache.org/licenses/LICENSE-2.0
 * @version    
 * @link       https://github.com/avadev/AvaTax-REST-V3-PHP-SDK

 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Avalara\SDK\Model\EInvoicing\V1;

use \ArrayAccess;
use \Avalara\SDK\ObjectSerializer;
use \Avalara\SDK\Model\ModelInterface;
/**
 * Mandate Class Doc Comment
 *
 * @category Class
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Mandate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Mandate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'mandate_id' => 'string',
        'country_mandate' => 'string',
        'country_code' => 'string',
        'description' => 'string',
        'supported_by_partner_api' => 'bool',
        'mandate_format' => 'string',
        'input_data_formats' => '\Avalara\SDK\Model\EInvoicing\V1\InputDataFormats[]',
        'workflow_ids' => '\Avalara\SDK\Model\EInvoicing\V1\WorkflowIds[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'mandate_id' => null,
        'country_mandate' => null,
        'country_code' => null,
        'description' => null,
        'supported_by_partner_api' => null,
        'mandate_format' => null,
        'input_data_formats' => null,
        'workflow_ids' => null
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
        'mandate_id' => 'mandateId',
        'country_mandate' => 'countryMandate',
        'country_code' => 'countryCode',
        'description' => 'description',
        'supported_by_partner_api' => 'supportedByPartnerAPI',
        'mandate_format' => 'mandateFormat',
        'input_data_formats' => 'inputDataFormats',
        'workflow_ids' => 'workflowIds'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'mandate_id' => 'setMandateId',
        'country_mandate' => 'setCountryMandate',
        'country_code' => 'setCountryCode',
        'description' => 'setDescription',
        'supported_by_partner_api' => 'setSupportedByPartnerApi',
        'mandate_format' => 'setMandateFormat',
        'input_data_formats' => 'setInputDataFormats',
        'workflow_ids' => 'setWorkflowIds'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'mandate_id' => 'getMandateId',
        'country_mandate' => 'getCountryMandate',
        'country_code' => 'getCountryCode',
        'description' => 'getDescription',
        'supported_by_partner_api' => 'getSupportedByPartnerApi',
        'mandate_format' => 'getMandateFormat',
        'input_data_formats' => 'getInputDataFormats',
        'workflow_ids' => 'getWorkflowIds'
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
        $this->container['mandate_id'] = $data['mandate_id'] ?? null;
        $this->container['country_mandate'] = $data['country_mandate'] ?? null;
        $this->container['country_code'] = $data['country_code'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['supported_by_partner_api'] = $data['supported_by_partner_api'] ?? null;
        $this->container['mandate_format'] = $data['mandate_format'] ?? null;
        $this->container['input_data_formats'] = $data['input_data_formats'] ?? null;
        $this->container['workflow_ids'] = $data['workflow_ids'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets mandate_id
     *
     * @return string|null
     */
    public function getMandateId()
    {
        return $this->container['mandate_id'];
    }

    /**
     * Sets mandate_id
     *
     * @param string|null $mandate_id Mandate UUID
     *
     * @return self
     */
    public function setMandateId($mandate_id)
    {
        $this->container['mandate_id'] = $mandate_id;

        return $this;
    }

    /**
     * Gets country_mandate
     *
     * @return string|null
     */
    public function getCountryMandate()
    {
        return $this->container['country_mandate'];
    }

    /**
     * Sets country_mandate
     *
     * @param string|null $country_mandate Country mandate name
     *
     * @return self
     */
    public function setCountryMandate($country_mandate)
    {
        $this->container['country_mandate'] = $country_mandate;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string|null $country_code Country code
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Mandate description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets supported_by_partner_api
     *
     * @return bool|null
     */
    public function getSupportedByPartnerApi()
    {
        return $this->container['supported_by_partner_api'];
    }

    /**
     * Sets supported_by_partner_api
     *
     * @param bool|null $supported_by_partner_api Indicates whether this mandate supported by the partner API
     *
     * @return self
     */
    public function setSupportedByPartnerApi($supported_by_partner_api)
    {
        $this->container['supported_by_partner_api'] = $supported_by_partner_api;

        return $this;
    }

    /**
     * Gets mandate_format
     *
     * @return string|null
     */
    public function getMandateFormat()
    {
        return $this->container['mandate_format'];
    }

    /**
     * Sets mandate_format
     *
     * @param string|null $mandate_format Mandate format
     *
     * @return self
     */
    public function setMandateFormat($mandate_format)
    {
        $this->container['mandate_format'] = $mandate_format;

        return $this;
    }

    /**
     * Gets input_data_formats
     *
     * @return \Avalara\SDK\Model\EInvoicing\V1\InputDataFormats[]|null
     */
    public function getInputDataFormats()
    {
        return $this->container['input_data_formats'];
    }

    /**
     * Sets input_data_formats
     *
     * @param \Avalara\SDK\Model\EInvoicing\V1\InputDataFormats[]|null $input_data_formats Format and version used when inputting the data
     *
     * @return self
     */
    public function setInputDataFormats($input_data_formats)
    {
        $this->container['input_data_formats'] = $input_data_formats;

        return $this;
    }

    /**
     * Gets workflow_ids
     *
     * @return \Avalara\SDK\Model\EInvoicing\V1\WorkflowIds[]|null
     */
    public function getWorkflowIds()
    {
        return $this->container['workflow_ids'];
    }

    /**
     * Sets workflow_ids
     *
     * @param \Avalara\SDK\Model\EInvoicing\V1\WorkflowIds[]|null $workflow_ids Workflow ID list
     *
     * @return self
     */
    public function setWorkflowIds($workflow_ids)
    {
        $this->container['workflow_ids'] = $workflow_ids;

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

