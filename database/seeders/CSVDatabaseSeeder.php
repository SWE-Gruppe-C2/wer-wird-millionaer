<?php

namespace Database\Seeders;

class CSVDatabaseSeeder extends DatabaseSeeder
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
    public static function csv(string $path): array
    {
        //teilt csv-datei in einzelne Zeilen
        $rows = array_map('str_getcsv', file($path));
        //nimmt erste Zeile als Map keys
        $header = array_shift($rows);
        $dataArray = array();
        foreach ($rows as $row)
            //ist Zeilengröße = keygröße?
            if (sizeof($row) == sizeof($header))
                //generiert Map mit Zeilendaten
                $dataArray[] = array_combine($header, $row);
        return $dataArray;
    }
}
