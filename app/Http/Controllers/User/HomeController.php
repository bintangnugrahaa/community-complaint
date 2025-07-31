<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\ReportCategoryRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function index()
    {
        $categories = $this->reportCategoryRepository->getAllReportCategories();

        return view('pages.app.home', compact('categories'));
    }
}
