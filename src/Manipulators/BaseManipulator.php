<?php

namespace AndriesLouw\imagesweserv\Manipulators;

use Jcupitt\Vips\Image;

abstract class BaseManipulator implements ManipulatorInterface
{
    /**
     * The manipulation params.
     *
     * @var array
     */
    public $params = [];

    /**
     * Set the manipulation params.
     *
     * @param array $params The manipulation params.
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * Get a specific manipulation param.
     *
     * @param  string $name The manipulation name.
     *
     * @return string|null The manipulation value.
     */
    public function __get(string $name)
    {
        if (isset($this->params[$name])) {
            return $this->params[$name];
        }
        return null;
    }

    /**
     * Set any property on the manipulation params.
     *
     * @param string $name The property name.
     * @param mixed $value The value to set for this property.
     *
     * @return void
     */
    public function __set(string $name, $value)
    {
        $this->params[$name] = $value;
    }

    /**
     * Perform the image manipulation.
     *
     * @param  Image $image The source image.
     *
     * @return Image The manipulated image.
     */
    abstract public function run(Image $image): Image;
}
