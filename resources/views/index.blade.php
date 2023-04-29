
<!doctype html>
<html lang="en">

<head>
  <title>Showing Users</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container" style="height: 500px; width: 500px;">
<canvas id="pieChart"></canvas>
</div>
    <table class="table table-dark">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Country</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Address</th>
      <th>Created At</th>
      <th>Updated At</th>
</thead> 
 
<tbody>
  @foreach($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->country}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->address}}</td>
    <td>{{$user->created_at}}</td>
    <td>{{$user->update_at}}</td>
    
  </tr>
 
@endforeach
</tbody>
</table>
<!-- <canvas id="user-country-chart"></canvas> -->
  </main>
<!-- Inside chart.blade.php -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('usersByCountry').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Users by Country',
                data: @json($data),
                backgroundColor: '#3490dc'
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script> -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: @json($labels),
            datasets: [{
                data: @json($data),
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF',
                    '#00FF99',
                    '#FF9933'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>

</body>

</html>
