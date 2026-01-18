<section>
    <canvas wire:ignore id="monthly-chart" x-init="$nextTick(() => chartInit())"></canvas>
</section>

<script>
    function chartInit() {
        const ctx = document.getElementById('monthly-chart');
        // Data dari laravel
        const monthlyData = @json($data);
        console.log(monthlyData);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
                ],
                datasets: [{
                    label: 'Jumlah Postingan',
                    data: monthlyData,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>
