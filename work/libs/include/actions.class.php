<?php


class Security
{
    public static function jsEscape($str) {
        $output = '';
        $str = str_split($str);
        for($i=0;$i<count($str);$i++) {
            $chrNum = ord($str[$i]);
            $chr = $str[$i];
            if($chrNum === 226) {
                if(isset($str[$i+1]) && ord($str[$i+1]) === 128) {
                    if(isset($str[$i+2]) && ord($str[$i+2]) === 168) {
                        $output .= '\u2028';
                        $i += 2;
                        continue;
                    }
                    if(isset($str[$i+2]) && ord($str[$i+2]) === 169) {
                        $output .= '\u2029';
                        $i += 2;
                        continue;
                    }
                }
            }
            switch($chr) {
                case "'":
                case '"':
                case "\n";
                case "\r";
                case "&";
                case "\\";
                case "<":
                case ">":
                    $output .= sprintf("\\u%04x", $chrNum);
                break;
                default:
                    $output .= $str[$i];
                break;
        }
        }
        return $output;
    }
}
