<?php

namespace Sven\ArtisanView\Commands\Concerns;

use InvalidArgumentException;

trait ChoosesPath
{
    protected function path(): string
    {
        $paths = $this->possiblePaths();

        if (count($paths) === 0) {
            throw new InvalidArgumentException('There are no paths configured to store the views in.');
        }

        if (count($paths) === 1) {
            return head($paths);
        }

        return $this->choice($this->pathQuestion(), $paths, head($paths));
    }

    abstract protected function pathQuestion(): string;

    abstract protected function possiblePaths(): array;
}
