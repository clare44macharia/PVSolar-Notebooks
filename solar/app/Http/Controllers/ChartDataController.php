<?php

namespace App\Http\Controllers;

use App\SolarProduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ChartDataController extends Controller
{

    function getAllMonths(){
        $month_array = array();
        $posts_dates = SolarProduction::orderBy( 'Date', 'ASC' )->pluck( 'Date' );
        $posts_dates = json_decode( $posts_dates );
        $date = SolarProduction::where('Date');
        if ( ! empty( $posts_dates ) ) {
            foreach ( $posts_dates as $unformatted_date ) {
                $date1 = new \DateTime( $unformatted_date ->$date);
                $month_no = $date1->format( 'm' );
                $month_name = $date1->format( 'M' );
                $month_array[ $month_no ] = $month_name;
            }
        }
        return $month_array;
    }
    function getMonthlyPostCount( $month ) {
        $monthly_post_count = SolarProduction::whereMonth( 'Date', $month )->get()->count();
        return $monthly_post_count;
    }
    function getMonthlyPostData() {
        $monthly_post_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if ( ! empty( $month_array ) ) {
            foreach ( $month_array as $month_no => $month_name ){
                $monthly_post_count = $this->getMonthlyPostCount( $month_no );
                array_push( $monthly_post_count_array, $monthly_post_count );
                array_push( $month_name_array, $month_name );
            }
        }
        $max_no = max( $monthly_post_count_array );
        $max = round(( $max_no + 10/2 ) / 10 ) * 10;
        $monthly_post_data_array = array(
            'months' => $month_name_array,
            'post_count_data' => $monthly_post_count_array,
            'max' => $max,
        );
        return $monthly_post_data_array;
    }
}
