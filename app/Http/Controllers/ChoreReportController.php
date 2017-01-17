<?php

namespace App\Http\Controllers;

use App\Chore;
use App\User;
use App\User_Chores;

use Carbon\Carbon;

use Illuminate\Http\Request;

class ChoreReportController extends Controller
{
    private $filterData;

    public function __construct()
    {
        //TODO Check for something to use besides the 'Select Filter' prompt
        $this->filterData = [
            0 => 'Please select a report filter...',
            1 => 'Week',
            2 => 'Month',
        ];
    }
    public function index()
    {
        return view('admin.reports.choreReport')->with(['filter'=> $this->filterData, 'selected'=>0]);
    }

    public function choreReport(Request $request)
    {

        //TODO Look into filtering this so we are getting so much back
        $today = Carbon::today()->format('Y-m-d');

        $startDate = null;
        $endDate = null;
        $dataFilter = $request->filter;

        switch ($dataFilter) {
            // Week filter
            case 1:
                $startDate = Carbon::parse('Last Sunday')->format('Y-m-d 00:00:00');
                $endDate = Carbon::parse('Saturday')->format('Y-m-d 23:59:59');
                break;

            // Month filter
            case 2:
                $startDate = Carbon::parse("first day of this month")->format('Y-m-d 00:00:00');
                $endDate = Carbon::parse("last day of this month")->format('Y-m-d 23:59:59');
                break;
        }

        $userChores = User_Chores::whereBetween('created_at', [$startDate, $endDate])->get();


        $data = [];

        foreach ($userChores as $chore) {
            $tempData = [
                'user' => User::find($chore->user_id),
                'chore' => Chore::find($chore->chore_id),
                'due_date' => $chore->due_date,
                'complete' => $chore->complete,
                'date_assigned' => $chore->created_at->format('Y-m-d'),
            ];
            $data[] = $tempData;
        }

        //$data[0]['user']->name

        return view('admin.reports.choreReport')->with(['data'=> $data, 'filter'=>$this->filterData, 'selected' => $dataFilter]);
    }
}
