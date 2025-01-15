<canvas id="viewsChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "u845457687_XTELL_777"; // Ajustar para suas credenciais
$password = "Tubarao777"; // Ajustar para suas credenciais
$dbname = "u845457687_net_you_stream"; // Ajustar para o nome do banco correto

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recupera as datas e visualizações dos vídeos
$sql = "SELECT publish_date, views FROM videos ORDER BY publish_date ASC";
$result = $conn->query($sql);

$dates = [];
$views = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Formatar a data para um formato mais legível (se necessário)
        $formattedDate = date('d/m/Y', strtotime($row['publish_date']));
        $dates[] = $formattedDate;
        $views[] = $row['views'];
    }
}

$conn->close();
?>

<script>
    var ctx = document.getElementById('viewsChart').getContext('2d');
    var viewsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>, // Datas dinâmicas
            datasets: [{
                label: 'Visualizações',
                data: <?php echo json_encode($views); ?>, // Dados dinâmicos de visualizações
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
                fill: false, // Não preencher a área abaixo da linha
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Data de Publicação'
                    },
                    ticks: {
                        maxRotation: 45, // Rotaciona as datas se necessário
                        minRotation: 30
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Visualizações'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>