<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        return view('dashboard.master.log.index');
    }
    public function detail($id)
    {
        return view('dashboard.master.log.detail');
    }
    public function action($id)
    {
        return view('dashboard.master.log.action');
    }
    /* ===================== */
    /* | end get data      | */
    /* ===================== */

    /* ===================== */
    /* | store data        | */
    /* ===================== */
    /* ===================== */
    /* | end store data    | */
    /* ===================== */

    /* ===================== */
    /* | update data       | */
    /* ===================== */
    /* ===================== */
    /* | end update data   | */
    /* ===================== */

    /* ===================== */
    /* | destroy data      | */
    /* ===================== */
    /* ===================== */
    /* | end destroy data  | */
    /* ===================== */
}
