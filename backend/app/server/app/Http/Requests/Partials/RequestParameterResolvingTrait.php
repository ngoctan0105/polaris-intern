<?php

namespace App\Http\Requests\Partials;

use Libs\Http\Response\KResponseCode;

/**
 * Trait RouteParameterResolvingTrait help Requests's resolve input parameters into into instance's variables.
 *
 * This will help request **setup** the parameters only once and **cache** for future usage, or **freeze** the request
 * into **Data Transfer Object** when necessary.
 *
 * - Will call target's `setupParameters()` method if exists.
 * - Use target's `INPUT_PARAMETERS` class constant to perform resolving.
 *
 * **Example 1**: use default mapping
 *
 * ```php
 *  // declare parameters for RouteParameterResolvingTrait
 *  const INPUT_PARAMETERS = ['user_name', 'password'];
 *
 *  // requests's parameters
 *  private $user_name;
 *  private $password;
 * ```
 *
 * That's enough to have `$user_name` and `$password` variable ready when the `Request` is resolved. <br>
 * <br>
 * **Example 2**: Use custom resolving methods
 *
 * ```php
 *  const INPUT_PARAMETERS = ['user'];
 *
 *  private $user;
 *
 *  // Resolve user parameter, `$value` is the raw value come from client.
 *  protected resolveUser($value) : ModelUser|null {
 *      return app(UserRepository::class)->resolveUser($value);
 *  }
 * ```
 *
 * **Example 3**: custom parameters setup
 * ```php
 *  private $user;
 *
 *  function setupParameters() {
 *      $this->user = app(UserRepository::class)->resolveUser($this->input('user'))
 *  }
 * ```
 *
 * @package App\Http\Requests\Partials
 */
trait RequestParameterResolvingTrait
{
    /**
     * The parameter setup logic should be made after the validate, so we just need to override it here.
     */
    function validateResolved()
    {
        parent::validateResolved();

        $this->_setupParametersFromRequestInput();
        if (method_exists($this, 'setupParameters')) {
            $this->setupParameters();
        }
    }

    /**
     * Setup the parameters from input.
     * This method initialize $this instance's attributes using INPUT_PARAMETERS array and private attributes with
     *
     * @parameter annotation.
     *
     * @throws \ReflectionException
     */
    function _setupParametersFromRequestInput()
    {
        $parameter_set = [];
        $class         = static::class;
        do {
            // setup parameters from INPUT_PARAMETER array

            $reflection = new \ReflectionClass($class);
            if (defined("$class::INPUT_PARAMETERS")) {
                if (!empty($class::INPUT_PARAMETERS)) {
                    foreach ($class::INPUT_PARAMETERS as $key => $parameter) {
                        $name = is_int($key) ? $parameter : $key;
                        if (@$parameter_set[$name]) continue;
                        $parameter_set[$name] = true;
                        $result               = $this->resolveInputParameter($class, $name, $parameter, false);

                        $prop_reflection = $reflection->getProperty($name);
                        $prop_reflection->setAccessible(true);
                        $prop_reflection->setValue($this, $result);
                    }
                }
            }

            // resolve for private variables
            $private_properties = $reflection->getProperties(\ReflectionProperty::IS_PRIVATE);
            foreach ($private_properties as $prop) {
                if (preg_match('#@parameter\b#ism', $prop->getDocComment())) {
                    $name = $prop->getName();
                    if (@$parameter_set[$name]) continue;
                    $parameter_set[$name] = true;
                    $is_file              = preg_match('#@file\b#ism', $prop->getDocComment());
                    $result               = $this->_resolveInputParameter($class, $name, $name, $is_file);

                    $prop_reflection = $reflection->getProperty($name);
                    $prop_reflection->setAccessible(true);
                    $prop_reflection->setValue($this, $result);
                }
            }

            $class = get_parent_class($class);
        } while ($class);
    }

    /**
     * Obtain the parameter from input, transform by the corresponding resolve method if exists.
     *
     * @param string  $class
     * @param string  $key       string the attribute name of $this
     * @param string  $parameter string the parameter name from input
     *
     * @param boolean $is_file
     *
     * @return mixed
     * @throws \ReflectionException
     */
    private function _resolveInputParameter($class, $key, $parameter, $is_file)
    {
        if ($is_file) {
            $value = $this->file($parameter);
        } else {
            $value = $this->input($parameter);
        }

        $method = camel_case("resolve_{$key}_parameter");

        if (method_exists($this, $method)) {
            $method_reflect = new \ReflectionMethod($this, $method);
        } else {
            $class = get_class($this);
            do {
                $class_reflect = new \ReflectionClass($class);
                try {
                    $method_reflect = $class_reflect->getMethod($method);
                    break;
                } catch (\ReflectionException $ex) {
                }
                $class = get_parent_class($class);
            } while ($class);
        }

        if (isset($method_reflect)) {
            $args = [];

            if ($method_reflect->getNumberOfParameters() >= 1) {
                $args[] = $value;
            }

            $prev_value = $value;
            $method_reflect->setAccessible(true);
            $value = $method_reflect->invokeArgs($this, $args);
            if ($prev_value !== null && $value === null) {
                abort(KResponseCode::HTTP_FORBIDDEN);
            }
        }
        return $value;
    }
}