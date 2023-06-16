<?php

namespace App\Exports;

use App\Models\Peta_Kerawanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class PetaExport implements FromCollection, WithHeadings, WithStyles
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function YesOrNo($val)
    {
        if ($val == 1) {
            return 'iya';
        } else {
            return 'tidak';
        }
    }

    public function collection()
    {
        $data = Peta_Kerawanan::with('kelas', 'siswa', 'walas', 'guru')->where('kelas_id', $this->id)->get();

        $exported = [];

        foreach ($data as $item) {
            $exported[] = [
                'id' => $item->id,
                'nama siswa' => $item->siswa->name,
                // 'nama guru' => $item->guru->name,
                // 'nama walas' => $item->walas->name,
                'nama kelas' => $item->kelas->name,
                'sering sakit' => $this->YesOrNo($item->sering_sakit),
                'sering izin' => $this->YesOrNo($item->sering_izin),
                'sering alpha' => $this->YesOrNo($item->sering_alpha),
                'sering terlambat' => $this->YesOrNo($item->sering_terlambat),
                'bolos' => $this->YesOrNo($item->bolos),
                'kelainan jasmani' => $this->YesOrNo($item->kelainan_jasmani),
                'minat belajar kurang' => $this->YesOrNo($item->minat_belajar_kurang),
                'introvert' => $this->YesOrNo($item->introvert),
                'tinggal dengan wali' => $this->YesOrNo($item->tinggal_dengan_wali),
                'kemampuan kurang' => $this->YesOrNo($item->kemampuan_kurang),
                'kesimpulan' => $item->kesimpulan,
            ];
        }

        return collect($exported);
    }

    // Rest of your code...

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            // 'Nama Guru',
            // 'Nama Walas',
            'Nama Kelas',
            'Sering Sakit',
            'Sering Izin',
            'Sering Alpha',
            'Sering Terlambat',
            'Bolos',
            'Kelainan Jasmani',
            'Minat Belajar Kurang',
            'Introvert',
            'Tinggal dengan Wali',
            'Kemampuan Kurang',
            'Kesimpulan',
        ];
    }


    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $lastColumn = $sheet->getHighestColumn();
        $range = 'A1:' . $lastColumn . $lastRow;
    
        $sheet->getStyle($range)->applyFromArray([
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            'borders' => [
                'allBorders' => ['borderStyle' => Border::BORDER_THIN],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFCB0C9F'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);
    
        $sheet->getStyle($range)->getAlignment()->setIndent(1);
        $sheet->getStyle($range)->getAlignment()->setWrapText(true);
        $sheet->getRowDimension(1)->setRowHeight(20);
    
        // Set column widths
        for ($column = 'A'; $column <= $lastColumn; $column++) {
            $sheet->getColumnDimension($column)->setWidth(20);
        }
    
        // Set body background to white
        $sheet->getStyle('A2:' . $lastColumn . $lastRow)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');
    
        // Set heading font style to bold
        $sheet->getStyle('A1:' . $lastColumn . '1')->getFont()->setBold(true);
    
        // Set body font style to normal
        $sheet->getStyle('A2:' . $lastColumn . $lastRow)->getFont()->setBold(false);
    
        // Set heading text color to white
        $sheet->getStyle('A1:' . $lastColumn . '1')->getFont()->getColor()->setRGB('FFFFFF');
    
        // Set body alignment to center
        $sheet->getStyle('A2:' . $lastColumn . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:' . $lastColumn . $lastRow)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    
        return $sheet;
    }
    
}
