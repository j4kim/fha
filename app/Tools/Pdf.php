<?php

namespace App\Tools;

use Illuminate\Support\Facades\Log;

class Pdf {

    private $source;

    function __construct(string $source) {
        $this->source = $source;
    }

    function toJpg(string $destination) {
        // gs command found here: https://stackoverflow.com/a/36137513/8345160
        // use directly gs instead of Imgaick because ImageMagick->gs interface is a nightmare
        $command = join(' ', [
            '"' . env('GS') . '"',
            '-dNOPAUSE',
            '-dBATCH',
            '-sDEVICE=jpeg',
            '-r72',
            '-dJPEGQ=40',
            '-sOutputFile="' . $destination . '"',
            '"' . $this->source . '"'
        ]);
        $output = "";
        $result_code = "";
        exec($command, $output, $result_code);
        if ($result_code !== 0) {
            Log::error("gs command failed", compact('command', 'output', 'result_code'));
            return false;
        }
        return true;
    }
}