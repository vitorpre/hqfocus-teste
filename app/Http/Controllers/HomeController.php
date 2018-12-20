<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index() {

        $dateNow = Carbon::now();

        $dateNow = Carbon::create(2018, 12, 19, 11, 00, 00);
        $applicants = array();

        if($dateNow->format('H') >= 10
            && $dateNow->format('His') <= 120100) {
            $applicants = Applicant::all();
        }

        $mostVotedDailyQuery = Vote::with('applicant')
            ->selectRaw('applicant_id, count(*) AS votes');

        if($dateNow->format('H') < 12) {
            $mostVotedDailyQuery->whereDay('created_at', Carbon::yesterday()->format('d'));
        } else {
            $mostVotedDailyQuery->whereDay('created_at', Carbon::today()->format('d'));
        }

        $mostVotedDailyQuery->groupBy('applicant_id', 'created_at');

        $mostVotedDaily = $mostVotedDailyQuery->first();


        $winnersPastWeeks = DB::select("
            SELECT 
                results_week.votes,
                results_week.applicant_id,
                results_week.created_at_week,
                applicants.name,
                applicants.email,
                applicants.photo
            FROM (
                    SELECT count(*) as votes, applicant_id, created_at,  YEARWEEK(created_at) as created_at_week
                    FROM `votes` 
                    GROUP BY created_at_week, applicant_id
                    ORDER BY created_at_week, `votes` DESC
            
                ) AS results_week
            LEFT JOIN applicants
	            ON applicants.id = results_week.applicant_id
            GROUP BY created_at_week
            ORDER BY created_at_week DESC
            LIMIT 5
        ");

        $leastLovedsPastWeeks = DB::select("
            SELECT 
                results_week.votes,
                results_week.applicant_id,
                results_week.created_at_week,
                applicants.name,
                applicants.email,
                applicants.photo
            FROM (
                    SELECT count(*) as votes, applicant_id, created_at,  YEARWEEK(created_at) as created_at_week
                    FROM `votes` 
                    GROUP BY created_at_week, applicant_id
                    ORDER BY created_at_week, `votes` ASC
            
                ) AS results_week
            LEFT JOIN applicants
	            ON applicants.id = results_week.applicant_id
            GROUP BY created_at_week
            ORDER BY created_at_week DESC
            LIMIT 5
        ");


        return Response::view('home' , [
            'dateNow' => $dateNow,
            'applicants' => $applicants,
            'mostVotedDaily' => $mostVotedDaily,
            'winnersPastWeeks' => $winnersPastWeeks,
            'leastLovedsPastWeeks' => $leastLovedsPastWeeks
            ]);
    }
}
