<?php

namespace App\Filament\Widgets;

use App\Models\OrderItems;
use App\Models\Orders;
use Filament\Widgets\PieChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;



class penjualanProdukChart extends PieChartWidget
{
    protected static ?string $heading = 'Distribusi Penjualan Produk';
    use InteractsWithPageFilters;
    protected int|string|array $columnSpan = 'full';



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

        $query = OrderItems::query()
            ->join('orders', 'order_items.order_id', '=', 'orders.id') // Join ke tabel orders
            ->join('products', 'order_items.product_id', '=', 'products.id') // Join ke tabel products untuk mengambil nama produk
            ->where('orders.status', 'completed') // Hanya hitung orders dengan status "completed"
            ->whereBetween('orders.order_date', [$startDate, $endDate]) // Filter berdasarkan rentang tanggal
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity')) // Agregasi kuantitas item per produk
            ->groupBy('order_items.product_id', 'products.name'); // Grouping berdasarkan product_id untuk pengelompokan produk yang sama
        $salesData = $query->get();

        $labels = $salesData->pluck('name')->toArray(); // Ambil nama produk untuk label pie chart
        $values = $salesData->pluck('total_quantity')->toArray(); // Ambil total kuantitas untuk data pie chart


        return [
            'datasets' => [
                [
                    'label' => 'Penjualan Produk',
                    'data' => $values,
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40',
                        '#FF6384',
                        '#C9CBCF',
                        '#4BC0C0',
                        '#FF6384',
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
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
        return 'doughnut';
    }
}