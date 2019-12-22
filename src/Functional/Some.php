<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2017 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

namespace Functional;

use Functional\Exceptions\InvalidArgumentException;
use Traversable;

/**
 * Returns true if some of the elements in the collection pass the callback truthy test. Short-circuits and stops
 * traversing the collection if a truthy element is found. Callback arguments will be value, index, collection
 *
 * @template K of array-key
 * @template V
 * @param iterable<K, V> $collection
 * @param callable(V, K, iterable<K, V>): bool $callback
 * @return bool
 * @psalm-pure
 */
function some($collection, callable $callback): bool
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    foreach ($collection as $index => $element) {
        if ($callback($element, $index, $collection)) {
            return true;
        }
    }

    return false;
}
