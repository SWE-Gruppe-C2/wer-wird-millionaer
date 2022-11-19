<?php

namespace Database\Seeders;

class CSVDatabaseSeeder extends DatabaseSeeder
{

    /**
     * generates an associative array from a csv file, taking the first row of the csv as keys for the array
     * key1,key2
     * value1_1,value1_2
     * value2_1,value2_2
     * [0] => [[key1]=>[value1_1],[key2]=>[value1_2]],[1] => [[key1]=>[value2_1]...]
     * @param $path string to csv file
     * @return array csv contents in associative array
     */
    public static function csv(string $path): array
    {
        $rows = array_map('str_getcsv', file($path));   //puts csv file into rows
        $header = array_shift($rows);                    //takes first row as map keys
        $dataArray = array();
        foreach ($rows as $row)
            if (sizeof($row) == sizeof($header))                //is row size correct?
                $dataArray[] = array_combine($header, $row);    //generates Map with row data
        return $dataArray;
    }
}
