<?php

namespace App\Modules\Loan\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduledRepayment extends Model
{
    protected $table = 'scheduled_repayments';

    protected $guarded = [];

    const STATUS_UNPAID = 0;
    const STATUS_PAID = 1;
}