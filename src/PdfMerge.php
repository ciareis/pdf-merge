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
        bool $pdfa = false,
        private array $footer_data = [
            new PdfFooter(),
        ],
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

    public function footer()
    {
        foreach ($this->footer_data as $footer) {
            $this->SetY(-19.9);
            $this->SetFont($footer->font, $footer->style, $footer->size);
            if ($footer->link) {
                $this->SetTextColor(0, 0, 255);
                $this->SetAutoPageBreak(true, 15);
                $this->Write($footer->height, $footer->getFooter($this), $footer->link, 0, 'L', true, 0, false, true, 0);

                continue;
            }
            $this->SetTextColor(0, 0, 0);
            $this->SetAutoPageBreak(true, 15);
            $this->Cell(20, $footer->height, $footer->getFooter($this), 0, false, $footer->align, 0, '', 0, false, 'T', 'M');
        }
    }
}
