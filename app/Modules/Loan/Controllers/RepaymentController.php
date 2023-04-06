<?php

namespace App\Modules\Loan\Controllers;

use App\Http\Controllers\ApiController;

class RepaymentController extends ApiController
{
    public function loanRepayments(){
        return 'loanRepayments';
    }

    public function repay(){
        return 'repay';
    }
}