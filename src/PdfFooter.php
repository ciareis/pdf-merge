<?php

namespace Ciareis\PdfMerge;

use TCPDI;

class PdfFooter
{
    public function __construct(
        public string $line = 'Page ',
        public bool $set_current_page = true,
        public bool $set_total_pages = true,
        public string $separator = '/',
        public string $font = 'helvetica',
        public string $style = 'I',
        public int $size = 8,
        public string $align = 'C',
        public int $height = 10,
        public ?string $link = null,
    ) {
    }

    public function getFooter(TCPDI $pdf): string
    {
        $footer = $this->line;
        if ($this->set_current_page) {
            $footer .= $pdf->getAliasNumPage();
        }
        if ($this->set_current_page && $this->set_total_pages) {
            $footer .= $this->separator;
        }
        if ($this->set_total_pages) {
            $footer .= $pdf->getAliasNbPages();
        }

        return $footer;
    }
}
