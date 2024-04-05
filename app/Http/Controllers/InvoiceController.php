<?php

namespace App\Http\Controllers;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends BaseController
{
    protected InvoiceService $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function getAllInvoice(Request $request)
    {
        $invoices = $this->invoiceService->searchInvoice($request)->sort();
        
        return view('component.invoice', compact('invoices'));
    }

    // public function searchAllInvoice(Request $request)
    // {
    //     $search = $this->invoiceService->searchInvoice($request);
    //     return view('component.invoice', compact('search'));
    // }
}
