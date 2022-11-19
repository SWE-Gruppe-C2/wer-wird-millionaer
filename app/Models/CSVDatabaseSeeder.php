<?php

namespace App\Models;

class CSVDatabaseSeeder extends \Database\Seeders\DatabaseSeeder
{
    public static function csv($data): array                    //$data: csv file name, returns csv data as associative array
    {
        $rows = array_map('str_getcsv', file($data));   //puts csv file into rows
        $header = array_shift($rows);                    //takes first row as map keys
        $dataArray = array();
        foreach ($rows as $row)
            if (sizeof($row) == sizeof($header))                //is row size correct?
                $dataArray[] = array_combine($header, $row);    //generates Map with row data
        return $dataArray;
    }
}
