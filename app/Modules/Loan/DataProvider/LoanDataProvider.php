<?php

namespace App\Modules\Loan\DataProvider;

use App\Modules\Common\DataProvider\DatabaseProvider;
use App\Modules\Loan\Models\Loan;

class LoanDataProvider extends DatabaseProvider
{
    public $model = Loan::class;

    public function requestLoan($amount, $term)
    {
        return $this->newQuery()->create([
            'customer_id' => auth()->id(),
            'amount' => $amount,
            'term' => $term,
            'status' => Loan::STATUS_PENDING
        ]);
    }

    /**
     * Approve loan
     *
     * @param Loan $loan
     * @param $note
     */
    public function approveLoan(Loan $loan, $notes)
    {
        $loan->status = Loan::STATUS_APPROVED;
        $loan->approver_id = auth()->id();
        $loan->approver_notes = $notes;

        return $loan->save();
    }

    /**
     * Reject loan
     *
     * @param Loan $loan
     * @param $note
     */
    public function rejectLoan(Loan $loan, $notes)
    {
        $loan->status = Loan::STATUS_REJECTED;
        $loan->approver_id = auth()->id();
        $loan->approver_notes = $notes;

        return $loan->save();
    }
}