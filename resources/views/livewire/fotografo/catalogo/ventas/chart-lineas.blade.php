<!-- Chart -->
<div class="relative p-4 h-72">
    <canvas id="barChart"></canvas>
</div>

<script>
    const cssColors = (color) => {
        return getComputedStyle(document.documentElement).getPropertyValue(color)
    }

    const getColor = () => {
        return window.localStorage.getItem('color') ?? 'cyan'
    }

    const colors = {
        primary: cssColors(`--color-${getColor()}`),
        primaryLight: cssColors(`--color-${getColor()}-light`),
        primaryLighter: cssColors(`--color-${getColor()}-lighter`),
        primaryDark: cssColors(`--color-${getColor()}-dark`),
        primaryDarker: cssColors(`--color-${getColor()}-darker`),
    }
    var nombres = <?php echo json_encode($nombres); ?>;
    var fotografias = <?php echo json_encode($fotos); ?>;

    let usuarios = [];
    for (i = 0; i < nombres.length; i++) {
        usuarios.push(nombres[i].nombre)
    }

    let fotos = [];
    for (i = 0; i < fotografias.length; i++) {
        fotos.push(fotografias[i])
    }

    const barChart = new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: usuarios,
            datasets: [{
                data: fotos,
                backgroundColor: colors.primary,
                hoverBackgroundColor: colors.primaryDark,
            }, ],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 50,
                        fontSize: 12,
                        fontColor: '#97a4af',
                        fontFamily: 'Open Sans, sans-serif',
                        padding: 10,
                    },
                }, ],
                xAxes: [{
                    ticks: {
                        fontSize: 12,
                        fontColor: '#97a4af',
                        fontFamily: 'Open Sans, sans-serif',
                        padding: 5,
                    },
                    categoryPercentage: 0.5,
                    maxBarThickness: '30',
                }, ],
            },
            cornerRadius: 2,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
        },
    })

</script>
