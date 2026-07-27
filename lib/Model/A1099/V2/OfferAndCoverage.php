<?php
/**
 * OfferAndCoverage
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
 * OfferAndCoverage Class Doc Comment
 *
 * @category Class
 * @description Offer and coverage information for health coverage forms
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class OfferAndCoverage implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'OfferAndCoverage';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'month' => 'string',
        'offer_code' => 'string',
        'share' => 'float',
        'safe_harbor_code' => 'string',
        'zip_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'int32',
        'month' => null,
        'offer_code' => null,
        'share' => 'double',
        'safe_harbor_code' => null,
        'zip_code' => null
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
        'month' => 'month',
        'offer_code' => 'offerCode',
        'share' => 'share',
        'safe_harbor_code' => 'safeHarborCode',
        'zip_code' => 'zipCode'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'month' => 'setMonth',
        'offer_code' => 'setOfferCode',
        'share' => 'setShare',
        'safe_harbor_code' => 'setSafeHarborCode',
        'zip_code' => 'setZipCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'month' => 'getMonth',
        'offer_code' => 'getOfferCode',
        'share' => 'getShare',
        'safe_harbor_code' => 'getSafeHarborCode',
        'zip_code' => 'getZipCode'
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

    const MONTH_ALL = 'All';
    const MONTH__01 = '01';
    const MONTH__02 = '02';
    const MONTH__03 = '03';
    const MONTH__04 = '04';
    const MONTH__05 = '05';
    const MONTH__06 = '06';
    const MONTH__07 = '07';
    const MONTH__08 = '08';
    const MONTH__09 = '09';
    const MONTH__10 = '10';
    const MONTH__11 = '11';
    const MONTH__12 = '12';
    const OFFER_CODE__1_A = '1A';
    const OFFER_CODE__1_B = '1B';
    const OFFER_CODE__1_C = '1C';
    const OFFER_CODE__1_D = '1D';
    const OFFER_CODE__1_E = '1E';
    const OFFER_CODE__1_F = '1F';
    const OFFER_CODE__1_G = '1G';
    const OFFER_CODE__1_H = '1H';
    const OFFER_CODE__1_J = '1J';
    const OFFER_CODE__1_K = '1K';
    const OFFER_CODE__1_L = '1L';
    const OFFER_CODE__1_M = '1M';
    const OFFER_CODE__1_N = '1N';
    const OFFER_CODE__1_O = '1O';
    const OFFER_CODE__1_P = '1P';
    const OFFER_CODE__1_Q = '1Q';
    const OFFER_CODE__1_R = '1R';
    const OFFER_CODE__1_S = '1S';
    const OFFER_CODE__1_T = '1T';
    const OFFER_CODE__1_U = '1U';
    const SAFE_HARBOR_CODE__2_A = '2A';
    const SAFE_HARBOR_CODE__2_B = '2B';
    const SAFE_HARBOR_CODE__2_C = '2C';
    const SAFE_HARBOR_CODE__2_D = '2D';
    const SAFE_HARBOR_CODE__2_E = '2E';
    const SAFE_HARBOR_CODE__2_F = '2F';
    const SAFE_HARBOR_CODE__2_G = '2G';
    const SAFE_HARBOR_CODE__2_H = '2H';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMonthAllowableValues()
    {
        return [
            self::MONTH_ALL,
            self::MONTH__01,
            self::MONTH__02,
            self::MONTH__03,
            self::MONTH__04,
            self::MONTH__05,
            self::MONTH__06,
            self::MONTH__07,
            self::MONTH__08,
            self::MONTH__09,
            self::MONTH__10,
            self::MONTH__11,
            self::MONTH__12,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getOfferCodeAllowableValues()
    {
        return [
            self::OFFER_CODE__1_A,
            self::OFFER_CODE__1_B,
            self::OFFER_CODE__1_C,
            self::OFFER_CODE__1_D,
            self::OFFER_CODE__1_E,
            self::OFFER_CODE__1_F,
            self::OFFER_CODE__1_G,
            self::OFFER_CODE__1_H,
            self::OFFER_CODE__1_J,
            self::OFFER_CODE__1_K,
            self::OFFER_CODE__1_L,
            self::OFFER_CODE__1_M,
            self::OFFER_CODE__1_N,
            self::OFFER_CODE__1_O,
            self::OFFER_CODE__1_P,
            self::OFFER_CODE__1_Q,
            self::OFFER_CODE__1_R,
            self::OFFER_CODE__1_S,
            self::OFFER_CODE__1_T,
            self::OFFER_CODE__1_U,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSafeHarborCodeAllowableValues()
    {
        return [
            self::SAFE_HARBOR_CODE__2_A,
            self::SAFE_HARBOR_CODE__2_B,
            self::SAFE_HARBOR_CODE__2_C,
            self::SAFE_HARBOR_CODE__2_D,
            self::SAFE_HARBOR_CODE__2_E,
            self::SAFE_HARBOR_CODE__2_F,
            self::SAFE_HARBOR_CODE__2_G,
            self::SAFE_HARBOR_CODE__2_H,
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
        $this->container['month'] = $data['month'] ?? null;
        $this->container['offer_code'] = $data['offer_code'] ?? null;
        $this->container['share'] = $data['share'] ?? null;
        $this->container['safe_harbor_code'] = $data['safe_harbor_code'] ?? null;
        $this->container['zip_code'] = $data['zip_code'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getMonthAllowableValues();
        if (!is_null($this->container['month']) && !in_array($this->container['month'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'month', must be one of '%s'",
                $this->container['month'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getOfferCodeAllowableValues();
        if (!is_null($this->container['offer_code']) && !in_array($this->container['offer_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'offer_code', must be one of '%s'",
                $this->container['offer_code'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getSafeHarborCodeAllowableValues();
        if (!is_null($this->container['safe_harbor_code']) && !in_array($this->container['safe_harbor_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'safe_harbor_code', must be one of '%s'",
                $this->container['safe_harbor_code'],
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
     * @return int|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int|null $id Id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets month
     *
     * @return string|null
     */
    public function getMonth()
    {
        return $this->container['month'];
    }

    /**
     * Sets month
     *
     * @param string|null $month Month of coverage.  Available values:  - All: All months  - January: January  - February: February  - March: March  - April: April  - May: May  - June: June  - July: July  - August: August  - September: September  - October: October  - November: November  - December: December
     *
     * @return self
     */
    public function setMonth($month)
    {
        $allowedValues = $this->getMonthAllowableValues();
        if (!is_null($month) && !in_array($month, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'month', must be one of '%s'",
                    $month,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['month'] = $month;

        return $this;
    }

    /**
     * Gets offer_code
     *
     * @return string|null
     */
    public function getOfferCode()
    {
        return $this->container['offer_code'];
    }

    /**
     * Sets offer_code
     *
     * @param string|null $offer_code Offer of Coverage Code. Required if Share has a value, including zero.  Available values:    Pre-ICHRA Codes (available before 2020):  - 1A: Qualifying offer: minimum essential coverage providing minimum value offered to full-time employee with employee required contribution ≤ 9.5% (as adjusted) of mainland single federal poverty line and at least minimum essential coverage offered to spouse and dependent(s)  - 1B: Minimum essential coverage providing minimum value offered to employee only  - 1C: Minimum essential coverage providing minimum value offered to employee and at least minimum essential coverage offered to dependent(s) (not spouse)  - 1D: Minimum essential coverage providing minimum value offered to employee and at least minimum essential coverage offered to spouse (not dependent(s))  - 1E: Minimum essential coverage providing minimum value offered to employee and at least minimum essential coverage offered to dependent(s) and spouse  - 1F: Minimum essential coverage NOT providing minimum value offered to employee; employee and spouse or dependent(s); or employee, spouse, and dependents  - 1G: Offer of coverage to an individual who was not an employee or not a full-time employee and who enrolled in self-insured coverage  - 1H: No offer of coverage (employee not offered any health coverage or employee offered coverage that is not minimum essential coverage)  - 1J: Minimum essential coverage providing minimum value offered to employee and at least minimum essential coverage conditionally offered to spouse; minimum essential coverage not offered to dependent(s)  - 1K: Minimum essential coverage providing minimum value offered to employee; at least minimum essential coverage offered to dependents; and at least minimum essential coverage conditionally offered to spouse                ICHRA Codes (introduced 2020, require ZIP code):  - 1L: Individual coverage HRA offered to employee only  - 1M: Individual coverage HRA offered to employee and dependent(s) (not spouse)  - 1N: Individual coverage HRA offered to employee, spouse, and dependent(s)  - 1O: Individual coverage HRA offered to employee only using employment site ZIP code affordability safe harbor  - 1P: Individual coverage HRA offered to employee and dependent(s) (not spouse) using employment site ZIP code affordability safe harbor  - 1Q: Individual coverage HRA offered to employee, spouse, and dependent(s) using employment site ZIP code affordability safe harbor  - 1R: Individual coverage HRA that is NOT affordable  - 1S: Individual coverage HRA offered to an individual who was not a full-time employee  - 1T: Individual coverage HRA offered to employee and spouse (not dependents)  - 1U: Individual coverage HRA offered to employee and spouse (not dependents) using employment site ZIP code affordability safe harbor    Note: Codes 1B, 1C, 1D, 1E, 1J, 1K, 1L, 1M, 1N, 1O, 1P, 1Q, 1T, 1U require employee share amount (0.00 is a valid value).
     *
     * @return self
     */
    public function setOfferCode($offer_code)
    {
        $allowedValues = $this->getOfferCodeAllowableValues();
        if (!is_null($offer_code) && !in_array($offer_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'offer_code', must be one of '%s'",
                    $offer_code,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['offer_code'] = $offer_code;

        return $this;
    }

    /**
     * Gets share
     *
     * @return float|null
     */
    public function getShare()
    {
        return $this->container['share'];
    }

    /**
     * Sets share
     *
     * @param float|null $share Employee required contribution share - Employee Share of Lowest Cost Monthly Premium, for Self-Only Minimum Value Coverage - May not exceed 3499.99
     *
     * @return self
     */
    public function setShare($share)
    {
        $this->container['share'] = $share;

        return $this;
    }

    /**
     * Gets safe_harbor_code
     *
     * @return string|null
     */
    public function getSafeHarborCode()
    {
        return $this->container['safe_harbor_code'];
    }

    /**
     * Sets safe_harbor_code
     *
     * @param string|null $safe_harbor_code Safe harbor code - Applicable Section 4980H Safe Harbor Code.  Available values:  - 2A: Form W-2 safe harbor  - 2B: Federal poverty line safe harbor  - 2C: Rate of pay safe harbor  - 2D: Part-time employee safe harbor for employees who were not full-time for any month of the year  - 2E: Multiemployer interim rule relief  - 2F: Qualifying offer method  - 2G: Qualifying offer transition relief  - 2H: Other affordability safe harbor
     *
     * @return self
     */
    public function setSafeHarborCode($safe_harbor_code)
    {
        $allowedValues = $this->getSafeHarborCodeAllowableValues();
        if (!is_null($safe_harbor_code) && !in_array($safe_harbor_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'safe_harbor_code', must be one of '%s'",
                    $safe_harbor_code,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['safe_harbor_code'] = $safe_harbor_code;

        return $this;
    }

    /**
     * Gets zip_code
     *
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->container['zip_code'];
    }

    /**
     * Sets zip_code
     *
     * @param string|null $zip_code ZIP/postal code. For coverage area (optional, unless codes 1L to 1U are used).
     *
     * @return self
     */
    public function setZipCode($zip_code)
    {
        $this->container['zip_code'] = $zip_code;

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


