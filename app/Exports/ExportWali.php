<?php

namespace App\Exports;

use App\Models\Wali;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportWali implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Wali::select(
            'id',
            'mahasiswa_id',
            'nama_wali',
            'umur',
            'pekerjaan',
        )->get();
    }

    public function headings(): array
    {
        return [
            'NO',
            'ID MAHASISWA',
            'NAMA',
            'UMUR',
            'PEKERJAAN',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange  = 'A1:E1'; // All headers
                $cellRanges = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRanges)->getFont()->setBold(true);

                $event->sheet->getStyle('A1:E10')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ]
                ]);
            },

        ];
    }
}