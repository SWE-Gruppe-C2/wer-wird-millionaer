<?php

namespace Database\Seeders;

use Closure;

trait CanReadCSV
{
    /**
     * Generiert ein Assoziatives Array aus einer CSV-Datei und nimmt dabei die erste Zeile als Keys für das Array
     * z.B. so:
     * vorname,nachname,PLZ
     * Max,Muster,52062
     * Klaus,Müller,52070
     * [0] => [[vorname]=>[Max],[nachname]=>[Muster],[PLZ]=>[52062]],[1] => [[vorname]=>[Klaus]...]
     * @param $path string dateipfad der CSV
     * @return array CSV inhalt als assoziatives Array
     */
    public static function csv(string $path, Closure $accept): array
    {
        // teilt csv-datei in einzelne Zeilen
        $rows = array_map('str_getcsv', file(base_path($path)));
        // nimmt erste Zeile als Map keys
        $header = array_shift($rows);
        $data = array();

        foreach ($rows as $row)
        {
            $filtered = array_filter($row, 'strlen');

            if (sizeof($filtered) != sizeof($row))
                continue;

            if (sizeof($filtered) != sizeof($header))
                continue;

            if($row[1] > 4)
                continue;
            // kombiniert ein array mit $header als keys und $row als values
            $entry = array_combine($header, $filtered);
            $accept($entry);
            $data[] = $entry;
        }

        return $data;
    }
}
