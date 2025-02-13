<?php

namespace App\Filament\Resources\MahasiswaResource\Pages;

use App\Filament\Resources\MahasiswaResource;
use App\Imports\MahasiswaImport;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\Actions\Action;

class ListMahasiswas extends ListRecords
{
    protected static string $resource = MahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->color("primary")
                ->sampleExcel(
                    sampleData: [
                        [
                            'nim' => '201000987',
                            'nama' => 'John Doe',
                            'nik' => '320413998332',
                            'jk' => 'Pria',
                            'nama_ibu' => 'Janet',
                            'agama' => 'Islam',
                            'tempat_lahir' => 'Bandung',
                            'tanggal_lahir' => '1998-01-01',
                            'alamat' => 'Jl. Merdeka No. 1',
                            'hp' => '081234567890',
                            'email_kampus' => 'john.doe@unpas.ac.id',
                            'email_pribadi' => 'john.doe@gmail.com',
                            'tahun_masuk' => '2017',
                        ],
                        [
                            'nim' => '201000988',
                            'nama' => 'Jane Smith',
                            'nik' => '320413998333',
                            'jk' => 'Wanita',
                            'nama_ibu' => 'Mary',
                            'agama' => 'Kristen',
                            'tempat_lahir' => 'Jakarta',
                            'tanggal_lahir' => '1999-02-02',
                            'alamat' => 'Jl. Sudirman No. 2',
                            'hp' => '081234567891',
                            'email_kampus' => 'jane.smith@unpas.ac.id',
                            'email_pribadi' => 'jane.smith@gmail.com',
                            'tahun_masuk' => '2018',
                        ],
                        [
                            'nim' => '201000989',
                            'nama' => 'Robert Brown',
                            'nik' => '320413998334',
                            'jk' => 'Pria',
                            'nama_ibu' => 'Linda',
                            'agama' => 'Hindu',
                            'tempat_lahir' => 'Surabaya',
                            'tanggal_lahir' => '2000-03-03',
                            'alamat' => 'Jl. Diponegoro No. 3',
                            'hp' => '081234567892',
                            'email_kampus' => 'robert.brown@unpas.ac.id',
                            'email_pribadi' => 'robert.brown@gmail.com',
                            'tahun_masuk' => '2019',
                        ],
                    ],
                    fileName: 'mahasiswa.csv',
                    sampleButtonLabel: 'Download Sample',
                )
                ->use(MahasiswaImport::class),
            Actions\CreateAction::make(),
        ];
    }
}
