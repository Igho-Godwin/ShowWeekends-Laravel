<?php


namespace App\Http\Controllers;

/* Class to Display number of weekends between dates */

class CalculateWeekends
{
    private $start_date;
    private $end_date;
    public function __construct($start_date, $end_date){
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function showWeekends(){

        $this->writeToFile('');

        $start_date  = $this->start_date;
        $end_date = $this->end_date;

        $period = $this->getPeriod($start_date,$end_date);

        $number_of_weekends = $this->getNumberOfWeekends($period);

        $this->writeToFile('Number Of Weekends: '.$number_of_weekends);

    }

    private function getNumberOfWeekends($period){
        $number_of_weekends = 0;
        foreach ($period as $key => $value) {
            if ($value->format('N') >= 6) {
                $number_of_weekends++;
            }
        }
        return $number_of_weekends;
    }

    private function getPeriod($start_date,$end_date){

        return new \DatePeriod(
            new \DateTime($start_date),
            new \DateInterval('P1D'),
            new \DateTime($end_date)
        );

    }

    private function writeToFile($txt){
        $myfile = fopen(public_path()."\NumberOfWeekends.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);
    }

}
