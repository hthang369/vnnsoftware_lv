<?php

namespace Modules\Core\Presenters;

use Illuminate\Support\Collection;
use Modules\Core\Transformers\BaseTransformer;
use Prettus\Repository\Contracts\PresenterInterface;
use Prettus\Repository\Contracts\Transformable;

/**
 * Class BasePresenter.
 *
 * @package namespace Modules\Core\Presenters;
 */
class BasePresenter implements PresenterInterface
{
    /**
     * The object injected on Presenter construction.
     *
     * @var mixed
     */
    protected $object;

    /**
     * Prepare data to present
     *
     * @param $data
     *
     * @return mixed
     */
    public function present($data)
    {
        $this->object = $data;
        if ($this->object instanceof Collection) {
            return $this->object->transform(function($model) {
                if ($model instanceof Transformable) {
                    return $model->transform();
                }
                return $model;
            });
        }
        return $this->object;
    }

    /**
     * Pass any unknown variable calls to present{$variable} or fall through to the injected object.
     *
     * @param string $var
     *
     * @return mixed
     */
    public function __get($var)
    {
        if ($method = $this->getPresenterMethodFromVariable($var)) {
            return $this->$method();
        }

        return $this->__getDecorator()->decorate(is_array($this->object) ? $this->object[$var] : $this->object->$var);
    }

    /**
     * Pass any unknown methods through to the inject object.
     *
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        if (is_object($this->object)) {
            $value = call_user_func_array([$this->object, $method], $arguments);

            return $this->__getDecorator()->decorate($value);
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }

    /**
     * Allow ability to run isset() on a variable.
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        if ($method = $this->getPresenterMethodFromVariable($name)) {
            $result = $this->$method();

            return isset($result);
        }

        if (is_array($this->object)) {
            return isset($this->object[$name]);
        }

        return isset($this->object->$name);
    }

    /**
     * Allow to unset a variable through the presenter.
     *
     * @param string $name
     */
    public function __unset($name)
    {
        if (is_array($this->object)) {
            unset($this->object[$name]);

            return;
        }

        unset($this->object->$name);
    }

    /**
     * Fetch the 'present' method name for the given variable.
     *
     * @param string $variable
     *
     * @return string|null
     */
    protected function getPresenterMethodFromVariable($variable)
    {
        $method = 'present'.str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $variable)));
        if (method_exists($this, $method)) {
            return $method;
        }
    }
}
