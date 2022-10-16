<?php

namespace App\Services;

class Concordance
{
    public static function generate(string $text): array
    {
        // Newlines are used as sentence separators,
        // as dots are not reliable because of abbreviations like "i.e.", "etc." ...
        $text = explode("\n", strtolower($text));
        $concordance = [];

        foreach ($text as $key => $sentence) {
            $sentence = str_replace([',', ';', ':'], ' ', $sentence);
            $sentence = trim($sentence, ".!?\n\t\r ");
            $sentence = array_filter(explode(' ', $sentence));

            foreach ($sentence as $word) {
                if (isset($concordance[$word])) {
                    $concordance[$word]['frequency']++;
                    $concordance[$word]['sentences'] .= ',' . $key +1;
                } else {
                   $concordance[$word] = array(
                        'frequency' => 1,
                        'sentences' => $key +1
                    );
                }
            }
        }

        // Keys are words and we want them sorted alphabetically
        ksort($concordance);

        return $concordance;
    }
}
