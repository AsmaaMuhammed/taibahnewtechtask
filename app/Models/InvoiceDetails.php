<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InvoiceDetails
 * @package App\Models
 */
class InvoiceDetails extends Model
{
    /**
     * @var string
     */
    protected $table ='invoices_details';

    /**
     * @var array
     */
    protected $fillable = [
        'invoice_id','product_id', 'quantity'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(InvoiceDetails::class, 'invoice_id');
    }

}
