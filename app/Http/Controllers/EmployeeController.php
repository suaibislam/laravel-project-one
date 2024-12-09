<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
{
    return view('employees.index');
}

public function getEmployees()
{
    return datatables()->of(Product::query())->make(true);
}
}
