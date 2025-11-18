<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart-Tani - Sistem Kompos Cerdas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #2e7d32;
            --primary-light: #4caf50;
            --secondary: #ffa000;
            --dark-blue: #0a1930;
            --darker-blue: #050d1a;
            --midnight-blue: #0c2d48;
            --deep-blue: #145da0;
            --card-bg: #152642;
            --text-light: #e0f7fa;
            --text-gray: #b0bec5;
            --danger: #f44336;
            --warning: #ffc107;
            --info: #2196f3;
            --success: #4caf50;
            --temp-color: #ff5722;
            --humidity-color: #00bcd4;
            --fan-color: #7e57c2;
            --water-color: #29b6f6;
            --gas-color: #f44336;
            --ph-color: #9c27b0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, var(--darker-blue) 0%, var(--midnight-blue) 30%, var(--deep-blue) 70%, var(--dark-blue) 100%);
            color: var(--text-light);
            line-height: 1.6;
            min-height: 100vh;
            background-attachment: fixed;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: rgba(10, 25, 48, 0.9);
            color: var(--text-light);
            padding: 1rem 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo i {
            font-size: 2rem;
            margin-right: 10px;
            color: var(--primary-light);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 600;
            background: linear-gradient(to right, var(--primary-light), var(--info));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 5px 10px;
            border-radius: 5px;
            position: relative;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: linear-gradient(to right, var(--primary-light), var(--info));
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        nav ul li a:hover {
            color: var(--info);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(5, 13, 26, 0.85), rgba(5, 13, 26, 0.85)), url('https://images.unsplash.com/photo-1625246337991-4fd36e9a5dd5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
            padding: 4rem 0;
            text-align: center;
            border-bottom: 1px solid rgba(33, 150, 243, 0.3);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, var(--primary-light), var(--info));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: slideUp 1s ease;
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 2rem;
            color: var(--text-gray);
            animation: slideUp 1s ease 0.2s forwards;
            opacity: 0;
        }

        /* Dashboard Section */
        .dashboard {
            padding: 3rem 0;
            animation: fadeIn 1s ease 0.3s forwards;
            opacity: 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            background: linear-gradient(to right, var(--primary-light), var(--info));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sensor-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: rgba(21, 38, 66, 0.8);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(33, 150, 243, 0.2);
            backdrop-filter: blur(5px);
            animation: cardAppear 0.5s ease;
        }

        @keyframes cardAppear {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.4);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-header i {
            font-size: 2rem;
            margin-right: 15px;
        }

        .gas-sensor .card-header i {
            color: var(--danger);
        }

        .ph-sensor .card-header i {
            color: var(--ph-color);
        }

        .temp-sensor .card-header i {
            color: var(--temp-color);
        }

        .humidity-sensor .card-header i {
            color: var(--humidity-color);
        }

        .card-header h3 {
            font-size: 1.5rem;
            color: var(--text-light);
        }

        .card-value {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }

        .gas-value {
            color: var(--danger);
        }

        .ph-value {
            color: var(--ph-color);
        }

        .temp-value {
            color: var(--temp-color);
        }

        .humidity-value {
            color: var(--humidity-color);
        }

        .card-status {
            text-align: center;
            padding: 8px;
            border-radius: 20px;
            font-weight: 500;
            margin-top: 10px;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .status-normal {
            color: var(--primary-light);
            border: 1px solid var(--primary-light);
        }

        .status-warning {
            color: var(--warning);
            border: 1px solid var(--warning);
        }

        .status-danger {
            color: var(--danger);
            border: 1px solid var(--danger);
        }

        .card p {
            color: var(--text-gray);
            margin-top: 15px;
            font-size: 0.9rem;
        }

        /* Charts Section */
        .charts {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .chart-container {
            background: rgba(21, 38, 66, 0.8);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(33, 150, 243, 0.2);
            backdrop-filter: blur(5px);
            animation: cardAppear 0.5s ease;
        }

        .chart-title {
            font-size: 1.5rem;
            color: var(--text-light);
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-content">
            <div class="logo">
                <i class="fas fa-recycle"></i>
                <h1>Smart-Tani Kompos</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#dashboard">Dashboard</a></li>
                    <li><a href="#control">Kontrol</a></li>
                    <li><a href="#calendar">Kalender</a></li>
                    <li><a href="#about">Tentang</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Sistem Kompos Cerdas</h2>
            <p>Pantau dan kelola proses pengomposan Anda secara real-time dengan sensor cerdas dan kontrol otomatis untuk hasil terbaik</p>
        </div>
    </section>

    <!-- Dashboard Section -->
    <section id="dashboard" class="dashboard">
        <div class="container">
            <h2 class="section-title">Dashboard Sensor</h2>
            
            <div class="sensor-cards">
                <!-- Gas Sensor Card -->
                <div class="card gas-sensor">
                    <div class="card-header">
                        <i class="fas fa-wind"></i>
                        <h3>Sensor Gas</h3>
                    </div>
                    <div class="card-value gas-value">325 ppm</div>
                    <div class="card-status status-normal">Normal</div>
                    <p>Sensor gas mendeteksi kadar gas seperti metana dan amonia selama proses pengomposan.</p>
                </div>
                
                <!-- pH Sensor Card -->
                <div class="card ph-sensor">
                    <div class="card-header">
                        <i class="fas fa-tint"></i>
                        <h3>Sensor pH Asam</h3>
                    </div>
                    <div class="card-value ph-value">6.8</div>
                    <div class="card-status status-normal">Optimal</div>
                    <p>Sensor pH mengukur tingkat keasaman kompos untuk memastikan kondisi optimal untuk penguraian.</p>
                </div>
                
                <!-- Temperature Sensor Card -->
                <div class="card temp-sensor">
                    <div class="card-header">
                        <i class="fas fa-thermometer-half"></i>
                        <h3>Sensor Suhu</h3>
                    </div>
                    <div class="card-value temp-value">42.5°C</div>
                    <div class="card-status status-normal">Optimal</div>
                    <p>Sensor suhu memantau temperatur kompos untuk menjaga kondisi ideal bagi mikroorganisme.</p>
                </div>
                
                <!-- Humidity Sensor Card -->
                <div class="card humidity-sensor">
                    <div class="card-header">
                        <i class="fas fa-tint"></i>
                        <h3>Sensor Kelembapan</h3>
                    </div>
                    <div class="card-value humidity-value">65%</div>
                    <div class="card-status status-normal">Ideal</div>
                    <p>Sensor kelembapan mengukur kadar air dalam kompos untuk memastikan lingkungan yang sesuai.</p>
                </div>
            </div>
            
            <div class="charts">
                <!-- Combined Chart -->
                <div class="chart-container">
                    <h3 class="chart-title">Data Semua Sensor (7 Hari Terakhir)</h3>
                    <canvas id="combinedChart"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Control Section -->
    <section id="control" class="control-section">
        <div class="container">
            <h2 class="section-title">Kontrol Sistem</h2>
            
            <div class="control-cards">
                <!-- Fan Control -->
                <div class="control-card fan-control">
                    <div class="control-header">
                        <i class="fas fa-fan"></i>
                        <h3>Kontrol Kipas</h3>
                    </div>
                    
                    <div class="control-mode">
                        <div class="mode-btn active" id="fan-auto">Otomatis</div>
                        <div class="mode-btn" id="fan-manual">Manual</div>
                    </div>
                    
                    <div class="control-slider">
                        <div class="slider-label">
                            <span>Suhu Nyala: </span>
                            <span id="fan-temp-value">40°C</span>
                        </div>
                        <input type="range" min="30" max="60" value="40" id="fan-temp-slider">
                    </div>
                    
                    <div class="manual-control">
                        <label class="switch">
                            <input type="checkbox" id="fan-switch">
                            <span class="slider-round"></span>
                        </label>
                        <p id="fan-status">Status: Mati</p>
                    </div>
                </div>
                
                <!-- Water Control -->
                <div class="control-card water-control">
                    <div class="control-header">
                        <i class="fas fa-tint"></i>
                        <h3>Kontrol Air</h3>
                    </div>
                    
                    <div class="control-mode">
                        <div class="mode-btn active" id="water-auto">Otomatis</div>
                        <div class="mode-btn" id="water-manual">Manual</div>
                    </div>
                    
                    <div class="control-slider">
                        <div class="slider-label">
                            <span>Kelembapan Nyala: </span>
                            <span id="water-humidity-value">60%</span>
                        </div>
                        <input type="range" min="40" max="80" value="60" id="water-humidity-slider">
                    </div>
                    
                    <div class="manual-control">
                        <label class="switch">
                            <input type="checkbox" id="water-switch">
                            <span class="slider-round"></span>
                        </label>
                        <p id="water-status">Status: Mati</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container footer-content">
            <p>&copy; 2023 Smart-Tani - Sistem Kompos Cerdas</p>
            <p>Email: info@smart-tani.com | Telp: (021) 1234-5678</p>
        </div>
    </footer>

    <script>
        // Data untuk grafik
        const gasData = [350, 320, 325, 340, 305, 315, 325];
        const tempData = [38.5, 40.2, 42.5, 41.0, 39.5, 40.8, 42.5];
        const phData = [6.5, 6.7, 6.9, 6.8, 6.6, 6.8, 6.8];
        const humidityData = [60, 62, 65, 63, 64, 65, 65];
        const labels = ['6 Hari Lalu', '5 Hari Lalu', '4 Hari Lalu', '3 Hari Lalu', '2 Hari Lalu', 'Kemarin', 'Hari Ini'];
        
       // Inisialisasi grafik gabungan
const combinedCtx = document.getElementById('combinedChart').getContext('2d');
const combinedChart = new Chart(combinedCtx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Gas (ppm)',
                data: gasData,
                borderColor: '#f44336',
                backgroundColor: 'rgba(244, 67, 54, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                yAxisID: 'y'
            },
            {
                label: 'Suhu (°C)',
                data: tempData,
                borderColor: '#ff5722',
                backgroundColor: 'rgba(255, 87, 34, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                yAxisID: 'y1'
            },
            {
                label: 'pH',
                data: phData,
                borderColor: '#9c27b0',
                backgroundColor: 'rgba(156, 39, 176, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                yAxisID: 'y2'
            },
            {
                label: 'Kelembapan (%)',
                data: humidityData,
                borderColor: '#00bcd4',
                backgroundColor: 'rgba(0, 188, 212, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                yAxisID: 'y'
            }
        ]
    },
    options: {
        responsive: true,
        interaction: {
            mode: 'index',
            intersect: false,
        },
        plugins: {
            legend: {
                labels: {
                    color: '#e0f7fa'
                }
            },
            tooltip: {
                mode: 'index',
                intersect: false
            }
        },
        scales: {
            y: {
                type: 'linear',
                display: true,
                position: 'left',
                title: {
                    display: true,
                    text: 'Gas (ppm) & Kelembapan (%)',
                    color: '#e0f7fa'
                },
                grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                },
                ticks: {
                    color: '#e0f7fa'
                }
            },
            y1: {
                type: 'linear',
                display: true,
                position: 'right',
                title: {
                    display: true,
                    text: 'Suhu (°C)',
                    color: '#e0f7fa'
                },
                grid: {
                    drawOnChartArea: false,
                    color: 'rgba(255, 255, 255, 0.1)'
                },
                ticks: {
                    color: '#e0f7fa'
                }
            },
            y2: {
                type: 'linear',
                display: true,
                position: 'right',
                title: {
                    display: true,
                    text: 'pH',
                    color: '#e0f7fa'
                },
                grid: {
                    drawOnChartArea: false,
                    color: 'rgba(255, 255, 255, 0.1)'
                },
                ticks: {
                    color: '#e0f7fa'
                },
                offset: true
            },
            x: {
                grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                },
                ticks: {
                    color: '#e0f7fa'
                }
            }
        }
    }
});
