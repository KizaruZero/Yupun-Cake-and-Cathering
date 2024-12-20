<?php

namespace App\Filament\Widgets;

use App\Models\Orders;
use Illuminate\Support\Carbon;
use Filament\Widgets\LineChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;





class PenjualanChart extends LineChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Penjualan Perbulan';

    protected function getHeaderActions(): array
    {
        return [
            ExportBulkAction::make()
                ->label('Export Data')
                ->icon('heroicon-o-document-arrow-down')
                ->exports([
                    'Date' => fn (TrendValue $record) => Carbon::parse($record->date)->format('Y-m-d'),
                    'Sales Amount' => fn (TrendValue $record) => $record->aggregate,
                ])
                ->fileNamePrefix('penjualan-report')
                ->defaultFormat('xlsx')
                ->collection($this->getChartData()),
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        switch ($activeFilter) {
            case 'today':
                $startDate = Carbon::today();
                $endDate = Carbon::today();
                break;

            case 'week':
                $startDate = Carbon::now()->subDays(7);
                $endDate = Carbon::now();
                break;

            case 'month':
                $startDate = Carbon::now()->subDays(30);
                $endDate = Carbon::now();
                break;

            case 'year':
            default:
                // Default to the start of the year
                $startDate = isset($this->filters['startDate']) ?
                    Carbon::parse($this->filters['startDate']) :
                    Carbon::now()->startOfYear();

                // Set default end date to today if not provided
                $endDate = isset($this->filters['endDate']) ?
                    Carbon::parse($this->filters['endDate']) :
                    Carbon::now();
                break;
        }

        // Query for pemasukan data using valid startDate and endDate
        $data = Trend::query(Orders::query()->pemasukan())
            ->between($startDate, $endDate)  // Use Carbon instances
            ->dateColumn('order_date') // Specify 'tanggal_transaksi' as the date column to be used
            ->perDay()
            ->sum('total_price');  // Summing the income 'jumlah' field

        return [
            'datasets' => [
                [
                    'label' => 'Penjualan',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => Carbon::parse($value->date)->format('Y-m-d')), // Format dates for labels
        ];
    }


    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
    protected function getType(): string
    {
        return 'line';
    }
}
