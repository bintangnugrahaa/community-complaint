<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalReports = \App\Models\Report::count();
        $deliveredReports = \App\Models\Report::whereHas('reportStatuses', function ($q) {
            $q->whereIn('id', function ($sub) {
                $sub->selectRaw('MAX(id)')
                    ->from('report_statuses')
                    ->where('status', 'delivered')
                    ->groupBy('report_id');
            });
        })->count();
        $inProcessReports = \App\Models\Report::whereHas('reportStatuses', function ($q) {
            $q->whereIn('id', function ($sub) {
                $sub->selectRaw('MAX(id)')
                    ->from('report_statuses')
                    ->where('status', 'in_process')
                    ->groupBy('report_id');
            });
        })->count();
        $completedReports = \App\Models\Report::whereHas('reportStatuses', function ($q) {
            $q->whereIn('id', function ($sub) {
                $sub->selectRaw('MAX(id)')
                    ->from('report_statuses')
                    ->where('status', 'completed')
                    ->groupBy('report_id');
            });
        })->count();
        $rejectedReports = \App\Models\Report::whereHas('reportStatuses', function ($q) {
            $q->whereIn('id', function ($sub) {
                $sub->selectRaw('MAX(id)')
                    ->from('report_statuses')
                    ->where('status', 'rejected')
                    ->groupBy('report_id');
            });
        })->count();
        $totalCategories = \App\Models\ReportCategory::count();
        $totalResidents = \App\Models\Resident::count();

        // Statistik kategori
        $categoryStats = \App\Models\ReportCategory::withCount('reports')->get();
        $categoryLabels = $categoryStats->pluck('name')->toArray();
        $categoryCounts = $categoryStats->pluck('reports_count')->toArray();

        return view('pages.admin.dashboard', compact(
            'totalReports',
            'deliveredReports',
            'inProcessReports',
            'completedReports',
            'rejectedReports',
            'totalCategories',
            'totalResidents',
            'categoryLabels',
            'categoryCounts'
        ));
    }
}
