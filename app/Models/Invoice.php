<?php

namespace App\Models;

use App\Client;
use App\Models\InvoiceDetails;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * @package App\Models
 */
class Invoice extends Model
{
    /**
     * @var string
     */
    protected $table ='invoices';

    /**
     * @var array
     */
    protected $fillable = [
        'client_id','total_amount'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne(Client::class, 'client_id');
    }

    /**
     *@return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoicedetails()
    {
        return $this->hasMany(InvoiceDetails::class, 'invoice_id');
    }
}
