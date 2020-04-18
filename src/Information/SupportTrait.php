<?php

namespace BookBok\BookInfoScraper\Information;

/**
 * Author information.
 *
 * @package BookBok\BookInfoScraper
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
trait SupportTrait
{
    /**
     * @var int
     */
    private $supported = 0;

    /**
     * Set support flag.
     *
     * @param int $support The supported value flags
     *
     * @return void
     */
    protected function setSupport(int $support): void
    {
        if (1 > $support || 0 !== $support & ($support - 1)) {
            throw new \InvalidArgumentException();
        }

        $this->supported = $this->supported | $support;
    }

    /**
     * Remove support flag.
     *
     * @param int $support The supported value flags
     *
     * @return void
     */
    protected function removeSupport(int $support): void
    {
        if (1 > $support || 0 !== $support & ($support - 1)) {
            throw new \InvalidArgumentException();
        }

        if ($this->supported & $support) {
            $this->supported = $this->supported ^ $support;
        }
    }
}
