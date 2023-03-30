<?php

namespace App\Modules\ExportEngine\Controller;

use App\Http\Controllers\ApiController;
use App\Modules\Auth\Models\User;
use Spatie\SimpleExcel\SimpleExcelWriter;

class BigVolumeExportController extends ApiController
{

    /**
     * Export all users
     * tested with 2 millions records, memory_limit=128MB
     *
     * @return mixed
     */
    public function exportAllUsers(){
        $writer = SimpleExcelWriter::streamDownload('users.csv');
        $query = User::orderBy('created_at');

        $i = 0;
        foreach ($query->lazy(10000) as $user)
        {
            $writer->addRow($user->toArray());

            if ($i % 10000 === 0) {
                flush(); // Flush the buffer every 10000 rows
            }
            $i++;
        }

        return $writer->toBrowser();
    }
}