<?php

namespace DSV;

trait DSV
{
    /**
     * @var non-empty-string
     */
    public string $delimiter = "\x1F";

    /**
     * @var non-empty-string
     */
    public string $recordSeparator = "\x1E";
}
