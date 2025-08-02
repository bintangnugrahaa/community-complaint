<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private ReportRepositoryInterface $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index(Request $request)
    {
        $category = $request->query('category');
        if ($category) {
            $reports = $this->reportRepository->getReportByCategory($category);
        } else {
            $reports = $this->reportRepository->getAllReports();
        }

        return view("pages.app.report.index", compact("reports", "category"));
    }

    public function show($code)
    {
        $report = $this->reportRepository->getReportByCode($code);
        return view('pages.app.report.show', compact('report'));
    }
}
