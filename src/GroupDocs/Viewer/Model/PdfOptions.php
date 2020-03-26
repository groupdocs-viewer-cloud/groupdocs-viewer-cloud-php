<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="PdfOptions.php">
 *   Copyright (c) 2003-2020 Aspose Pty Ltd
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
use \GroupDocs\Viewer\ObjectSerializer;

/*
 * PdfOptions
 *
 * @description Options for rendering document into PDF
 */
class PdfOptions extends RenderOptions 
{
    const DISCRIMINATOR = null;

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "PdfOptions";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'jpgQuality' => 'int',
        'documentOpenPassword' => 'string',
        'permissionsPassword' => 'string',
        'permissions' => 'string'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'jpgQuality' => 'int32',
        'documentOpenPassword' => null,
        'permissionsPassword' => null,
        'permissions' => null
    ];

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes + parent::swaggerTypes();
    }

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats + parent::swaggerFormats();
    }

    /*
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'jpgQuality' => 'JpgQuality',
        'documentOpenPassword' => 'DocumentOpenPassword',
        'permissionsPassword' => 'PermissionsPassword',
        'permissions' => 'Permissions'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'jpgQuality' => 'setJpgQuality',
        'documentOpenPassword' => 'setDocumentOpenPassword',
        'permissionsPassword' => 'setPermissionsPassword',
        'permissions' => 'setPermissions'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'jpgQuality' => 'getJpgQuality',
        'documentOpenPassword' => 'getDocumentOpenPassword',
        'permissionsPassword' => 'getPermissionsPassword',
        'permissions' => 'getPermissions'
    ];

    /*
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return parent::attributeMap() + self::$attributeMap;
    }

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return parent::setters() + self::$setters;
    }

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return parent::getters() + self::$getters;
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

    const PERMISSIONS_ALLOW_ALL = 'AllowAll';
    const PERMISSIONS_DENY_PRINTING = 'DenyPrinting';
    const PERMISSIONS_DENY_MODIFICATION = 'DenyModification';
    const PERMISSIONS_DENY_DATA_EXTRACTION = 'DenyDataExtraction';
    const PERMISSIONS_DENY_ALL = 'DenyAll';
    

    
    /*
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPermissionsAllowableValues()
    {
        return [
            self::PERMISSIONS_ALLOW_ALL,
            self::PERMISSIONS_DENY_PRINTING,
            self::PERMISSIONS_DENY_MODIFICATION,
            self::PERMISSIONS_DENY_DATA_EXTRACTION,
            self::PERMISSIONS_DENY_ALL,
        ];
    }
    


    /*
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        parent::__construct($data);

        $this->container['jpgQuality'] = isset($data['jpgQuality']) ? $data['jpgQuality'] : null;
        $this->container['documentOpenPassword'] = isset($data['documentOpenPassword']) ? $data['documentOpenPassword'] : null;
        $this->container['permissionsPassword'] = isset($data['permissionsPassword']) ? $data['permissionsPassword'] : null;
        $this->container['permissions'] = isset($data['permissions']) ? $data['permissions'] : null;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

        if ($this->container['jpgQuality'] === null) {
            $invalidProperties[] = "'jpgQuality' can't be null";
        }
        if ($this->container['permissions'] === null) {
            $invalidProperties[] = "'permissions' can't be null";
        }
        $allowedValues = $this->getPermissionsAllowableValues();
        if (!in_array($this->container['permissions'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'permissions', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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
        if (!parent::valid()) {
            return false;
        }

        if ($this->container['jpgQuality'] === null) {
            return false;
        }
        if ($this->container['permissions'] === null) {
            return false;
        }
        $allowedValues = $this->getPermissionsAllowableValues();
        if (!in_array($this->container['permissions'], $allowedValues)) {
            return false;
        }
        return true;
    }


    /*
     * Gets jpgQuality
     *
     * @return int
     */
    public function getJpgQuality()
    {
        return $this->container['jpgQuality'];
    }

    /*
     * Sets jpgQuality
     *
     * @param int $jpgQuality The quality of the JPG images contained by output PDF document; Valid values are between 1 and 100; Default value is 90
     *
     * @return $this
     */
    public function setJpgQuality($jpgQuality)
    {
        $this->container['jpgQuality'] = $jpgQuality;

        return $this;
    }

    /*
     * Gets documentOpenPassword
     *
     * @return string
     */
    public function getDocumentOpenPassword()
    {
        return $this->container['documentOpenPassword'];
    }

    /*
     * Sets documentOpenPassword
     *
     * @param string $documentOpenPassword The password required to open the PDF document
     *
     * @return $this
     */
    public function setDocumentOpenPassword($documentOpenPassword)
    {
        $this->container['documentOpenPassword'] = $documentOpenPassword;

        return $this;
    }

    /*
     * Gets permissionsPassword
     *
     * @return string
     */
    public function getPermissionsPassword()
    {
        return $this->container['permissionsPassword'];
    }

    /*
     * Sets permissionsPassword
     *
     * @param string $permissionsPassword The password required to change permission settings; Using a permissions password  you can restrict printing, modification and data extraction
     *
     * @return $this
     */
    public function setPermissionsPassword($permissionsPassword)
    {
        $this->container['permissionsPassword'] = $permissionsPassword;

        return $this;
    }

    /*
     * Gets permissions
     *
     * @return string
     */
    public function getPermissions()
    {
        return $this->container['permissions'];
    }

    /*
     * Sets permissions
     *
     * @param string $permissions The PDF document permissions such as printing, modification and data extraction
     *
     * @return $this
     */
    public function setPermissions($permissions)
    {
        $allowedValues = $this->getPermissionsAllowableValues();
        if ((!is_numeric($permissions) && !in_array($permissions, $allowedValues)) || (is_numeric($permissions) && !in_array($allowedValues[$permissions], $allowedValues))) {
            throw new \InvalidArgumentException(sprintf("Invalid value for 'permissions', must be one of '%s'", implode("', '", $allowedValues)));
        }
			
        $this->container['permissions'] = $permissions;

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


