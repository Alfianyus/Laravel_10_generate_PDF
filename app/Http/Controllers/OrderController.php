<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        $data['orders'] = $orders;
        return view('order', $data);
    }

    public function downloadPdf()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        $data['orders'] = $orders;
        $pdf = Pdf::loadView('pdf.order', $data);
        return $pdf->download('orders.pdf');
        //return $pdf->stream();
    }
}
