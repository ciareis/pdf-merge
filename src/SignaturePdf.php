<?php

namespace Ciareis\PdfMerge;

use LSNepomuceno\LaravelA1PdfSign\Sign\SignaturePdf as AsSignaturePdf;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SignaturePdf extends AsSignaturePdf
{
    public function signature(): string|BinaryFileResponse
    {
        $this->getPdfInstance()
           ->SetCreator(PDFStatic::getCreator());

        return parent::signature();
    }
}
