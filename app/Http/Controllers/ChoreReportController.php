<?php

namespace App\Http\Controllers;

use App\Chore;
use App\User;
use App\User_Chores;

use Carbon\Carbon;

use Illuminate\Http\Request;

class ChoreReportController extends Controller
{
    private $filterDate;
    private $filterUser;

    public function __construct()
    {
        //TODO Check for something to use besides the 'Select Filter' prompt
        $this->filterDate = [
            0 => 'Please select a report filter...',
            1 => 'Week',
            2 => 'Month',
        ];

        $temp = User::all();

        $this->filterUser = [];
        $this->filterUser[0] = 'All Users';

        foreach ($temp as $user)
        {
            $this->filterUser[$user->id] = $user->name;
        }


    }
    public function index()
    {
        return view('admin.reports.choreReport')->with(['filter'=> $this->filterDate, 'selected'=>0,
            'filterUsers' => $this->filterUser]);
    }

    public function choreReport(Request $request)
    {

        //TODO Look into filtering this so we are getting so much back
        $today = Carbon::today()->format('Y-m-d');

        $startDate = null;
        $endDate = null;
        $dataFilter = $request->filter;
        $userFilter = $request->filterUsers;

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



        //$userChores = null;

        if ($userFilter == 0)
        {
            $userChores = User_Chores::whereBetween('created_at', [$startDate, $endDate])->get();
        } else{
            $userChores = User_Chores::where('user_id',"=",$userFilter)->whereBetween('created_at', [$startDate, $endDate])->get();
        }

        $data = [];

        foreach ($userChores as $chore) {
            $tempData = [
                'user' => User::find($chore->user_id),
                'chore' => Chore::find($chore->chore_id),
                'due_date' => $chore->due_date,
                'complete' => $chore->complete,
                'date_assigned' => $chore->created_at->timezone("America/Chicago")->format('Y-m-d'),
            ];
            $data[] = $tempData;
        }

        return view('admin.reports.choreReport')->with(['data'=> $data, 'filter'=>$this->filterDate, 'selected' => $dataFilter,
        'filterUsers'=> $this->filterUser]);
    }
}
