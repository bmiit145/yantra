<?php
namespace App\Imports;

use App\Models\Sale;
use App\Models\CrmStage;
use Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class pipelineImport implements ToModel
{
    private static $rowIndex = 0;

    public function model(array $row)
    {
        if (self::$rowIndex === 0) {
            self::$rowIndex++;
            return null; // Ignore the header row
        }
        self::$rowIndex++;

        $stage = CrmStage::where('title', 'New')->first();
        if (!$stage) {
            Log::error("Stage 'New' not found.");
            return null; // Or handle the error as needed
        }

        // Ensure required fields are not null
        if (empty($row[1])) {
            Log::warning("Skipping row due to missing opportunity data: Row " . self::$rowIndex);
            return null; // Skip this row
        }

        return new Sale([
            'user_id' => Auth::id(),
            'stage_id' => $stage->id,
            'opportunity' => $row[1],
            'company_name' => $row[2] ?? null,
            'contact_name' => $row[3] ?? null,
            'email' => $row[4] ?? null,
            'job_postion' => $row[5] ?? null,
            'phone' => $row[6] ?? null,
            'mobile' => $row[7] ?? null,
            'street_1' => $row[8] ?? null,
            'street_2' => $row[9] ?? null,
            'city' => $row[10] ?? null,
            'state' => $row[11] ?? null,
            'zip' => $row[12] ?? null,
            'country' => $row[13] ?? null,
            'website_link' => $row[14] ?? null,
            'internal_notes' => $row[15] ?? null,
        ]);
    }
}
