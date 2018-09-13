<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="EmailOptions.php">
 *   Copyright (c) 2003-2018 Aspose Pty Ltd
 * </copyright>
 * <summary>
 *   Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 *  SOFTWARE.
 * </summary>
 * --------------------------------------------------------------------------------------------------------------------
 */

namespace GroupDocs\Viewer\Model;

use \ArrayAccess;
use \GroupDocs\Viewer\ObjectSerializer;

/*
 * EmailOptions
 *
 * @description The Email documents rendering options.
 */
class EmailOptions implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "EmailOptions";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'encoding' => 'string',
        'pageSize' => 'string',
        'fieldLabels' => '\GroupDocs\Viewer\Model\FieldLabel[]'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'encoding' => null,
        'pageSize' => null,
        'fieldLabels' => null
    ];

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /*
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'encoding' => 'Encoding',
        'pageSize' => 'PageSize',
        'fieldLabels' => 'FieldLabels'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'encoding' => 'setEncoding',
        'pageSize' => 'setPageSize',
        'fieldLabels' => 'setFieldLabels'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'encoding' => 'getEncoding',
        'pageSize' => 'getPageSize',
        'fieldLabels' => 'getFieldLabels'
    ];

    /*
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /*
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /*
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /*
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['encoding'] = isset($data['encoding']) ? $data['encoding'] : null;
        $this->container['pageSize'] = isset($data['pageSize']) ? $data['pageSize'] : null;
        $this->container['fieldLabels'] = isset($data['fieldLabels']) ? $data['fieldLabels'] : null;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /*
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /*
     * Gets encoding
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->container['encoding'];
    }

    /*
     * Sets encoding
     *
     * @param string $encoding The document encoding e.g. \"utf-8\".
     *
     * @return $this
     */
    public function setEncoding($encoding)
    {
        $this->container['encoding'] = $encoding;

        return $this;
    }

    /*
     * Gets pageSize
     *
     * @return string
     */
    public function getPageSize()
    {
        return $this->container['pageSize'];
    }

    /*
     * Sets pageSize
     *
     * @param string $pageSize The size of the output page when rendering as PDF or image. Supported values {Unknown|Letter|Ledger|A0|A1|A2|A3}: 1. Unknown - the default, unspecified page size. 2. Letter - the size of the Letter page in points is 792x612. 3. Ledger - the size of the Letter page in points is 1224x792. 4. A0 - the size of the A0 page in points is 3371x2384. 5. A1 - the size of the A1 page in points is 2384x1685. 6. A2 - the size of the A2 page in points is 1684x1190. 7. A3 - the size of the A3 page in points is 1190x842. 8. A4 - the size of the A4 page in points is 842x595.
     *
     * @return $this
     */
    public function setPageSize($pageSize)
    {
        $this->container['pageSize'] = $pageSize;

        return $this;
    }

    /*
     * Gets fieldLabels
     *
     * @return \GroupDocs\Viewer\Model\FieldLabel[]
     */
    public function getFieldLabels()
    {
        return $this->container['fieldLabels'];
    }

    /*
     * Sets fieldLabels
     *
     * @param \GroupDocs\Viewer\Model\FieldLabel[] $fieldLabels The list of supported email message field labels: 1. Field: \"Anniversary\" - default value is \"Anniversary\". 2. Field: \"Attachments\" - default value is \"Attachments\". 3. Field: \"Bcc\" - default value is \"Bcc\". 4. Field: \"Birthday\" - default value is \"Birthday\". 5. Field: \"Business\" - default value is \"Business\". 6. Field: \"BusinessAddress\" - default value is \"Business Address\". 7. Field: \"BusinessFax\" - default value is \"Business Fax\". 8. Field: \"BusinessHomepage\" - default value is \"BusinessHomePage\". 9. Field: \"Cc\" - default value is \"Cc\". 10. Field: \"Company\" - default value is \"Company\". 11. Field: \"Department\" - default value is \"Department\". 12. Field: \"Email\" - default value is \"Email\". 13. Field: \"EmailDisplayAs\" - default value is \"Email Display As\". 14. Field: \"Email2\" - default value is \"Email2\". 15. Field: \"Email2DisplayAs\" - default value is \"Email2 Display As\". 16. Field: \"Email3\" - default value is \"Email3\". 17. Field: \"Email3DisplayAs\" - default value is \"Email3 Display As\". 18. Field: \"End\" - default value is \"End\". 19. Field: \"FirstName\" - default value is \"First Name\". 20. Field: \"From\" - default value is \"From\". 21. Field: \"FullName\" - default value is \"Full Name\". 22. Field: \"Gender\" - default value is \"Gender\". 23. Field: \"Hobbies\" - default value is \"Hobbies\". 24. Field: \"Home\" - default value is \"Home\". 25. Field: \"HomeAddress\" - default value is \"Home Address\". 26. Field: \"Importance\" - default value is \"Importance\". 27. Field: \"JobTitle\" - default value is \"Job Title\". 28. Field: \"LastName\" - default value is \"Last Name\". 29. Field: \"Location\" - default value is \"Location\". 30. Field: \"MiddleName\" - default value is \"Middle Name\". 31. Field: \"Mobile\" - default value is \"Mobile\". 32. Field: \"Organizer\" - default value is \"Organizer\". 33. Field: \"OtherAddress\" - default value is \"Other Address\". 34. Field: \"PersonalHomepage\" - default value is \"PersonalHomePage\". 35. Field: \"Profession\" - default value is \"Profession\". 36. Field: \"Recurrence\" - default value is \"Recurrence\". 37. Field: \"RecurrencePattern\" - default value is \"Recurrence Pattern\". 38. Field: \"RequiredAttendees\" - default value is \"Required Attendees\". 39. Field: \"Sent\" - default value is \"Sent\". 40. Field: \"ShowTimeAs\" - default value is \"Show Time As\". 41. Field: \"SpousePartner\" - default value is \"Spouse/Partner\". 42. Field: \"Start\" - default value is \"Start\". 43. Field: \"Subject\" - default value is \"Subject\". 44. Field: \"To\" - default value is \"To\". 45. Field: \"UserField1\" - default value is \"User Field 1\". 46. Field: \"UserField2\" - default value is \"User Field 2\". 47. Field: \"UserField3\" - default value is \"User Field 3\". 48. Field: \"UserField4\" - default value is \"User Field 4\".
     *
     * @return $this
     */
    public function setFieldLabels($fieldLabels)
    {
        $this->container['fieldLabels'] = $fieldLabels;

        return $this;
    }
    /*
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /*
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /*
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /*
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /*
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


