<?php

namespace App\Exports;

use App\Models\generate_lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LeadExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    public function collection()
    {
        return generate_lead::with(['getUser', 'getMedium', 'getCountry', 'getAutoCountry'])
            ->get()
            ->map(function ($lead) {
                // Manually retrieve tags for each lead
                $tags = $lead->tags()->pluck('name')->implode(', '); // Retrieve and concatenate tag names
                
                return [
                    'product_name' => $lead->product_name,
                    'contact_name' => $lead->contact_name,
                    'company_name' => $lead->company_name,
                    'email' => $lead->email,
                    'city' => $lead->city,
                    'country' => $lead->getCountry->name ?? $lead->getAutoCountry->name ?? '',
                    'sales_person' => $lead->getUser ? $lead->getUser->name : null,
                    'sales_team' => $lead->sales_team,
                    'referred_by' => $lead->referred_by,
                    'medium' => $lead->getMedium ? $lead->getMedium->name : null,
                    'tags' => $tags, 
                ];
            });
    }
    

    public function headings(): array
    {
        return [
            'Opportunity',
            'Contact Name',
            'Company Name',
            'Email',
            'City',
            'Country',
            'Salesperson',
            'Sales Team',
            'Referred By',
            'Medium',
            'Tags'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 20,
            'F' => 20,
            'G' => 30,
            'H' => 20,
            'I' => 20,
            'J' => 20,
            'K' => 15,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => '000000'], 'size' => 12]], // Bold and black color for headers
        ];
    }
}
