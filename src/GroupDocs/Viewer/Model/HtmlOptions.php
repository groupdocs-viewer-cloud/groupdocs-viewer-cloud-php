<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="HtmlOptions.php">
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
use \GroupDocs\Viewer\ObjectSerializer;

/*
 * HtmlOptions
 *
 * @description Provides options for rendering document pages as HTML.
 */
class HtmlOptions extends RenderOptions 
{
    const DISCRIMINATOR = null;

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "HtmlOptions";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'resourcePath' => 'string',
        'ignoreResourcePathInResources' => 'bool',
        'embedResources' => 'bool',
        'enableMinification' => 'bool',
        'enableResponsiveRendering' => 'bool',
        'excludeFonts' => 'bool'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'resourcePath' => null,
        'ignoreResourcePathInResources' => null,
        'embedResources' => null,
        'enableMinification' => null,
        'enableResponsiveRendering' => null,
        'excludeFonts' => null
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
        'resourcePath' => 'ResourcePath',
        'ignoreResourcePathInResources' => 'IgnoreResourcePathInResources',
        'embedResources' => 'EmbedResources',
        'enableMinification' => 'EnableMinification',
        'enableResponsiveRendering' => 'EnableResponsiveRendering',
        'excludeFonts' => 'ExcludeFonts'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'resourcePath' => 'setResourcePath',
        'ignoreResourcePathInResources' => 'setIgnoreResourcePathInResources',
        'embedResources' => 'setEmbedResources',
        'enableMinification' => 'setEnableMinification',
        'enableResponsiveRendering' => 'setEnableResponsiveRendering',
        'excludeFonts' => 'setExcludeFonts'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'resourcePath' => 'getResourcePath',
        'ignoreResourcePathInResources' => 'getIgnoreResourcePathInResources',
        'embedResources' => 'getEmbedResources',
        'enableMinification' => 'getEnableMinification',
        'enableResponsiveRendering' => 'getEnableResponsiveRendering',
        'excludeFonts' => 'getExcludeFonts'
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

    

    


    /*
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        parent::__construct($data);

        $this->container['resourcePath'] = isset($data['resourcePath']) ? $data['resourcePath'] : null;
        $this->container['ignoreResourcePathInResources'] = isset($data['ignoreResourcePathInResources']) ? $data['ignoreResourcePathInResources'] : null;
        $this->container['embedResources'] = isset($data['embedResources']) ? $data['embedResources'] : null;
        $this->container['enableMinification'] = isset($data['enableMinification']) ? $data['enableMinification'] : null;
        $this->container['enableResponsiveRendering'] = isset($data['enableResponsiveRendering']) ? $data['enableResponsiveRendering'] : null;
        $this->container['excludeFonts'] = isset($data['excludeFonts']) ? $data['excludeFonts'] : null;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

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

        return true;
    }


    /*
     * Gets resourcePath
     *
     * @return string
     */
    public function getResourcePath()
    {
        return $this->container['resourcePath'];
    }

    /*
     * Sets resourcePath
     *
     * @param string $resourcePath Allows to specify HTML resources (styles, images and fonts) path. For example when resource path is http://example.com/api/pages/{page-number}/resources/{resource-name} the {page-number} and {resource-name} templates will be replaced with page number and resource name accordingly. Ignored when EmbedResources option is set to true.
     *
     * @return $this
     */
    public function setResourcePath($resourcePath)
    {
        $this->container['resourcePath'] = $resourcePath;

        return $this;
    }

    /*
     * Gets ignoreResourcePathInResources
     *
     * @return bool
     */
    public function getIgnoreResourcePathInResources()
    {
        return $this->container['ignoreResourcePathInResources'];
    }

    /*
     * Sets ignoreResourcePathInResources
     *
     * @param bool $ignoreResourcePathInResources Allows to ignore ResourcePath when processing *.css files.  When this options is enabled ResourcePath won't be added to resource references in *.css file.
     *
     * @return $this
     */
    public function setIgnoreResourcePathInResources($ignoreResourcePathInResources)
    {
        $this->container['ignoreResourcePathInResources'] = $ignoreResourcePathInResources;

        return $this;
    }

    /*
     * Gets embedResources
     *
     * @return bool
     */
    public function getEmbedResources()
    {
        return $this->container['embedResources'];
    }

    /*
     * Sets embedResources
     *
     * @param bool $embedResources Controls output HTML document resources (styles, images and fonts) saving. When this options set to true all resources will be embedded into HTML document and ResourcePath option value will be ignored.
     *
     * @return $this
     */
    public function setEmbedResources($embedResources)
    {
        $this->container['embedResources'] = $embedResources;

        return $this;
    }

    /*
     * Gets enableMinification
     *
     * @return bool
     */
    public function getEnableMinification()
    {
        return $this->container['enableMinification'];
    }

    /*
     * Sets enableMinification
     *
     * @param bool $enableMinification Enables content (HTML, CSS and SVG) minification.
     *
     * @return $this
     */
    public function setEnableMinification($enableMinification)
    {
        $this->container['enableMinification'] = $enableMinification;

        return $this;
    }

    /*
     * Gets enableResponsiveRendering
     *
     * @return bool
     */
    public function getEnableResponsiveRendering()
    {
        return $this->container['enableResponsiveRendering'];
    }

    /*
     * Sets enableResponsiveRendering
     *
     * @param bool $enableResponsiveRendering Indicates whether rendering will provide responsive web pages, that look well on different device types.
     *
     * @return $this
     */
    public function setEnableResponsiveRendering($enableResponsiveRendering)
    {
        $this->container['enableResponsiveRendering'] = $enableResponsiveRendering;

        return $this;
    }

    /*
     * Gets excludeFonts
     *
     * @return bool
     */
    public function getExcludeFonts()
    {
        return $this->container['excludeFonts'];
    }

    /*
     * Sets excludeFonts
     *
     * @param bool $excludeFonts Prevents adding fonts to the output HTML document.
     *
     * @return $this
     */
    public function setExcludeFonts($excludeFonts)
    {
        $this->container['excludeFonts'] = $excludeFonts;

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


