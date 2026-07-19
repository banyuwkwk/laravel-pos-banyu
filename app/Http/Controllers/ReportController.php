<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ReportService;

use App\Exports\SalesReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function exportExcel(Request $request)
    {
        return Excel::download(
            new SalesReportExport(
                $request->start_date,
                $request->end_date
            ),
            'sales-report.xlsx'
        );
    }

    public function exportPdf(Request $request)
    {
        $data = $this->reportService
            ->getSalesReport(
                $request->start_date,
                $request->end_date
            );

        $pdf = Pdf::loadView(
            'reports.pdf.sales',
            $data
        );

        return $pdf->download('sales-report.pdf');
    }
}