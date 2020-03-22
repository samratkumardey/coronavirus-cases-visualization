<?php

namespace App\Http\Controllers;

use App\Covid;
use Illuminate\Http\Request;

class AutomationController extends Controller
{
    public function importsData($date){

        // Import CSV to Database
//        $filepath = "https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/".$date.".csv";
        $filepath = "D:/shefa/".$date.".csv";

        // Reading file
        $file = fopen($filepath,"r");

        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );

            // Skip first row (Remove below comment if you want to skip the first row)
            if($i == 0){
               $i++;
               continue;
            }
            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);

        // Insert to MySQL database
        foreach($importData_arr as $importData){

            $insertData = array(
                "state"=>$this->null_check($importData[0]),
                "country"=>$this->null_check($importData[1]),
                "last_update"=>$this->null_check($importData[2]),
                "confirmed"=>$this->null_check($importData[3]),
                "deaths"=>$this->null_check($importData[4]),
                "recovered"=>$this->null_check($importData[5]),
                "latitude"=>$this->null_check($importData[6]),
                "longitude"=>$this->null_check($importData[7]),
                "batch"=>$date
            );

            Covid::create($insertData);


        }

//        return $insertData;


    }

    public function null_check($data){
        if($data !=""){
            return $data;
        }
        else{
            return 0;
        }
    }


}
