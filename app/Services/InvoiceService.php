<?php

namespace App\Services;

use App\Repositories\InvoiceRepository;
use App\Models\Invoice;

class InvoiceService extends BaseService
{
    public function __construct(InvoiceRepository $repository)
    {
        $this->repo = $repository;
    }

    public function getInvoice()
    {
        return $this->repo->findAll(null, 'customer');
    }

    public function searchInvoice($request)
    {
        $search = $request->input('search');

        return Invoice::where('id', 'like', "%$search%")
                       ->orWhere('date', 'like', "%$search%")
                       ->orWhere('number', 'like', "%$search%")
                       ->orWhereHas('customer', function ($query) use ($search) {
                           $query->where('first_name', 'like', "%$search%");
                       })
                       ->get();
        // Invoice::whereHas('customer', function ($query) use ($searchTerm) {
        //     $query->where('number', 'like', '%' . $searchTerm . '%');
        // })->get();
    }
}
