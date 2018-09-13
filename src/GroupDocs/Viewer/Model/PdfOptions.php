<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="PdfOptions.php">
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
 * PdfOptions
 *
 * @description The PDF documents rendering options.
 */
class PdfOptions implements ArrayAccess
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
        'enablePreciseRendering' => 'bool',
        'enableInitialContentOrdering' => 'bool',
        'renderLayersSeparately' => 'bool',
        'imageQuality' => 'string'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'enablePreciseRendering' => null,
        'enableInitialContentOrdering' => null,
        'renderLayersSeparately' => null,
        'imageQuality' => null
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
        'enablePreciseRendering' => 'EnablePreciseRendering',
        'enableInitialContentOrdering' => 'EnableInitialContentOrdering',
        'renderLayersSeparately' => 'RenderLayersSeparately',
        'imageQuality' => 'ImageQuality'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'enablePreciseRendering' => 'setEnablePreciseRendering',
        'enableInitialContentOrdering' => 'setEnableInitialContentOrdering',
        'renderLayersSeparately' => 'setRenderLayersSeparately',
        'imageQuality' => 'setImageQuality'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'enablePreciseRendering' => 'getEnablePreciseRendering',
        'enableInitialContentOrdering' => 'getEnableInitialContentOrdering',
        'renderLayersSeparately' => 'getRenderLayersSeparately',
        'imageQuality' => 'getImageQuality'
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
        $this->container['enablePreciseRendering'] = isset($data['enablePreciseRendering']) ? $data['enablePreciseRendering'] : null;
        $this->container['enableInitialContentOrdering'] = isset($data['enableInitialContentOrdering']) ? $data['enableInitialContentOrdering'] : null;
        $this->container['renderLayersSeparately'] = isset($data['renderLayersSeparately']) ? $data['renderLayersSeparately'] : null;
        $this->container['imageQuality'] = isset($data['imageQuality']) ? $data['imageQuality'] : null;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['enablePreciseRendering'] === null) {
            $invalidProperties[] = "'enablePreciseRendering' can't be null";
        }
        if ($this->container['enableInitialContentOrdering'] === null) {
            $invalidProperties[] = "'enableInitialContentOrdering' can't be null";
        }
        if ($this->container['renderLayersSeparately'] === null) {
            $invalidProperties[] = "'renderLayersSeparately' can't be null";
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

        if ($this->container['enablePreciseRendering'] === null) {
            return false;
        }
        if ($this->container['enableInitialContentOrdering'] === null) {
            return false;
        }
        if ($this->container['renderLayersSeparately'] === null) {
            return false;
        }
        return true;
    }


    /*
     * Gets enablePreciseRendering
     *
     * @return bool
     */
    public function getEnablePreciseRendering()
    {
        return $this->container['enablePreciseRendering'];
    }

    /*
     * Sets enablePreciseRendering
     *
     * @param bool $enablePreciseRendering Indicates whether the PDF document is rendered in a precise mode or not. It is recommended to enable this option when rendering documents with complex content e.g. documents which contains hieroglyphs or any kind o glyphs which should be rendered separately from each other.
     *
     * @return $this
     */
    public function setEnablePreciseRendering($enablePreciseRendering)
    {
        $this->container['enablePreciseRendering'] = $enablePreciseRendering;

        return $this;
    }

    /*
     * Gets enableInitialContentOrdering
     *
     * @return bool
     */
    public function getEnableInitialContentOrdering()
    {
        return $this->container['enableInitialContentOrdering'];
    }

    /*
     * Sets enableInitialContentOrdering
     *
     * @param bool $enableInitialContentOrdering When this option is enabled content (graphics and text) will be added to HTML document accordingly Z-order in original PDF document. When this option is disabled content (graphics and text) will be added to a single layer.
     *
     * @return $this
     */
    public function setEnableInitialContentOrdering($enableInitialContentOrdering)
    {
        $this->container['enableInitialContentOrdering'] = $enableInitialContentOrdering;

        return $this;
    }

    /*
     * Gets renderLayersSeparately
     *
     * @return bool
     */
    public function getRenderLayersSeparately()
    {
        return $this->container['renderLayersSeparately'];
    }

    /*
     * Sets renderLayersSeparately
     *
     * @param bool $renderLayersSeparately When this option is enabled layers will be separated from each other in the HTML document.
     *
     * @return $this
     */
    public function setRenderLayersSeparately($renderLayersSeparately)
    {
        $this->container['renderLayersSeparately'] = $renderLayersSeparately;

        return $this;
    }

    /*
     * Gets imageQuality
     *
     * @return string
     */
    public function getImageQuality()
    {
        return $this->container['imageQuality'];
    }

    /*
     * Sets imageQuality
     *
     * @param string $imageQuality Specifies output image quality for image resources when rendering as HTML. The default value is Low. Supported values {Low|Medium|High}: 1. Low - satisfying image quality and smallest image size. 2. Medium - better image quality and larger image size. 3. High - best image quality with largest image size.
     *
     * @return $this
     */
    public function setImageQuality($imageQuality)
    {
        $this->container['imageQuality'] = $imageQuality;

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


