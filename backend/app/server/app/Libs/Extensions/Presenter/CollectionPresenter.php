<?php


namespace Libs\Extensions\Presenter;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\AbstractPaginator;
use JsonSerializable;

class CollectionPresenter implements Arrayable, JsonSerializable
{
    /**
     * @var array|Collection|AbstractPaginator
     */
    private $collection;
    /**
     * @var string
     */
    private $presenter_class;
    /**
     * @var \Closure
     */
    private $transform;

    /**
     * CollectionPresenter constructor.
     *
     * @param array|Collection|AbstractPaginator $collection
     * @param \Closure                           $transform
     */
    private function __construct($collection, \Closure $transform)
    {

        $this->collection = $collection;
        $this->transform  = $transform;
    }

    /**
     * @param array|Collection|AbstractPaginator $collection
     * @param \Closure                           $transform
     *
     * @return CollectionPresenter
     */
    static function collect($collection, \Closure $transform)
    {
        return new self($collection, $transform);

    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        if ($this->collection instanceof AbstractPaginator) {
            $transform_collection = collect($this->collection->getCollection())->map($this->transform);
            $this->collection->setCollection($transform_collection);
            return $this->collection->toArray();
        }

        $transform_collection = collect($this->collection)->map($this->transform);

        return $transform_collection->toArray();
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link  https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}