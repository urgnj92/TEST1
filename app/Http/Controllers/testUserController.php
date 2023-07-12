<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateSupport\Facades\DB;
use App\Models\Products;
use App\Http\Requests\ProductsRequest;

class testUserController extends Controller
{
    //constructはなぜ使う？
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('home');
    }

    public function showList(Request $request) {

    }

    public function showAddForm() {

    }
    
    public function submitAddData(ProductRequest $request) {

    }

    public function deleteRecord($id) {

    }

    public function showDetailForm($id) {

    }

    public function showEditForm($id) {

    }

public function updateProduct(ProductRequest $request, $id) {

    }

}