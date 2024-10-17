<?php
namespace App\Imports;

use App\Models\generate_lead;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadImport implements ToModel
{
    // Static variable to keep track of the row index
    private static $rowIndex = 0;

    public function model(array $row)
    {
        // Skip the header row (first row)
        if (self::$rowIndex === 0) {
            self::$rowIndex++;
            return null; // Ignore the header row
        }

        // Increment row index for the next call
        self::$rowIndex++;

        // Create a new generate_lead instance with the row data
        return new generate_lead([
            'product_name' => $row[1] ?? null,
            'company_name' => $row[2] ?? null,
            'contact_name' => $row[3] ?? null,
            'email' => $row[4] ?? null,
            'job_postion' => $row[5] ?? null,
            'phone' => $row[6] ?? null,
            'mobile' => $row[7] ?? null,
            'address_1' => $row[8] ?? null,
            'address_2' => $row[9] ?? null,
            'city' => $row[10] ?? null,
            'state' => $row[11] ?? null,
            'zip' => $row[12] ?? null,
            'country' => $row[13] ?? null,
            'website_link' => $row[14] ?? null,
            'internal_notes' => $row[15] ?? null,
        ]);
    }
}
