<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MahasiswaImport implements ToModel, WithStartRow
{
    /**
     * @param Collection $collection
     */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $existingMahasiswa = Mahasiswa::where('nim', $row[0])->first();

        if ($existingMahasiswa) {
            return null;
        }

        return new Mahasiswa([
            'nim' => $row[0],
            'nama' => $row[1],
            'nik' => $row[2],
            'jk' => $row[3],
            'nama_ibu' => $row[4],
            'agama' => $row[5],
            'tempat_lahir' => $row[6],
            'tanggal_lahir' => $row[7],
            'alamat' => $row[8],
            'hp' => $row[9],
            'email_kampus' => $row[10],
            'email_pribadi' => $row[11],
            'tahun_masuk' => $row[12],
        ]);
    }
}
