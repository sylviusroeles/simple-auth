<?php


namespace App\Http\Controllers;


use App\Repositories\LoginAttemptsRepository;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * @param Request $request
     * @param LoginAttemptsRepository $loginAttemptsRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, LoginAttemptsRepository $loginAttemptsRepository)
    {
        $loginAttempts = $loginAttemptsRepository->getByUserId($request->user()->id);

        return view('dashboard', ['loginAttempts' => $loginAttempts]);
    }
}
