@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
    @include('layouts.topnavbande') 
    <!-- partie   contenu de l'administation-->
        <div class="row mt-6 mb-6">

                <!-- partie  de la courbe des donnees -->
                <div class="col-xl-8 col-lg-6">
                    <div class="card shadow-inner mb-4">
                        <canvas id="dossiersChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- partie  du diagramme  circulaire -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card shadow-inner mb-4">
                        <canvas id="dossierscamemberChart" width="400" height="200"></canvas>
                    </div>
                </div>
        </div>
       
        @include('layouts.footers.auth.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    
    
    <script>
        // Code JavaScript pour la requête AJAX et le graphique Chart.js
        $.ajax({
            url: '/get-dossiers-data', // L'URL de votre route Laravel
            type: 'GET',
            dataType: 'json',
            
            success: function(data) {
                // Ici, 'data' contient les données des dossiers au format JSON
                // Utilisez ces données pour créer votre graphique avec Chart.js
                console.log(data);
                // Exemple de code pour créer un graphique en ligne avec Chart.js
                var ctx = document.getElementById('dossiersChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.months, // Assurez-vous que votre réponse JSON contient un tableau de mois
                        datasets: [{
                            label: 'Nombre de dossiers',
                            data: data.numbers, // Assurez-vous que votre réponse JSON contient un tableau de nombres
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
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
        // Pie Chart
        var pieCtx = document.getElementById('dossierscamemberChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: data.months,
                datasets: [{
                    label: 'Nombre de dossiers',
                    data: data.numbers,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    },
    error: function(error) {
        console.error(error);
    }
});


    </script>

@endsection