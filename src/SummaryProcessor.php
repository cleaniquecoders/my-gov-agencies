<?php

namespace CleaniqueCoders\Government;

class SummaryProcessor implements Contract
{
    public static function process()
    {
        $directory = dirname(__DIR__).DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR;

        $paths = glob($directory.'*.json');

        $summary = [
            'total_ministries' => 0,
            'total_agencies' => 0,
        ];
        foreach ($paths as $path) {
            $data = decode_json_file($path);
            $total_ministries = count($data['list']);
            $total_agencies = 0;

            foreach ($data['list'] as $ministry) {
                $total_agencies += count($ministry['agencies']);
            }

            $summary['total_ministries'] += $total_ministries;
            $summary['total_agencies'] += $total_agencies;
        }

        foreach ($summary as $key => $value) {
            echo str($key)->headline().' : '.$value.PHP_EOL;
        }
    }
}
