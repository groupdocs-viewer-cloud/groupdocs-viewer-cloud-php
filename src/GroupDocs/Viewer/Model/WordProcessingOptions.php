<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="WordProcessingOptions.php">
 *   Copyright (c) Aspose Pty Ltd
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
 * WordProcessingOptions
 *
 * @description Provides options for rendering word processing documents
 */
class WordProcessingOptions implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "WordProcessingOptions";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'renderTrackedChanges' => 'bool',
        'leftMargin' => 'double',
        'rightMargin' => 'double',
        'topMargin' => 'double',
        'bottomMargin' => 'double',
        'pageSize' => 'string',
        'enableOpenTypeFeatures' => 'bool',
        'unlinkTableOfContents' => 'bool',
        'updateFields' => 'bool'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'renderTrackedChanges' => null,
        'leftMargin' => 'double',
        'rightMargin' => 'double',
        'topMargin' => 'double',
        'bottomMargin' => 'double',
        'pageSize' => null,
        'enableOpenTypeFeatures' => null,
        'unlinkTableOfContents' => null,
        'updateFields' => null
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
        'renderTrackedChanges' => 'RenderTrackedChanges',
        'leftMargin' => 'LeftMargin',
        'rightMargin' => 'RightMargin',
        'topMargin' => 'TopMargin',
        'bottomMargin' => 'BottomMargin',
        'pageSize' => 'PageSize',
        'enableOpenTypeFeatures' => 'EnableOpenTypeFeatures',
        'unlinkTableOfContents' => 'UnlinkTableOfContents',
        'updateFields' => 'UpdateFields'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'renderTrackedChanges' => 'setRenderTrackedChanges',
        'leftMargin' => 'setLeftMargin',
        'rightMargin' => 'setRightMargin',
        'topMargin' => 'setTopMargin',
        'bottomMargin' => 'setBottomMargin',
        'pageSize' => 'setPageSize',
        'enableOpenTypeFeatures' => 'setEnableOpenTypeFeatures',
        'unlinkTableOfContents' => 'setUnlinkTableOfContents',
        'updateFields' => 'setUpdateFields'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'renderTrackedChanges' => 'getRenderTrackedChanges',
        'leftMargin' => 'getLeftMargin',
        'rightMargin' => 'getRightMargin',
        'topMargin' => 'getTopMargin',
        'bottomMargin' => 'getBottomMargin',
        'pageSize' => 'getPageSize',
        'enableOpenTypeFeatures' => 'getEnableOpenTypeFeatures',
        'unlinkTableOfContents' => 'getUnlinkTableOfContents',
        'updateFields' => 'getUpdateFields'
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

    const PAGE_SIZE_UNSPECIFIED = 'Unspecified';
    const PAGE_SIZE_LETTER = 'Letter';
    const PAGE_SIZE_LEDGER = 'Ledger';
    const PAGE_SIZE_A0 = 'A0';
    const PAGE_SIZE_A1 = 'A1';
    const PAGE_SIZE_A2 = 'A2';
    const PAGE_SIZE_A3 = 'A3';
    const PAGE_SIZE_A4 = 'A4';
    

    
    /*
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPageSizeAllowableValues()
    {
        return [
            self::PAGE_SIZE_UNSPECIFIED,
            self::PAGE_SIZE_LETTER,
            self::PAGE_SIZE_LEDGER,
            self::PAGE_SIZE_A0,
            self::PAGE_SIZE_A1,
            self::PAGE_SIZE_A2,
            self::PAGE_SIZE_A3,
            self::PAGE_SIZE_A4,
        ];
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
        $this->container['renderTrackedChanges'] = isset($data['renderTrackedChanges']) ? $data['renderTrackedChanges'] : null;
        $this->container['leftMargin'] = isset($data['leftMargin']) ? $data['leftMargin'] : null;
        $this->container['rightMargin'] = isset($data['rightMargin']) ? $data['rightMargin'] : null;
        $this->container['topMargin'] = isset($data['topMargin']) ? $data['topMargin'] : null;
        $this->container['bottomMargin'] = isset($data['bottomMargin']) ? $data['bottomMargin'] : null;
        $this->container['pageSize'] = isset($data['pageSize']) ? $data['pageSize'] : null;
        $this->container['enableOpenTypeFeatures'] = isset($data['enableOpenTypeFeatures']) ? $data['enableOpenTypeFeatures'] : null;
        $this->container['unlinkTableOfContents'] = isset($data['unlinkTableOfContents']) ? $data['unlinkTableOfContents'] : null;
        $this->container['updateFields'] = isset($data['updateFields']) ? $data['updateFields'] : null;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['renderTrackedChanges'] === null) {
            $invalidProperties[] = "'renderTrackedChanges' can't be null";
        }
        if ($this->container['leftMargin'] === null) {
            $invalidProperties[] = "'leftMargin' can't be null";
        }
        if ($this->container['rightMargin'] === null) {
            $invalidProperties[] = "'rightMargin' can't be null";
        }
        if ($this->container['topMargin'] === null) {
            $invalidProperties[] = "'topMargin' can't be null";
        }
        if ($this->container['bottomMargin'] === null) {
            $invalidProperties[] = "'bottomMargin' can't be null";
        }
        if ($this->container['pageSize'] === null) {
            $invalidProperties[] = "'pageSize' can't be null";
        }
        $allowedValues = $this->getPageSizeAllowableValues();
        if (!in_array($this->container['pageSize'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'pageSize', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['enableOpenTypeFeatures'] === null) {
            $invalidProperties[] = "'enableOpenTypeFeatures' can't be null";
        }
        if ($this->container['unlinkTableOfContents'] === null) {
            $invalidProperties[] = "'unlinkTableOfContents' can't be null";
        }
        if ($this->container['updateFields'] === null) {
            $invalidProperties[] = "'updateFields' can't be null";
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

        if ($this->container['renderTrackedChanges'] === null) {
            return false;
        }
        if ($this->container['leftMargin'] === null) {
            return false;
        }
        if ($this->container['rightMargin'] === null) {
            return false;
        }
        if ($this->container['topMargin'] === null) {
            return false;
        }
        if ($this->container['bottomMargin'] === null) {
            return false;
        }
        if ($this->container['pageSize'] === null) {
            return false;
        }
        $allowedValues = $this->getPageSizeAllowableValues();
        if (!in_array($this->container['pageSize'], $allowedValues)) {
            return false;
        }
        if ($this->container['enableOpenTypeFeatures'] === null) {
            return false;
        }
        if ($this->container['unlinkTableOfContents'] === null) {
            return false;
        }
        if ($this->container['updateFields'] === null) {
            return false;
        }
        return true;
    }


    /*
     * Gets renderTrackedChanges
     *
     * @return bool
     */
    public function getRenderTrackedChanges()
    {
        return $this->container['renderTrackedChanges'];
    }

    /*
     * Sets renderTrackedChanges
     *
     * @param bool $renderTrackedChanges Enables tracked changes (revisions) rendering
     *
     * @return $this
     */
    public function setRenderTrackedChanges($renderTrackedChanges)
    {
        $this->container['renderTrackedChanges'] = $renderTrackedChanges;

        return $this;
    }

    /*
     * Gets leftMargin
     *
     * @return double
     */
    public function getLeftMargin()
    {
        return $this->container['leftMargin'];
    }

    /*
     * Sets leftMargin
     *
     * @param double $leftMargin Left page margin (for HTML rendering only)
     *
     * @return $this
     */
    public function setLeftMargin($leftMargin)
    {
        $this->container['leftMargin'] = $leftMargin;

        return $this;
    }

    /*
     * Gets rightMargin
     *
     * @return double
     */
    public function getRightMargin()
    {
        return $this->container['rightMargin'];
    }

    /*
     * Sets rightMargin
     *
     * @param double $rightMargin Right page margin (for HTML rendering only)
     *
     * @return $this
     */
    public function setRightMargin($rightMargin)
    {
        $this->container['rightMargin'] = $rightMargin;

        return $this;
    }

    /*
     * Gets topMargin
     *
     * @return double
     */
    public function getTopMargin()
    {
        return $this->container['topMargin'];
    }

    /*
     * Sets topMargin
     *
     * @param double $topMargin Top page margin (for HTML rendering only)
     *
     * @return $this
     */
    public function setTopMargin($topMargin)
    {
        $this->container['topMargin'] = $topMargin;

        return $this;
    }

    /*
     * Gets bottomMargin
     *
     * @return double
     */
    public function getBottomMargin()
    {
        return $this->container['bottomMargin'];
    }

    /*
     * Sets bottomMargin
     *
     * @param double $bottomMargin Bottom page margin (for HTML rendering only)
     *
     * @return $this
     */
    public function setBottomMargin($bottomMargin)
    {
        $this->container['bottomMargin'] = $bottomMargin;

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
     * @param string $pageSize The size of the page.
     *
     * @return $this
     */
    public function setPageSize($pageSize)
    {
        $allowedValues = $this->getPageSizeAllowableValues();
        if ((!is_numeric($pageSize) && !in_array($pageSize, $allowedValues)) || (is_numeric($pageSize) && !in_array($allowedValues[$pageSize], $allowedValues))) {
            throw new \InvalidArgumentException(sprintf("Invalid value for 'pageSize', must be one of '%s'", implode("', '", $allowedValues)));
        }
			
        $this->container['pageSize'] = $pageSize;

        return $this;
    }

    /*
     * Gets enableOpenTypeFeatures
     *
     * @return bool
     */
    public function getEnableOpenTypeFeatures()
    {
        return $this->container['enableOpenTypeFeatures'];
    }

    /*
     * Sets enableOpenTypeFeatures
     *
     * @param bool $enableOpenTypeFeatures This option enables kerning and other OpenType Features when rendering Arabic, Hebrew, Indian Latin-based, or Cyrillic-based scripts.
     *
     * @return $this
     */
    public function setEnableOpenTypeFeatures($enableOpenTypeFeatures)
    {
        $this->container['enableOpenTypeFeatures'] = $enableOpenTypeFeatures;

        return $this;
    }

    /*
     * Gets unlinkTableOfContents
     *
     * @return bool
     */
    public function getUnlinkTableOfContents()
    {
        return $this->container['unlinkTableOfContents'];
    }

    /*
     * Sets unlinkTableOfContents
     *
     * @param bool $unlinkTableOfContents When rendering to HTML or PDF, you can set this option to `true` to disable navigation from the table of contents. For HTML rendering, `a` tags with relative links will be replaced with `span` tags, removing functionality but preserving visual appearance. For PDF rendering, the table of contents will be rendered as plain text without links to document sections.
     *
     * @return $this
     */
    public function setUnlinkTableOfContents($unlinkTableOfContents)
    {
        $this->container['unlinkTableOfContents'] = $unlinkTableOfContents;

        return $this;
    }

    /*
     * Gets updateFields
     *
     * @return bool
     */
    public function getUpdateFields()
    {
        return $this->container['updateFields'];
    }

    /*
     * Sets updateFields
     *
     * @param bool $updateFields Determines if fields of certain types should be updated before saving the input WordProcessing document to the HTML, PDF, PNG, or JPEG output formats. Default value for this property is true — fields will be updated before saving.
     *
     * @return $this
     */
    public function setUpdateFields($updateFields)
    {
        $this->container['updateFields'] = $updateFields;

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


