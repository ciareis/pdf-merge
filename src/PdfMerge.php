<?php

namespace Ciareis\PdfMerge;

use TCPDI;

class PdfMerge extends TCPDI
{
    public function __construct(
        string $orientation = 'P',
        string $unit = 'mm',
        string $format = 'A4',
        bool $unicode = true,
        string $encoding = 'UTF-8',
        bool $diskcache = false,
        bool $pdfa = false
    ) {
        parent::__construct(
            $orientation,
            $unit,
            $format,
            $unicode,
            $encoding,
            $diskcache,
            $pdfa
        );
        $this->SetCreator(PDFStatic::getCreator());
    }
}
