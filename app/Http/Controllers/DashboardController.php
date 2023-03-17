<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
	$total= Apotek::count();
	return view('pages.dashboard', [
		'total' => $total
	]);
}
}
