<?php
/**
 * Form1099Int
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
 * Form1099Int Class Doc Comment
 *
 * @category Class
 * @description Form 1099-INT: Interest Imcome                *At least one of the following amounts must be provided:*   Interest Income, Interest on U.S. Savings Bonds and Treasury obligations, or Tax-Exempt Interest.
 * @package  Avalara\SDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Form1099Int implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Form1099Int';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'interest_income' => 'float',
        'early_withdrawal_penalty' => 'float',
        'us_savings_bonds_interest' => 'float',
        'federal_income_tax_withheld' => 'float',
        'investment_expenses' => 'float',
        'foreign_tax_paid' => 'float',
        'foreign_country' => 'string',
        'tax_exempt_interest' => 'float',
        'specified_private_activity_bond_interest' => 'float',
        'market_discount' => 'float',
        'bond_premium' => 'float',
        'bond_premium_on_treasury_obligations' => 'float',
        'bond_premium_on_tax_exempt_bond' => 'float',
        'tax_exempt_bond_cusip_number' => 'string',
        'fatca_filing_requirement' => 'bool',
        'type' => 'string',
        'id' => 'string',
        'issuer_id' => 'string',
        'issuer_reference_id' => 'string',
        'issuer_tin' => 'string',
        'tax_year' => 'int',
        'reference_id' => 'string',
        'tin' => 'string',
        'recipient_name' => 'string',
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
        'updated_at' => '\DateTime',
        'tin_type' => 'string',
        'business_name' => 'string',
        'business_name2' => 'string',
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string',
        'suffix_name' => 'string',
        'recipient_second_name' => 'string',
        'account_number' => 'string',
        'office_code' => 'string',
        'no_tin' => 'bool',
        'second_tin_notice' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'interest_income' => 'double',
        'early_withdrawal_penalty' => 'double',
        'us_savings_bonds_interest' => 'double',
        'federal_income_tax_withheld' => 'double',
        'investment_expenses' => 'double',
        'foreign_tax_paid' => 'double',
        'foreign_country' => null,
        'tax_exempt_interest' => 'double',
        'specified_private_activity_bond_interest' => 'double',
        'market_discount' => 'double',
        'bond_premium' => 'double',
        'bond_premium_on_treasury_obligations' => 'double',
        'bond_premium_on_tax_exempt_bond' => 'double',
        'tax_exempt_bond_cusip_number' => null,
        'fatca_filing_requirement' => null,
        'type' => null,
        'id' => null,
        'issuer_id' => null,
        'issuer_reference_id' => null,
        'issuer_tin' => null,
        'tax_year' => 'int32',
        'reference_id' => null,
        'tin' => null,
        'recipient_name' => null,
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
        'updated_at' => 'date-time',
        'tin_type' => null,
        'business_name' => null,
        'business_name2' => null,
        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,
        'suffix_name' => null,
        'recipient_second_name' => null,
        'account_number' => null,
        'office_code' => null,
        'no_tin' => null,
        'second_tin_notice' => null
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
        'interest_income' => 'interestIncome',
        'early_withdrawal_penalty' => 'earlyWithdrawalPenalty',
        'us_savings_bonds_interest' => 'usSavingsBondsInterest',
        'federal_income_tax_withheld' => 'federalIncomeTaxWithheld',
        'investment_expenses' => 'investmentExpenses',
        'foreign_tax_paid' => 'foreignTaxPaid',
        'foreign_country' => 'foreignCountry',
        'tax_exempt_interest' => 'taxExemptInterest',
        'specified_private_activity_bond_interest' => 'specifiedPrivateActivityBondInterest',
        'market_discount' => 'marketDiscount',
        'bond_premium' => 'bondPremium',
        'bond_premium_on_treasury_obligations' => 'bondPremiumOnTreasuryObligations',
        'bond_premium_on_tax_exempt_bond' => 'bondPremiumOnTaxExemptBond',
        'tax_exempt_bond_cusip_number' => 'taxExemptBondCusipNumber',
        'fatca_filing_requirement' => 'fatcaFilingRequirement',
        'type' => 'type',
        'id' => 'id',
        'issuer_id' => 'issuerId',
        'issuer_reference_id' => 'issuerReferenceId',
        'issuer_tin' => 'issuerTin',
        'tax_year' => 'taxYear',
        'reference_id' => 'referenceId',
        'tin' => 'tin',
        'recipient_name' => 'recipientName',
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
        'updated_at' => 'updatedAt',
        'tin_type' => 'tinType',
        'business_name' => 'businessName',
        'business_name2' => 'businessName2',
        'first_name' => 'firstName',
        'middle_name' => 'middleName',
        'last_name' => 'lastName',
        'suffix_name' => 'suffixName',
        'recipient_second_name' => 'recipientSecondName',
        'account_number' => 'accountNumber',
        'office_code' => 'officeCode',
        'no_tin' => 'noTin',
        'second_tin_notice' => 'secondTinNotice'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'interest_income' => 'setInterestIncome',
        'early_withdrawal_penalty' => 'setEarlyWithdrawalPenalty',
        'us_savings_bonds_interest' => 'setUsSavingsBondsInterest',
        'federal_income_tax_withheld' => 'setFederalIncomeTaxWithheld',
        'investment_expenses' => 'setInvestmentExpenses',
        'foreign_tax_paid' => 'setForeignTaxPaid',
        'foreign_country' => 'setForeignCountry',
        'tax_exempt_interest' => 'setTaxExemptInterest',
        'specified_private_activity_bond_interest' => 'setSpecifiedPrivateActivityBondInterest',
        'market_discount' => 'setMarketDiscount',
        'bond_premium' => 'setBondPremium',
        'bond_premium_on_treasury_obligations' => 'setBondPremiumOnTreasuryObligations',
        'bond_premium_on_tax_exempt_bond' => 'setBondPremiumOnTaxExemptBond',
        'tax_exempt_bond_cusip_number' => 'setTaxExemptBondCusipNumber',
        'fatca_filing_requirement' => 'setFatcaFilingRequirement',
        'type' => 'setType',
        'id' => 'setId',
        'issuer_id' => 'setIssuerId',
        'issuer_reference_id' => 'setIssuerReferenceId',
        'issuer_tin' => 'setIssuerTin',
        'tax_year' => 'setTaxYear',
        'reference_id' => 'setReferenceId',
        'tin' => 'setTin',
        'recipient_name' => 'setRecipientName',
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
        'updated_at' => 'setUpdatedAt',
        'tin_type' => 'setTinType',
        'business_name' => 'setBusinessName',
        'business_name2' => 'setBusinessName2',
        'first_name' => 'setFirstName',
        'middle_name' => 'setMiddleName',
        'last_name' => 'setLastName',
        'suffix_name' => 'setSuffixName',
        'recipient_second_name' => 'setRecipientSecondName',
        'account_number' => 'setAccountNumber',
        'office_code' => 'setOfficeCode',
        'no_tin' => 'setNoTin',
        'second_tin_notice' => 'setSecondTinNotice'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'interest_income' => 'getInterestIncome',
        'early_withdrawal_penalty' => 'getEarlyWithdrawalPenalty',
        'us_savings_bonds_interest' => 'getUsSavingsBondsInterest',
        'federal_income_tax_withheld' => 'getFederalIncomeTaxWithheld',
        'investment_expenses' => 'getInvestmentExpenses',
        'foreign_tax_paid' => 'getForeignTaxPaid',
        'foreign_country' => 'getForeignCountry',
        'tax_exempt_interest' => 'getTaxExemptInterest',
        'specified_private_activity_bond_interest' => 'getSpecifiedPrivateActivityBondInterest',
        'market_discount' => 'getMarketDiscount',
        'bond_premium' => 'getBondPremium',
        'bond_premium_on_treasury_obligations' => 'getBondPremiumOnTreasuryObligations',
        'bond_premium_on_tax_exempt_bond' => 'getBondPremiumOnTaxExemptBond',
        'tax_exempt_bond_cusip_number' => 'getTaxExemptBondCusipNumber',
        'fatca_filing_requirement' => 'getFatcaFilingRequirement',
        'type' => 'getType',
        'id' => 'getId',
        'issuer_id' => 'getIssuerId',
        'issuer_reference_id' => 'getIssuerReferenceId',
        'issuer_tin' => 'getIssuerTin',
        'tax_year' => 'getTaxYear',
        'reference_id' => 'getReferenceId',
        'tin' => 'getTin',
        'recipient_name' => 'getRecipientName',
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
        'updated_at' => 'getUpdatedAt',
        'tin_type' => 'getTinType',
        'business_name' => 'getBusinessName',
        'business_name2' => 'getBusinessName2',
        'first_name' => 'getFirstName',
        'middle_name' => 'getMiddleName',
        'last_name' => 'getLastName',
        'suffix_name' => 'getSuffixName',
        'recipient_second_name' => 'getRecipientSecondName',
        'account_number' => 'getAccountNumber',
        'office_code' => 'getOfficeCode',
        'no_tin' => 'getNoTin',
        'second_tin_notice' => 'getSecondTinNotice'
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
    const TIN_TYPE_EIN = 'EIN';
    const TIN_TYPE_SSN = 'SSN';
    const TIN_TYPE_ITIN = 'ITIN';
    const TIN_TYPE_ATIN = 'ATIN';
    const TIN_TYPE_INDIVIDUAL = 'INDIVIDUAL';
    const TIN_TYPE_BUSINESS = 'BUSINESS';
    const TIN_TYPE_UNKNOWN = 'UNKNOWN';

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
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTinTypeAllowableValues()
    {
        return [
            self::TIN_TYPE_EIN,
            self::TIN_TYPE_SSN,
            self::TIN_TYPE_ITIN,
            self::TIN_TYPE_ATIN,
            self::TIN_TYPE_INDIVIDUAL,
            self::TIN_TYPE_BUSINESS,
            self::TIN_TYPE_UNKNOWN,
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
        $this->container['interest_income'] = $data['interest_income'] ?? null;
        $this->container['early_withdrawal_penalty'] = $data['early_withdrawal_penalty'] ?? null;
        $this->container['us_savings_bonds_interest'] = $data['us_savings_bonds_interest'] ?? null;
        $this->container['federal_income_tax_withheld'] = $data['federal_income_tax_withheld'] ?? null;
        $this->container['investment_expenses'] = $data['investment_expenses'] ?? null;
        $this->container['foreign_tax_paid'] = $data['foreign_tax_paid'] ?? null;
        $this->container['foreign_country'] = $data['foreign_country'] ?? null;
        $this->container['tax_exempt_interest'] = $data['tax_exempt_interest'] ?? null;
        $this->container['specified_private_activity_bond_interest'] = $data['specified_private_activity_bond_interest'] ?? null;
        $this->container['market_discount'] = $data['market_discount'] ?? null;
        $this->container['bond_premium'] = $data['bond_premium'] ?? null;
        $this->container['bond_premium_on_treasury_obligations'] = $data['bond_premium_on_treasury_obligations'] ?? null;
        $this->container['bond_premium_on_tax_exempt_bond'] = $data['bond_premium_on_tax_exempt_bond'] ?? null;
        $this->container['tax_exempt_bond_cusip_number'] = $data['tax_exempt_bond_cusip_number'] ?? null;
        $this->container['fatca_filing_requirement'] = $data['fatca_filing_requirement'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['id'] = $data['id'] ?? null;
        $this->container['issuer_id'] = $data['issuer_id'] ?? null;
        $this->container['issuer_reference_id'] = $data['issuer_reference_id'] ?? null;
        $this->container['issuer_tin'] = $data['issuer_tin'] ?? null;
        $this->container['tax_year'] = $data['tax_year'] ?? null;
        $this->container['reference_id'] = $data['reference_id'] ?? null;
        $this->container['tin'] = $data['tin'] ?? null;
        $this->container['recipient_name'] = $data['recipient_name'] ?? null;
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
        $this->container['tin_type'] = $data['tin_type'] ?? null;
        $this->container['business_name'] = $data['business_name'] ?? null;
        $this->container['business_name2'] = $data['business_name2'] ?? null;
        $this->container['first_name'] = $data['first_name'] ?? null;
        $this->container['middle_name'] = $data['middle_name'] ?? null;
        $this->container['last_name'] = $data['last_name'] ?? null;
        $this->container['suffix_name'] = $data['suffix_name'] ?? null;
        $this->container['recipient_second_name'] = $data['recipient_second_name'] ?? null;
        $this->container['account_number'] = $data['account_number'] ?? null;
        $this->container['office_code'] = $data['office_code'] ?? null;
        $this->container['no_tin'] = $data['no_tin'] ?? null;
        $this->container['second_tin_notice'] = $data['second_tin_notice'] ?? null;
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
        $allowedValues = $this->getTinTypeAllowableValues();
        if (!is_null($this->container['tin_type']) && !in_array($this->container['tin_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'tin_type', must be one of '%s'",
                $this->container['tin_type'],
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
     * Gets interest_income
     *
     * @return float|null
     */
    public function getInterestIncome()
    {
        return $this->container['interest_income'];
    }

    /**
     * Sets interest_income
     *
     * @param float|null $interest_income Interest Income
     *
     * @return self
     */
    public function setInterestIncome($interest_income)
    {
        $this->container['interest_income'] = $interest_income;

        return $this;
    }

    /**
     * Gets early_withdrawal_penalty
     *
     * @return float|null
     */
    public function getEarlyWithdrawalPenalty()
    {
        return $this->container['early_withdrawal_penalty'];
    }

    /**
     * Sets early_withdrawal_penalty
     *
     * @param float|null $early_withdrawal_penalty Early Withdrawal Penalty
     *
     * @return self
     */
    public function setEarlyWithdrawalPenalty($early_withdrawal_penalty)
    {
        $this->container['early_withdrawal_penalty'] = $early_withdrawal_penalty;

        return $this;
    }

    /**
     * Gets us_savings_bonds_interest
     *
     * @return float|null
     */
    public function getUsSavingsBondsInterest()
    {
        return $this->container['us_savings_bonds_interest'];
    }

    /**
     * Sets us_savings_bonds_interest
     *
     * @param float|null $us_savings_bonds_interest Interest on U.S. Savings Bonds and Treasury obligations
     *
     * @return self
     */
    public function setUsSavingsBondsInterest($us_savings_bonds_interest)
    {
        $this->container['us_savings_bonds_interest'] = $us_savings_bonds_interest;

        return $this;
    }

    /**
     * Gets federal_income_tax_withheld
     *
     * @return float|null
     */
    public function getFederalIncomeTaxWithheld()
    {
        return $this->container['federal_income_tax_withheld'];
    }

    /**
     * Sets federal_income_tax_withheld
     *
     * @param float|null $federal_income_tax_withheld Federal income tax withheld
     *
     * @return self
     */
    public function setFederalIncomeTaxWithheld($federal_income_tax_withheld)
    {
        $this->container['federal_income_tax_withheld'] = $federal_income_tax_withheld;

        return $this;
    }

    /**
     * Gets investment_expenses
     *
     * @return float|null
     */
    public function getInvestmentExpenses()
    {
        return $this->container['investment_expenses'];
    }

    /**
     * Sets investment_expenses
     *
     * @param float|null $investment_expenses Investment Expenses
     *
     * @return self
     */
    public function setInvestmentExpenses($investment_expenses)
    {
        $this->container['investment_expenses'] = $investment_expenses;

        return $this;
    }

    /**
     * Gets foreign_tax_paid
     *
     * @return float|null
     */
    public function getForeignTaxPaid()
    {
        return $this->container['foreign_tax_paid'];
    }

    /**
     * Sets foreign_tax_paid
     *
     * @param float|null $foreign_tax_paid Foreign tax paid
     *
     * @return self
     */
    public function setForeignTaxPaid($foreign_tax_paid)
    {
        $this->container['foreign_tax_paid'] = $foreign_tax_paid;

        return $this;
    }

    /**
     * Gets foreign_country
     *
     * @return string|null
     */
    public function getForeignCountry()
    {
        return $this->container['foreign_country'];
    }

    /**
     * Sets foreign_country
     *
     * @param string|null $foreign_country Foreign country or U.S. possession
     *
     * @return self
     */
    public function setForeignCountry($foreign_country)
    {
        $this->container['foreign_country'] = $foreign_country;

        return $this;
    }

    /**
     * Gets tax_exempt_interest
     *
     * @return float|null
     */
    public function getTaxExemptInterest()
    {
        return $this->container['tax_exempt_interest'];
    }

    /**
     * Sets tax_exempt_interest
     *
     * @param float|null $tax_exempt_interest Tax-Exempt Interest
     *
     * @return self
     */
    public function setTaxExemptInterest($tax_exempt_interest)
    {
        $this->container['tax_exempt_interest'] = $tax_exempt_interest;

        return $this;
    }

    /**
     * Gets specified_private_activity_bond_interest
     *
     * @return float|null
     */
    public function getSpecifiedPrivateActivityBondInterest()
    {
        return $this->container['specified_private_activity_bond_interest'];
    }

    /**
     * Sets specified_private_activity_bond_interest
     *
     * @param float|null $specified_private_activity_bond_interest Specified Private activity
     *
     * @return self
     */
    public function setSpecifiedPrivateActivityBondInterest($specified_private_activity_bond_interest)
    {
        $this->container['specified_private_activity_bond_interest'] = $specified_private_activity_bond_interest;

        return $this;
    }

    /**
     * Gets market_discount
     *
     * @return float|null
     */
    public function getMarketDiscount()
    {
        return $this->container['market_discount'];
    }

    /**
     * Sets market_discount
     *
     * @param float|null $market_discount Market Discount
     *
     * @return self
     */
    public function setMarketDiscount($market_discount)
    {
        $this->container['market_discount'] = $market_discount;

        return $this;
    }

    /**
     * Gets bond_premium
     *
     * @return float|null
     */
    public function getBondPremium()
    {
        return $this->container['bond_premium'];
    }

    /**
     * Sets bond_premium
     *
     * @param float|null $bond_premium Bond Premium
     *
     * @return self
     */
    public function setBondPremium($bond_premium)
    {
        $this->container['bond_premium'] = $bond_premium;

        return $this;
    }

    /**
     * Gets bond_premium_on_treasury_obligations
     *
     * @return float|null
     */
    public function getBondPremiumOnTreasuryObligations()
    {
        return $this->container['bond_premium_on_treasury_obligations'];
    }

    /**
     * Sets bond_premium_on_treasury_obligations
     *
     * @param float|null $bond_premium_on_treasury_obligations Bond Premium on Treasury obligations
     *
     * @return self
     */
    public function setBondPremiumOnTreasuryObligations($bond_premium_on_treasury_obligations)
    {
        $this->container['bond_premium_on_treasury_obligations'] = $bond_premium_on_treasury_obligations;

        return $this;
    }

    /**
     * Gets bond_premium_on_tax_exempt_bond
     *
     * @return float|null
     */
    public function getBondPremiumOnTaxExemptBond()
    {
        return $this->container['bond_premium_on_tax_exempt_bond'];
    }

    /**
     * Sets bond_premium_on_tax_exempt_bond
     *
     * @param float|null $bond_premium_on_tax_exempt_bond Bond Premium on tax exempt bond
     *
     * @return self
     */
    public function setBondPremiumOnTaxExemptBond($bond_premium_on_tax_exempt_bond)
    {
        $this->container['bond_premium_on_tax_exempt_bond'] = $bond_premium_on_tax_exempt_bond;

        return $this;
    }

    /**
     * Gets tax_exempt_bond_cusip_number
     *
     * @return string|null
     */
    public function getTaxExemptBondCusipNumber()
    {
        return $this->container['tax_exempt_bond_cusip_number'];
    }

    /**
     * Sets tax_exempt_bond_cusip_number
     *
     * @param string|null $tax_exempt_bond_cusip_number Tax exempt bond CUSIP no.   Enter VARIOUS if the tax-exempt interest is reported in the aggregate for multiple bonds or accounts.
     *
     * @return self
     */
    public function setTaxExemptBondCusipNumber($tax_exempt_bond_cusip_number)
    {
        $this->container['tax_exempt_bond_cusip_number'] = $tax_exempt_bond_cusip_number;

        return $this;
    }

    /**
     * Gets fatca_filing_requirement
     *
     * @return bool|null
     */
    public function getFatcaFilingRequirement()
    {
        return $this->container['fatca_filing_requirement'];
    }

    /**
     * Sets fatca_filing_requirement
     *
     * @param bool|null $fatca_filing_requirement FATCA filing requirement.
     *
     * @return self
     */
    public function setFatcaFilingRequirement($fatca_filing_requirement)
    {
        $this->container['fatca_filing_requirement'] = $fatca_filing_requirement;

        return $this;
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
     * @param string|null $business_name Business name. Required when the recipient of the form is a business; should only be used for businesses.
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
     * @param string|null $business_name2 Business name line 2. Should only be used for businesses.
     *
     * @return self
     */
    public function setBusinessName2($business_name2)
    {
        $this->container['business_name2'] = $business_name2;

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
     * Gets suffix_name
     *
     * @return string|null
     */
    public function getSuffixName()
    {
        return $this->container['suffix_name'];
    }

    /**
     * Sets suffix_name
     *
     * @param string|null $suffix_name Suffix name. Should only be used for individuals.
     *
     * @return self
     */
    public function setSuffixName($suffix_name)
    {
        $this->container['suffix_name'] = $suffix_name;

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
     * @param string|null $account_number Account number
     *
     * @return self
     */
    public function setAccountNumber($account_number)
    {
        $this->container['account_number'] = $account_number;

        return $this;
    }

    /**
     * Gets office_code
     *
     * @return string|null
     */
    public function getOfficeCode()
    {
        return $this->container['office_code'];
    }

    /**
     * Sets office_code
     *
     * @param string|null $office_code Office code
     *
     * @return self
     */
    public function setOfficeCode($office_code)
    {
        $this->container['office_code'] = $office_code;

        return $this;
    }

    /**
     * Gets no_tin
     *
     * @return bool|null
     */
    public function getNoTin()
    {
        return $this->container['no_tin'];
    }

    /**
     * Sets no_tin
     *
     * @param bool|null $no_tin No TIN indicator
     *
     * @return self
     */
    public function setNoTin($no_tin)
    {
        $this->container['no_tin'] = $no_tin;

        return $this;
    }

    /**
     * Gets second_tin_notice
     *
     * @return bool|null
     */
    public function getSecondTinNotice()
    {
        return $this->container['second_tin_notice'];
    }

    /**
     * Sets second_tin_notice
     *
     * @param bool|null $second_tin_notice Second TIN notice
     *
     * @return self
     */
    public function setSecondTinNotice($second_tin_notice)
    {
        $this->container['second_tin_notice'] = $second_tin_notice;

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


