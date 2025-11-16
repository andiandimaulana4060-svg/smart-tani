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
        
        /* Control Section */
        .control-section {
            margin: 3rem 0;
            animation: fadeIn 1s ease 0.4s forwards;
            opacity: 0;
        }
        
        .control-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .control-card {
            background: rgba(21, 38, 66, 0.8);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(33, 150, 243, 0.2);
            backdrop-filter: blur(5px);
            animation: cardAppear 0.5s ease;
        }
        
        .control-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .control-header i {
            font-size: 2rem;
            margin-right: 15px;
        }
        
        .fan-control .control-header i {
            color: var(--fan-color);
        }
        
        .water-control .control-header i {
            color: var(--water-color);
        }
        
        .control-header h3 {
            font-size: 1.5rem;
            color: var(--text-light);
        }
        
        .control-mode {
            display: flex;
            margin-bottom: 20px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 5px;
        }
        
        .mode-btn {
            flex: 1;
            padding: 8px;
            text-align: center;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .mode-btn.active {
            background: var(--info);
            color: white;
        }
        
        .control-slider {
            margin-bottom: 20px;
        }
        
        .slider-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        input[type="range"] {
            width: 100%;
            height: 8px;
            -webkit-appearance: none;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            outline: none;
        }
        
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--info);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        input[type="range"]::-webkit-slider-thumb:hover {
            transform: scale(1.2);
        }
        
        .manual-control {
            text-align: center;
        }
        
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider-round {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        
        .slider-round:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider-round {
            background-color: var(--success);
        }
        
        input:checked + .slider-round:before {
            transform: translateX(26px);
        }
        
        /* Calendar Section */
        .calendar-section {
            margin: 3rem 0;
            animation: fadeIn 1s ease 0.5s forwards;
            opacity: 0;
        }
        
        .calendar-card {
            background: rgba(21, 38, 66, 0.8);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(33, 150, 243, 0.2);
            backdrop-filter: blur(5px);
            animation: cardAppear 0.5s ease;
        }
        
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .calendar-header h3 {
            font-size: 1.5rem;
            color: var(--text-light);
        }
        
        .calendar-header i {
            font-size: 1.5rem;
            color: var(--info);
        }
        
        .calendar {
            width: 100%;
            border-collapse: collapse;
        }
        
        .calendar th {
            padding: 10px;
            text-align: center;
            color: var(--info);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .calendar td {
            padding: 10px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            height: 40px;
            width: 40px;
        }
        
        .calendar td:hover {
            background-color: rgba(33, 150, 243, 0.2);
        }
        
        .calendar td.today {
            background-color: var(--info);
            color: white;
            border-radius: 50%;
        }
        
        .calendar td.compost-day {
            background-color: var(--primary-light);
            color: white;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        .calendar td.has-note::after {
            content: '';
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: var(--warning);
            border-radius: 50%;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .add-event {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        
        .add-event input {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.2);
            color: var(--text-light);
            transition: all 0.3s ease;
        }
        
        .add-event input:focus {
            outline: none;
            border-color: var(--info);
            box-shadow: 0 0 0 2px rgba(33, 150, 243, 0.2);
        }
        
        .add-event button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background: var(--info);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .add-event button:hover {
            background: var(--primary);
            transform: translateY(-2px);
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
        
        /* Footer */
        footer {
            background-color: var(--darker-blue);
            color: var(--text-gray);
            padding: 2rem 0;
            text-align: center;
            border-top: 1px solid rgba(33, 150, 243, 0.3);
            animation: fadeIn 1s ease 0.6s forwards;
            opacity: 0;
        }
        
        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .footer-content p {
            margin: 10px 0;
        }
        
        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--success);
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: flex;
            align-items: center;
            animation: toastIn 0.5s ease, toastOut 0.5s ease 2.5s forwards;
        }
        
        @keyframes toastIn {
            from { transform: translateX(100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes toastOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100px); opacity: 0; }
        }
        
        .toast i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 15px;
                justify-content: center;
                flex-wrap: wrap;
            }
            
            nav ul li {
                margin: 5px 10px;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .sensor-cards, .control-cards {
                grid-template-columns: 1fr;
            }
            
            .add-event {
                flex-direction: column;
            }
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

    <!-- Calendar Section -->
    <section id="calendar" class="calendar-section">
        <div class="container">
            <h2 class="section-title">Kalender Kompos</h2>
            
            <div class="calendar-card">
                <div class="calendar-header">
                    <h3>Jadwal Pengomposan</h3>
                    <i class="fas fa-calendar-alt"></i>
                </div>
                
                <table class="calendar">
                    <thead>
                        <tr>
                            <th>M</th>
                            <th>S</th>
                            <th>S</th>
                            <th>R</th>
                            <th>K</th>
                            <th>J</th>
                            <th>S</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td class="event">4</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>20</td>
                            <td>21</td>
                            <td>22</td>
                            <td class="today">23</td>
                            <td>24</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>27</td>
                            <td>28</td>
                            <td>29</td>
                            <td>30</td>
                            <td>31</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="add-event">
                    <input type="text" placeholder="Tambah catatan kompos..." id="event-input">
                    <button id="add-event-btn">Tambah</button>
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
                        // Menempatkan skala pH di sisi kanan dengan offset
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
        
        // Kontrol Kipas
        const fanAutoBtn = document.getElementById('fan-auto');
        const fanManualBtn = document.getElementById('fan-manual');
        const fanTempSlider = document.getElementById('fan-temp-slider');
        const fanTempValue = document.getElementById('fan-temp-value');
        const fanSwitch = document.getElementById('fan-switch');
        const fanStatus = document.getElementById('fan-status');
        
        fanAutoBtn.addEventListener('click', () => {
            fanAutoBtn.classList.add('active');
            fanManualBtn.classList.remove('active');
            fanSwitch.disabled = true;
            fanStatus.textContent = 'Status: Mode Otomatis';
            showToast('Mode kipas diubah ke otomatis');
        });
        
        fanManualBtn.addEventListener('click', () => {
            fanManualBtn.classList.add('active');
            fanAutoBtn.classList.remove('active');
            fanSwitch.disabled = false;
            updateFanStatus();
            showToast('Mode kipas diubah ke manual');
        });
        
        fanTempSlider.addEventListener('input', () => {
            fanTempValue.textContent = `${fanTempSlider.value}°C`;
        });
        
        fanSwitch.addEventListener('change', updateFanStatus);
        
        function updateFanStatus() {
            fanStatus.textContent = fanSwitch.checked ? 
                'Status: Menyala' : 'Status: Mati';
                
            showToast(fanSwitch.checked ? 
                'Kipas dinyalakan' : 'Kipas dimatikan');
        }
        
        // Kontrol Air
        const waterAutoBtn = document.getElementById('water-auto');
        const waterManualBtn = document.getElementById('water-manual');
        const waterHumiditySlider = document.getElementById('water-humidity-slider');
        const waterHumidityValue = document.getElementById('water-humidity-value');
        const waterSwitch = document.getElementById('water-switch');
        const waterStatus = document.getElementById('water-status');
        
        waterAutoBtn.addEventListener('click', () => {
            waterAutoBtn.classList.add('active');
            waterManualBtn.classList.remove('active');
            waterSwitch.disabled = true;
            waterStatus.textContent = 'Status: Mode Otomatis';
            showToast('Mode air diubah ke otomatis');
        });
        
        waterManualBtn.addEventListener('click', () => {
            waterManualBtn.classList.add('active');
            waterAutoBtn.classList.remove('active');
            waterSwitch.disabled = false;
            updateWaterStatus();
            showToast('Mode air diubah ke manual');
        });
        
        waterHumiditySlider.addEventListener('input', () => {
            waterHumidityValue.textContent = `${waterHumiditySlider.value}%`;
        });
        
        waterSwitch.addEventListener('change', updateWaterStatus);
        
        function updateWaterStatus() {
            waterStatus.textContent = waterSwitch.checked ? 
                'Status: Menyala' : 'Status: Mati';
                
            showToast(waterSwitch.checked ? 
                'Pompa air dinyalakan' : 'Pompa air dimatikan');
        }
        
        // Kalender dan Event
        const eventInput = document.getElementById('event-input');
        const addEventBtn = document.getElementById('add-event-btn');
        const calendarDays = document.querySelectorAll('.calendar td');
        const todayElement = document.querySelector('.calendar td.today');
        
        // Menandai hari ini sebagai hari memasukkan kompos secara default
        if (todayElement && !todayElement.classList.contains('event')) {
            todayElement.classList.add('compost-day');
        }
        
        // Menambahkan event listener untuk setiap hari di kalender
        calendarDays.forEach(day => {
            if (day.textContent.match(/\d+/)) { // Hanya hari yang memiliki angka
                day.addEventListener('click', () => {
                    // Toggle status compost-day
                    if (day.classList.contains('compost-day')) {
                        day.classList.remove('compost-day');
                        day.classList.remove('has-note');
                        showToast('Hari ' + day.textContent + ' dihapus dari jadwal kompos');
                    } else {
                        day.classList.add('compost-day');
                        showToast('Hari ' + day.textContent + ' ditandai sebagai hari kompos');
                    }
                });
            }
        });
        
        addEventBtn.addEventListener('click', () => {
            if (eventInput.value.trim() !== '') {
                // Menambahkan catatan ke hari yang dipilih
                const selectedDay = document.querySelector('.calendar td.compost-day');
                if (selectedDay) {
                    selectedDay.classList.add('has-note');
                    showToast(`Catatan ditambahkan untuk hari ${selectedDay.textContent}: ${eventInput.value}`);
                    eventInput.value = '';
                } else {
                    showToast('Pilih hari kompos terlebih dahulu', 'error');
                }
            }
        });
        
        // Fungsi untuk menampilkan notifikasi toast
        function showToast(message, type = 'success') {
            // Hapus toast sebelumnya jika ada
            const existingToast = document.querySelector('.toast');
            if (existingToast) {
                existingToast.remove();
            }
            
            // Buat elemen toast baru
            const toast = document.createElement('div');
            toast.className = `toast ${type === 'error' ? 'error-toast' : ''}`;
            
            // Tambahkan ikon berdasarkan jenis pesan
            const icon = type === 'error' ? '❌' : '✅';
            toast.innerHTML = `<i>${icon}</i> ${message}`;
            
            // Style untuk toast error
            if (type === 'error') {
                toast.style.backgroundColor = '#f44336';
            }
            
            // Tambahkan ke body
            document.body.appendChild(toast);
            
            // Hapus toast setelah 3 detik
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 3000);
        }
        
        // Simulasi pembaruan data sensor secara real-time
        function updateSensorData() {
            // Simulasi perubahan data sensor
            const gasValueElement = document.querySelector('.gas-value');
            const phValueElement = document.querySelector('.ph-value');
            const tempValueElement = document.querySelector('.temp-value');
            const humidityValueElement = document.querySelector('.humidity-value');
            
            // Fluktuasi kecil pada data
            const randomChange = (base, range) => (base + (Math.random() * range * 2 - range)).toFixed(1);
            
            // Perbarui nilai sensor dengan fluktuasi acak
            const newGasValue = randomChange(325, 5);
            const newPhValue = randomChange(6.8, 0.1);
            const newTempValue = randomChange(42.5, 0.5);
            const newHumidityValue = randomChange(65, 2);
            
            // Animasi perubahan nilai
            animateValueChange(gasValueElement, parseFloat(gasValueElement.textContent), newGasValue, 1000, ' ppm');
            animateValueChange(phValueElement, parseFloat(phValueElement.textContent), newPhValue, 1000, '');
            animateValueChange(tempValueElement, parseFloat(tempValueElement.textContent), newTempValue, 1000, '°C');
            animateValueChange(humidityValueElement, parseFloat(humidityValueElement.textContent), newHumidityValue, 1000, '%');
            
            // Perbarui grafik dengan data baru
            combinedChart.data.datasets[0].data.push(newGasValue);
            combinedChart.data.datasets[1].data.push(newTempValue);
            combinedChart.data.datasets[2].data.push(newPhValue);
            combinedChart.data.datasets[3].data.push(newHumidityValue);
            
            combinedChart.data.labels.push('Baru');
            if (combinedChart.data.datasets[0].data.length > 7) {
                combinedChart.data.datasets.forEach(dataset => {
                    dataset.data.shift();
                });
                combinedChart.data.labels.shift();
            }
            combinedChart.update('none');
        }
        
        // Fungsi untuk animasi perubahan nilai
        function animateValueChange(element, start, end, duration, suffix) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = progress * (end - start) + start;
                element.textContent = value.toFixed(end % 1 === 0 ? 0 : 1) + suffix;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }
        
        // Pembaruan data setiap 10 detik
        setInterval(updateSensorData, 10000);
        
        // Animasi scroll halus untuk navigasi
        document.querySelectorAll('nav a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>