<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportMahasiswa implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mahasiswa::select(
            'id',
            'nim',
            'nama_mhs',
            'jk',
            'jurusan',
            'no_hp',
            'alamat',
            'dosen_id'
        )->get();
    }

    public function headings(): array
    {
        return [
            'NO',
            'NIM',
            'NAMA',
            'JK',
            'JURUSAN',
            'NO HP',
            'ALAMAT',
            'DOSEN ID',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange  = 'A1:H1'; // All headers
                $cellRanges = 'A1:H1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRanges)->getFont()->setBold(true);

                $event->sheet->getStyle('A1:H10')->applyFromArray([
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
