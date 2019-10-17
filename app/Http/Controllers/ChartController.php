<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;
use App\UserFlow;
use Illuminate\Support\Facades\Storage;

class ChartController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }


    /**
     * Return selected processed data base on week and year.
     *
     * @param  array  $data
     * @return Json
     */
    protected function getChartData()
    {
        $data = $this->loadChartData(); //load data from CSV

        $groupedByWeek = $data->groupBy(function ($item) { // Group data base on week start date
            return   $item->created_at->startOfWeek()->format('d/m/Y');
        });

        $chartData = array();
        foreach ($groupedByWeek as $key => $item) {
            $cohort = new \stdClass();
            $cohort->name = $key;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 0)->count() / $item->count()) * 100;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 20)->count() / $item->count()) * 100;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 40)->count() / $item->count()) * 100;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 50)->count() / $item->count()) * 100;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 70)->count() / $item->count()) * 100;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 90)->count() / $item->count()) * 100;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 99)->count() / $item->count()) * 100;
            $cohort->data[] = ($item->where('onboarding_percentage', '>=', 100)->count() / $item->count()) * 100;
            array_push($chartData, $cohort);
        };

        return Response()->json( // return data for chart as Json
            $chartData
        );
    }

    /**
     * Return selected processed data base on week and year.
     *
     * @param  array  $data
     * @return Json
     */
    protected function loadChartData()
    {
        $usersFlow = new UserFlow;

        $records = $this->getFileData('export.csv');

        $usersFlowCollection = $usersFlow->hydrate($records); // Load data for a Collection

        return  $usersFlowCollection;
    }

    /**
     * Return records in csv File
     *
     * @param  string $fileName 
     * @return array
     */
    protected function getFileData($csvfile)
    {
        $handle = fopen(Storage::disk('local')->path('' . $csvfile), "r"); // Read csv file and return an array
        $all_data = array();
        while (($data = fgetcsv($handle)) !== FALSE) {
            $csv_data = array();
            $csv_data['user_id'] = !empty($data[0]) ? $data[0] : null;
            $csv_data['created_at'] =  !empty($data[1]) ? $data[1] : null;
            $csv_data['onboarding_percentage'] =  !empty($data[2]) ? $data[2] : 0;
            $csv_data['count_applications'] =   !empty($data[3]) ? $data[3] : 0;
            $csv_data['count_accepted_applications'] =  !empty($data[4]) ? $data[4] : 0;
            array_push($all_data, $csv_data);
        }
        fclose($handle);

        return $all_data;
    }

  
}
