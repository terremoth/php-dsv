<?php

namespace DSV;

use Exception;

class Reader
{
    use DSV;

    /**
     * @throws Exception
     */
    public function __construct(public string $inputFile)
    {
        if (!file_exists($this->inputFile)) {
            throw new Exception('Error: file ' . $this->inputFile . ' not found.');
        }
    }

    /**
     * @return array
     */
    public function read(): array
    {
        $content = trim(file_get_contents($this->inputFile));
        $rows = explode($this->recordSeparator, $content);
        $cells = [];

        foreach ($rows as $row) {
            $cells[] = explode($this->delimiter, $row);
        }

        return $cells;
    }
}
