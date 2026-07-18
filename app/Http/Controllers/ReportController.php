<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ReportService;

class ReportController extends Controller
{

    public function __construct(
        protected ReportService $reportService
    ) {}

    public function sales(Request $request)
    {
        $data = $this->reportService
            ->getSalesReport(
                $request->start_date,
                $request->end_date
            );


        return view(
            'reports.sales',
            $data
        );
    }

    public function show(string $id)
    {
        $data = $this->reportService
            ->getTransactionDetail($id);


        return view(
            'reports.show',
            $data
        );
    }
}