<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        return view('pages.reports.create');
    }

    public function create_report(Request $request)
    {
        $report = new Report;
        $report->title = $request['title'];
        $report->notes = $request['notes'];
        $report->conditions = $request['conditions'];

        $report->save();
        return response()->json([
            'success' => 'Add Successfully'
        ]);
    }
}
