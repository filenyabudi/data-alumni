<?php

namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $rataRataIPK = number_format(Alumni::avg('ipk'), 2);
        $lamaStudi = Alumni::join('mahasiswas', 'alumnis.mahasiswa_id', '=', 'mahasiswas.id')
            ->get();

        $totalLamaStudi = 0;
        $count = 0;
        foreach ($lamaStudi as $studi) {
            $tahunMasuk = $studi->tahun_masuk;
            $tahunLulus = $studi->tahun_lulus;
            $lamaStudi = $tahunLulus - $tahunMasuk;
            $totalLamaStudi += $lamaStudi;
            $count++;
        }

        $averageLamaStudi = $count > 0 ? number_format($totalLamaStudi / $count, 2) : 0;

        return [
            Stat::make('Rata-Rata IPK', $rataRataIPK),
            Stat::make('Lama Studi (Tahun)', $averageLamaStudi),
        ];
    }
}
