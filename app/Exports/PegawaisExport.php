<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PegawaisExport implements FromCollection, WithMapping, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $rowCount = 0;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pegawai::all();
    }

    /**
     * @var Pegawai $pegawai
     */
    public function map($pegawai): array
    {
        $this->rowCount++;

        return [
            'No' => $this->rowCount,
            'NIP' => $pegawai->nip,
            'Nama' => $pegawai->nm_pegawai,
            'Jenis Kelamin' => $pegawai->jk == 'L' ? 'Laki-Laki' : 'Perempuan',
            'TTL' => $pegawai->tempat_lahir . ', ' . \Carbon\Carbon::parse($pegawai->tgl_lahir)->isoFormat('Do MMMM YYYY', 'id'),
            'Agama' => $pegawai->agama ? $pegawai->agama : '-',
            'Pendidikan Terakhir' => $pegawai->pendidikan,
            'Pangkat / Golongan / Ruang' => $pegawai->pangkat->nm_pangkat . ' / ' . $pegawai->pangkat->gol_ruang,
            'Pangkat TMT' => date('d-m-Y', strtotime($pegawai->pangkat_tmt)),
            'Jabatan' => $pegawai->jabatan->nm_jabatan,
            'Jabatan TMT' => $pegawai->jabatan_tmt ? date('d-m-Y', strtotime($pegawai->jabatan_tmt)) : '-',
            'Pangkat YAD' => $pegawai->duks && $pegawai->duks->pangkat ? $pegawai->duks->pangkat->nm_pangkat . ' / ' . $pegawai->duks->pangkat->gol_ruang : '-',
            'TMT' => $pegawai->duks ? date('d-m-Y', strtotime($pegawai->duks->pangkatYad_tmt ?? null)) : '-',
            'Keterangan' => $pegawai->keterangan ? $pegawai->keterangan : '-',
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'NIP',
            'Nama',
            'Jenis Kelamin',
            'TTL',
            'Agama',
            'Pendidikan Terakhir',
            'Pangkat / Golongan / Ruang',
            'Pangkat TMT',
            'Jabatan',
            'Jabatan TMT',
            'Pangkat YAD',
            'TMT',
            'Keterangan',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Menetapkan batas untuk semua sel pada lembar kerja
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }
}
