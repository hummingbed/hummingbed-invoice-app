<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository extends BaseRepository
{
    public function getModel(): Invoice
    {
        return new Invoice();
    }
}
