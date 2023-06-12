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
        $data = Peta_Kerawanan::with('kelas', 'siswa', 'walas', 'guru')->where('id', $this->id)->first();

        $exported = [
            'id' => $data->id,
            'nama siswa' => $data->siswa->name,
            'nama guru' => $data->guru->name,
            'nama walas' => $data->walas->name,
            'nama kelas' => $data->kelas->name,
            'sering sakit' => $this->YesOrNo($data->sering_sakit),
            'sering izin' => $this->YesOrNo($data->sering_izin),
            'sering alpha' => $this->YesOrNo($data->sering_alpha),
            'sering terlambat' => $this->YesOrNo($data->sering_terlambat),
            'bolos' => $this->YesOrNo($data->bolos),
            'kelainan jasmani' => $this->YesOrNo($data->kelainan_jasmani),
            'minat belajar kurang' => $this->YesOrNo($data->minat_belajar_kurang),
            'introvert' => $this->YesOrNo($data->introvert),
            'tinggal dengan wali' => $this->YesOrNo($data->tinggal_dengan_wali),
            'kemampuan kurang' => $this->YesOrNo($data->kemampuan_kurang),
            'kesimpulan' => $data->kesimpulan,
        ];

        return collect([$exported]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Nama Guru',
            'Nama Walas',
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
    // Set body alignment to center
    $lastRow = $sheet->getHighestRow();
    $lastColumn = $sheet->getHighestColumn();
    $range = 'A2:' . $lastColumn . $lastRow;

        $sheet->getStyle('A1:O1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFCB0C9F'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A1:O1')->getAlignment()->setIndent(1);
        $sheet->getStyle('A1:O1')->getAlignment()->setWrapText(true);
        $sheet->getRowDimension(1)->setRowHeight(20);

        // Set column widths
        for ($column = 'A'; $column <= 'E'; $column++) {
            $sheet->getColumnDimension($column)->setWidth(13);
        }

        for ($column = 'F'; $column <= 'O'; $column++) {
            $sheet->getColumnDimension($column)->setWidth(20);
        }

        // Set body alignment to center
        $lastRow = $sheet->getHighestRow();
        $lastColumn = $sheet->getHighestColumn();
        $range = 'A2:' . $lastColumn . $lastRow;

        $sheet->getStyle($range)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle($range)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        return $sheet;
    }
}
