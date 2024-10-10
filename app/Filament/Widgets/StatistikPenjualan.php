<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\Orders;
use Illuminate\Support\Carbon;
use App\Models\Pengeluaran;

class StatistikPenjualan extends BaseWidget
{
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        $startDate = !is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = !is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        $totalPemasukan = Orders::pemasukan()->whereBetween('order_date', [$startDate, $endDate])->sum('total_price');
        $totalPengeluaran = Pengeluaran::whereBetween('tanggal_pengeluaran', [$startDate, $endDate])->sum('jumlah_pengeluaran');
        $margin = $totalPemasukan - $totalPengeluaran;



        return [
            Stat::make('Total Penjualan', $this->formatCurrency($totalPemasukan))
                // ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Pengeluaran', $this->formatCurrency($totalPengeluaran))
                // ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('danger'),
            Stat::make('Margin', $this->formatCurrency($margin))
                // ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }

    protected function formatCurrency($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
