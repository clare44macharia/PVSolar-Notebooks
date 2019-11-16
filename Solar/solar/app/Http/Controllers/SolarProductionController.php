<?php

namespace App\Http\Controllers;

use App\Exports\SolarProductionExport;
use App\SolarProduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Khill\Lavacharts\Lavacharts;





class SolarProductionController extends Controller
{
    public function display()
    {
        $productions = SolarProduction::all();
        return view('filter' ,  compact('productions'));

    }

    public function stats(){
        $avg_productions = DB::table('solar_productions')
            ->avg('SolarEnergy');
        return view('home' ,  compact('avg_productions'));

    }
    public function export()

    {
        $data['title'] = ' Solar Production Data';
        $data['productions'] =  SolarProduction::all();

        return Excel::download(new SolarProductionExport(), 'production.xlsx');

    }

    public function pdf()
    {
        $data['title'] = ' Solar Production Data';
        $data['productions'] = SolarProduction::all();

        return Excel::download(new SolarProductionExport(), 'production.pdf');



    }



    public function predict()
    {

        return view('predict');
    }


    public function search(Request $request)
    {
        $productions = SolarProduction::search($request['search_item']->paginate(9));
        $searchflag = true;
        return view ('insertForm',compact('productions','searchflag'));
    }


    public function chart()
    {
        $popularity = \Lava::DataTable();
        \Lava::ColumnChart()
 $lava = new Lavacharts();
 $lava->DataTable();
$avg = SolarProduction::where('SolarEnergy')->mean();
$actual = SolarProduction::where('SolarEnergy')->get()->toArray();

 $lava->addNumberColumn('SolarEnergy Average')
            ->addNumberColumn('Actual')
            ->addRow(['avg',$avg])
            ->addRow(['actual',$actual]);

 Lavacharts::ColumnCharts();









//        (new \Khill\Lavacharts\Lavacharts)->DataTable();
//
//        $data = SolarProduction::("CloudCoverage as 0", "SolarEnergy as 1")->get()->toArray();
//
//        $popularity->addNumberColumn('Cloud Cover')
//                    ->addNumberColumn("Solar Energy")
//                    ->addRows($data);
//
//        Lavacharts:: ColumnChart("Production Trend",$popularity, [
//            'title' => 'Company Performance',
//            'titleTextStyle' => [
//                'color'    => '#eb6b2c',
//                'fontSize' => 14
//                ]
//        ]);
//
//
//        return view("home",["lava"=>$lava]);


    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            if($request->from_date != '' && $request->to_date != '')
            {
                $data = DB::table('solar_productions')
                    ->whereBetween('Date', array($request->from_date, $request->to_date))
                    ->get();
            }
            else
            {
                $data = DB::table('solar_productions')->orderBy('Date', 'desc')->get();
            }
            echo json_encode($data);
        }
    }



}
