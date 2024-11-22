<?php

namespace DSV;

class DSVWriter extends DSV
{
    public function __construct(protected string $outputFile)
    {
    }

    /**
     * @param array $data
     * @param string $mode
     * @return void
     */
    public function write(array $data, string $mode = 'wb'): void
    {
        $file = fopen($this->outputFile, $mode);
        $size = count($data);

        /**
         * @var int $rowNumber
         * @var array<array-key, scalar> $row
         */
        foreach ($data as $rowNumber => $row) {
            $newRow = implode($this->delimiter, $row);

            // the record separator shouldn't be added to the end of the file:
            if ($rowNumber !== $size - 1) {
                $newRow .= $this->recordSeparator;
            }

            fwrite($file, $newRow);
        }

        fclose($file);
    }
}