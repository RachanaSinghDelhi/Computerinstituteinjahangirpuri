<?php

namespace App\Helpers;

use thiagoalessio\TesseractOCR\TesseractOCR;

class TesseractHelper
{
    /**
     * Extract text from an image using Tesseract OCR.
     *
     * @param string $imagePath
     * @return string
     */
    public static function extractTextFromImage($imagePath)
    {
        try {
            $text = (new TesseractOCR($imagePath))
                ->executable('tesseract') // Specify the path if Tesseract is not in PATH
                ->run();
            return $text;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
