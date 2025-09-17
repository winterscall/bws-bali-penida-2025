<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kepala Balai</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.4; }
            100% { opacity: 1; }
        }
        
        #reload-indicator {
            animation: pulse 2s infinite;
        }
        
        /* Responsive table styles */
        @media (max-width: 640px) {
            table {
                display: block;
            }
            
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            
            tr { 
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                margin-bottom: 1rem;
                display: block; 
            }
            
            td {
                border: none;
                position: relative;
                padding-left: 50% !important;
                display: block;
                text-align: left;
            }
            
            td:before {
                position: absolute;
                left: 6px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
            }
            
            td:nth-of-type(1):before { content: "Tanggal"; }
            td:nth-of-type(2):before { content: "Waktu"; }
            td:nth-of-type(3):before { content: "Kegiatan"; }
            td:nth-of-type(4):before { content: "Lokasi"; }
        }
    </style>
</head>
<body>
    <!-- Full page background wrapper -->
    <div class="relative min-h-screen w-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets-tw/img/background.jpg') }}');">
        <!-- Semi-transparent overlay for better text readability -->
        <div class="absolute inset-0 bg-black opacity-60"></div>
        
        <!-- Content container -->
        <div class="relative z-10 container mx-auto px-4 py-12">
            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-white mb-4">Agenda Kepala Balai</h1>
                <div class="w-24 h-1 bg-blue-500 mx-auto"></div>
            </div>
            
            <!-- Table wrapper with glass-like effect -->
            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg shadow-lg p-6 mb-8">
                <div class="overflow-x-auto">
                    <table id="agenda-table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-white bg-opacity-30">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Waktu</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Kegiatan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white bg-opacity-10 divide-y divide-gray-200" id="agenda-data">
                            <!-- Data will be loaded here -->
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-white">Loading agenda...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Last updated info -->
                <div class="mt-4 text-right text-xs text-white italic">
                    Terakhir diperbarui: <span id="last-updated">-</span>
                    <div class="inline-block ml-2">
                        <div id="reload-indicator" class="w-3 h-3 rounded-full bg-green-500 inline-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to format date in Indonesian format
            function formatDate(dateString) {
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateString).toLocaleDateString('id-ID', options);
            }
            
            // Function to format time
            function formatTime(timeString) {
                return timeString;
            }
            
            // Function to load agenda data
            function loadAgendaData() {
                const tableBody = document.getElementById('agenda-data');
                const lastUpdated = document.getElementById('last-updated');
                const indicator = document.getElementById('reload-indicator');
                
                // Change indicator color while loading
                indicator.classList.remove('bg-green-500');
                indicator.classList.add('bg-yellow-500');
                
                fetch('/api/agenda')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Clear loading message
                        tableBody.innerHTML = '';
                        
                        if (data.length === 0) {
                            tableBody.innerHTML = '<tr><td colspan="4" class="px-6 py-4 text-center text-white">Tidak ada agenda untuk saat ini</td></tr>';
                        } else {
                            // Populate table with data
                            data.forEach(item => {
                                const row = document.createElement('tr');
                                row.className = 'hover:bg-white hover:bg-opacity-10';
                                
                                row.innerHTML = `
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${formatDate(item.date)}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${formatTime(item.time)}</td>
                                    <td class="px-6 py-4 text-sm text-white">${item.activity}</td>
                                    <td class="px-6 py-4 text-sm text-white">${item.location}</td>
                                `;
                                
                                tableBody.appendChild(row);
                            });
                        }
                        
                        // Update last updated time
                        const now = new Date();
                        lastUpdated.textContent = now.toLocaleTimeString('id-ID');
                        
                        // Change indicator back to green
                        indicator.classList.remove('bg-yellow-500');
                        indicator.classList.add('bg-green-500');
                    })
                    .catch(error => {
                        console.error('Error fetching agenda data:', error);
                        tableBody.innerHTML = '<tr><td colspan="4" class="px-6 py-4 text-center text-white">Gagal memuat data. Silakan coba lagi nanti.</td></tr>';
                        
                        // Change indicator to red on error
                        indicator.classList.remove('bg-yellow-500');
                        indicator.classList.add('bg-red-500');
                    });
            }
            
            // Load data immediately on page load
            loadAgendaData();
            
            // Reload data every 10 minutes (600000 ms)
            setInterval(loadAgendaData, 600000);
        });
    </script>
</body>
</html>