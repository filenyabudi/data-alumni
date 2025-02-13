<?php

namespace App\Filament\Widgets;

use App\Models\Mahasiswa;
use Filament\Widgets\ChartWidget;

class MahasiswaChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Mahasiswa Per-Angkatan';

    protected static ?int $sort = 2;

    // protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Mahasiswa::selectRaw('tahun_masuk')->get();
        $yearlyData = $data->groupBy('tahun_masuk')->map(function ($row) {
            return $row->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Tahun Masuk Mahasiswa',
                    'data' => $yearlyData->values()->toArray(),
                ],
            ],
            'labels' => $yearlyData->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
