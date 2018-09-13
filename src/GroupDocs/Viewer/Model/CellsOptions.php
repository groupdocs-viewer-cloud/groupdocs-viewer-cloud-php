<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="CellsOptions.php">
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
 * CellsOptions
 *
 * @description The Spreadsheet documents rendering options.
 */
class CellsOptions implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "CellsOptions";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'renderGridLines' => 'bool',
        'paginateSheets' => 'bool',
        'countRowsPerPage' => 'int',
        'ignoreEmptyRows' => 'bool',
        'encoding' => 'string',
        'internalHyperlinkPrefix' => 'string',
        'textOverflowMode' => 'string',
        'renderHiddenRows' => 'bool',
        'renderHiddenColumns' => 'bool',
        'renderPrintAreaOnly' => 'bool'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'renderGridLines' => null,
        'paginateSheets' => null,
        'countRowsPerPage' => 'int32',
        'ignoreEmptyRows' => null,
        'encoding' => null,
        'internalHyperlinkPrefix' => null,
        'textOverflowMode' => null,
        'renderHiddenRows' => null,
        'renderHiddenColumns' => null,
        'renderPrintAreaOnly' => null
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
        'renderGridLines' => 'RenderGridLines',
        'paginateSheets' => 'PaginateSheets',
        'countRowsPerPage' => 'CountRowsPerPage',
        'ignoreEmptyRows' => 'IgnoreEmptyRows',
        'encoding' => 'Encoding',
        'internalHyperlinkPrefix' => 'InternalHyperlinkPrefix',
        'textOverflowMode' => 'TextOverflowMode',
        'renderHiddenRows' => 'RenderHiddenRows',
        'renderHiddenColumns' => 'RenderHiddenColumns',
        'renderPrintAreaOnly' => 'RenderPrintAreaOnly'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'renderGridLines' => 'setRenderGridLines',
        'paginateSheets' => 'setPaginateSheets',
        'countRowsPerPage' => 'setCountRowsPerPage',
        'ignoreEmptyRows' => 'setIgnoreEmptyRows',
        'encoding' => 'setEncoding',
        'internalHyperlinkPrefix' => 'setInternalHyperlinkPrefix',
        'textOverflowMode' => 'setTextOverflowMode',
        'renderHiddenRows' => 'setRenderHiddenRows',
        'renderHiddenColumns' => 'setRenderHiddenColumns',
        'renderPrintAreaOnly' => 'setRenderPrintAreaOnly'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'renderGridLines' => 'getRenderGridLines',
        'paginateSheets' => 'getPaginateSheets',
        'countRowsPerPage' => 'getCountRowsPerPage',
        'ignoreEmptyRows' => 'getIgnoreEmptyRows',
        'encoding' => 'getEncoding',
        'internalHyperlinkPrefix' => 'getInternalHyperlinkPrefix',
        'textOverflowMode' => 'getTextOverflowMode',
        'renderHiddenRows' => 'getRenderHiddenRows',
        'renderHiddenColumns' => 'getRenderHiddenColumns',
        'renderPrintAreaOnly' => 'getRenderPrintAreaOnly'
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
        $this->container['renderGridLines'] = isset($data['renderGridLines']) ? $data['renderGridLines'] : null;
        $this->container['paginateSheets'] = isset($data['paginateSheets']) ? $data['paginateSheets'] : null;
        $this->container['countRowsPerPage'] = isset($data['countRowsPerPage']) ? $data['countRowsPerPage'] : null;
        $this->container['ignoreEmptyRows'] = isset($data['ignoreEmptyRows']) ? $data['ignoreEmptyRows'] : null;
        $this->container['encoding'] = isset($data['encoding']) ? $data['encoding'] : null;
        $this->container['internalHyperlinkPrefix'] = isset($data['internalHyperlinkPrefix']) ? $data['internalHyperlinkPrefix'] : null;
        $this->container['textOverflowMode'] = isset($data['textOverflowMode']) ? $data['textOverflowMode'] : null;
        $this->container['renderHiddenRows'] = isset($data['renderHiddenRows']) ? $data['renderHiddenRows'] : null;
        $this->container['renderHiddenColumns'] = isset($data['renderHiddenColumns']) ? $data['renderHiddenColumns'] : null;
        $this->container['renderPrintAreaOnly'] = isset($data['renderPrintAreaOnly']) ? $data['renderPrintAreaOnly'] : null;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['renderGridLines'] === null) {
            $invalidProperties[] = "'renderGridLines' can't be null";
        }
        if ($this->container['paginateSheets'] === null) {
            $invalidProperties[] = "'paginateSheets' can't be null";
        }
        if ($this->container['countRowsPerPage'] === null) {
            $invalidProperties[] = "'countRowsPerPage' can't be null";
        }
        if ($this->container['ignoreEmptyRows'] === null) {
            $invalidProperties[] = "'ignoreEmptyRows' can't be null";
        }
        if ($this->container['renderHiddenRows'] === null) {
            $invalidProperties[] = "'renderHiddenRows' can't be null";
        }
        if ($this->container['renderHiddenColumns'] === null) {
            $invalidProperties[] = "'renderHiddenColumns' can't be null";
        }
        if ($this->container['renderPrintAreaOnly'] === null) {
            $invalidProperties[] = "'renderPrintAreaOnly' can't be null";
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

        if ($this->container['renderGridLines'] === null) {
            return false;
        }
        if ($this->container['paginateSheets'] === null) {
            return false;
        }
        if ($this->container['countRowsPerPage'] === null) {
            return false;
        }
        if ($this->container['ignoreEmptyRows'] === null) {
            return false;
        }
        if ($this->container['renderHiddenRows'] === null) {
            return false;
        }
        if ($this->container['renderHiddenColumns'] === null) {
            return false;
        }
        if ($this->container['renderPrintAreaOnly'] === null) {
            return false;
        }
        return true;
    }


    /*
     * Gets renderGridLines
     *
     * @return bool
     */
    public function getRenderGridLines()
    {
        return $this->container['renderGridLines'];
    }

    /*
     * Sets renderGridLines
     *
     * @param bool $renderGridLines Indicates whether to render grid lines.
     *
     * @return $this
     */
    public function setRenderGridLines($renderGridLines)
    {
        $this->container['renderGridLines'] = $renderGridLines;

        return $this;
    }

    /*
     * Gets paginateSheets
     *
     * @return bool
     */
    public function getPaginateSheets()
    {
        return $this->container['paginateSheets'];
    }

    /*
     * Sets paginateSheets
     *
     * @param bool $paginateSheets Allows to enable worksheets pagination. By default one worksheet is rendered into one page.
     *
     * @return $this
     */
    public function setPaginateSheets($paginateSheets)
    {
        $this->container['paginateSheets'] = $paginateSheets;

        return $this;
    }

    /*
     * Gets countRowsPerPage
     *
     * @return int
     */
    public function getCountRowsPerPage()
    {
        return $this->container['countRowsPerPage'];
    }

    /*
     * Sets countRowsPerPage
     *
     * @param int $countRowsPerPage The number of rows rendered into one page when PaginateSheets = true. Default value is 50.
     *
     * @return $this
     */
    public function setCountRowsPerPage($countRowsPerPage)
    {
        $this->container['countRowsPerPage'] = $countRowsPerPage;

        return $this;
    }

    /*
     * Gets ignoreEmptyRows
     *
     * @return bool
     */
    public function getIgnoreEmptyRows()
    {
        return $this->container['ignoreEmptyRows'];
    }

    /*
     * Sets ignoreEmptyRows
     *
     * @param bool $ignoreEmptyRows Indicates whether empty rows should be ignored.
     *
     * @return $this
     */
    public function setIgnoreEmptyRows($ignoreEmptyRows)
    {
        $this->container['ignoreEmptyRows'] = $ignoreEmptyRows;

        return $this;
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
     * @param string $encoding The text (*.csv) document encoding.
     *
     * @return $this
     */
    public function setEncoding($encoding)
    {
        $this->container['encoding'] = $encoding;

        return $this;
    }

    /*
     * Gets internalHyperlinkPrefix
     *
     * @return string
     */
    public function getInternalHyperlinkPrefix()
    {
        return $this->container['internalHyperlinkPrefix'];
    }

    /*
     * Sets internalHyperlinkPrefix
     *
     * @param string $internalHyperlinkPrefix Prefix for hyper-link that references worksheet inside the same document. For rendering document as HTML only.
     *
     * @return $this
     */
    public function setInternalHyperlinkPrefix($internalHyperlinkPrefix)
    {
        $this->container['internalHyperlinkPrefix'] = $internalHyperlinkPrefix;

        return $this;
    }

    /*
     * Gets textOverflowMode
     *
     * @return string
     */
    public function getTextOverflowMode()
    {
        return $this->container['textOverflowMode'];
    }

    /*
     * Sets textOverflowMode
     *
     * @param string $textOverflowMode Text overflow mode applied when the text is too big to fit into the cell. Supported values {Overlay|OverlayIfNextIsEmpty|HideText|AutoFitColumn}: 1. Overlay - overlay next cells even they are not empty. 2. OverlayIfNextIsEmpty - overlay next cells only if they are not empty (default). 3. HideText - hide overflow text. 4. AutoFitColumn - expand cell width to fit overflowed text.
     *
     * @return $this
     */
    public function setTextOverflowMode($textOverflowMode)
    {
        $this->container['textOverflowMode'] = $textOverflowMode;

        return $this;
    }

    /*
     * Gets renderHiddenRows
     *
     * @return bool
     */
    public function getRenderHiddenRows()
    {
        return $this->container['renderHiddenRows'];
    }

    /*
     * Sets renderHiddenRows
     *
     * @param bool $renderHiddenRows Enables rendering of hidden rows.
     *
     * @return $this
     */
    public function setRenderHiddenRows($renderHiddenRows)
    {
        $this->container['renderHiddenRows'] = $renderHiddenRows;

        return $this;
    }

    /*
     * Gets renderHiddenColumns
     *
     * @return bool
     */
    public function getRenderHiddenColumns()
    {
        return $this->container['renderHiddenColumns'];
    }

    /*
     * Sets renderHiddenColumns
     *
     * @param bool $renderHiddenColumns Enables rendering of hidden columns.
     *
     * @return $this
     */
    public function setRenderHiddenColumns($renderHiddenColumns)
    {
        $this->container['renderHiddenColumns'] = $renderHiddenColumns;

        return $this;
    }

    /*
     * Gets renderPrintAreaOnly
     *
     * @return bool
     */
    public function getRenderPrintAreaOnly()
    {
        return $this->container['renderPrintAreaOnly'];
    }

    /*
     * Sets renderPrintAreaOnly
     *
     * @param bool $renderPrintAreaOnly Enables rendering worksheet(s) sections which is defined as print area. Renders each print area in a worksheet as a separate page.
     *
     * @return $this
     */
    public function setRenderPrintAreaOnly($renderPrintAreaOnly)
    {
        $this->container['renderPrintAreaOnly'] = $renderPrintAreaOnly;

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


