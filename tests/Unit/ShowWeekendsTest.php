<?php

namespace Tests\Unit;

use Faker\Provider\Address;
use Faker\Provider\DateTime;
use Tests\TestCase;
use App\Http\Controllers\CalculateWeekends;

class ShowWeekendsTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testShowWeekends()
    {
        $obj = new CalculateWeekends(date('2020-10-01'),date('2020-10-13'));
        $obj->showWeekends();
        $myfile = fopen(public_path()."\NumberOfWeekendsTest.txt", "w") or die("Unable to open file!");
        $resultToTestAgainst = 'Number Of Weekends: 4';
        fwrite($myfile, $resultToTestAgainst);
        fclose($myfile);
        $this->assertFileEquals(public_path()."\NumberOfWeekendsTest.txt",public_path()."\NumberOfWeekends.txt");
    }
}
