<?php
namespace Datapp\Tool;

use InvalidArgumentException;

/**
 * Generate a pseudo-random string of bytes
 *
 * @author Manuel Dimmler <info@datapp.de>
 */
class RandomByteGenerator
{

    /**
     * @var int
     */
    protected $length;

    /**
     * class constructor
     * @param int $length
     * @throws InvalidArgumentException
     */
    public function __construct($length)
    {
        if (!is_int($length)) {
            throw new InvalidArgumentException(sprintf('integer expected, %s given', gettype($length)));
        }

        if ($length <= 0) {
            throw new InvalidArgumentException(sprintf('length has to be greater than 0, %d given', $length));
        }
        
        $this->length = $length;
    }

    /**
     * get a pseudo-random string of bytes
     * @return string
     */
    public function getString()
    {
        return openssl_random_pseudo_bytes($this->length);
    }
}
