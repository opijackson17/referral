@extends('home')
@section('admin')

<div class="container">
	<div class="row">
		<div class="card`">
			<div class="card-header text-center text-uppercase text-muted">
				Dashboard
			</div>

			<div class="card-body">
				<!-- <div class="row d-block mb-4">
					<div class="col-sm-10 border">
						<canvas class="col-sm-12" style="margin-top: 1em; margin-bottom: 2em;" id="time_series"></canvas>				
					</div>
				</div> -->
				<div class="row">
					<div class="col-sm-6 d-inline" id="table"></div>
					<div class="col-sm-6 d-inline border" >
						<canvas class="col-sm-12 d-inline" style="margin: 0 auto; margin-top: 1em;" id="bargraph"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@push('scripts')
<script type="text/javascript">
	console.log({!! $timeseries !!})
	timeseries = {!! $timeseries !!}
	feedback = {!! $referral !!}.filter(item => item.feedback !=null);
	notFeedBack = {!! $referral !!}.filter(item => item.feedback ==null);
	

	table="<h2>Tabular Referral Statisitics</h2><table class='table table-bordered'><thead><tr><th>Total Referrals</th><th>Completed</th><th>Not completed</th></tr></thead><tbody><tr><td>"+{!! $referral !!}.length+"</td><td>"+feedback.length+"</td><td>"+notFeedBack.length+"</td></tr></tbody></table>";

	$('#table').html(table);

	const labels = ['Total Referrals', 'Completed', 'Not-completed'];
	const data = {
	  labels: labels,
	  datasets: [{
	  	label: 'datasets',
	    data: [{!! $referral !!}.length, feedback.length, notFeedBack.length],
	    backgroundColor: [
	      'rgb(54, 162, 235)',
	      'rgb(66, 186, 150)',
	      'rgb(255, 99, 132)'
	      ],
	    hoverOffset: 4
	  }]
	};

	doughnutChart = document.getElementById('bargraph').getContext('2d');
	var myChart = new Chart(doughnutChart, {
	  type: "doughnut",
	  data: data,
	  options: {
	  	    plugins: {
		      legend: {
		        title: {
		          display: true,
		          text: 'SHOWS REFERRALS',
		        }
		      }
		    }
	  }
	});


	const labelsline = [timeseries.month_year];
	const dataline = {
	  labels: labelsline,
	  datasets: [{
	    label: 'Completed Referrals',
	    data: [timeseries.feedback_count],
	    fill: false,
	    borderColor: 'rgb(75, 192, 192)',
	    tension: 0.1
	  }]
	};

	lineChart = document.getElementById('time_series').getContext('2d');

	var chart = new Chart(lineChart, {
		type: 'line',
		data: dataline,
		options:{
			   plugins: {
			      title: {
			        display: true,
			        text: 'Business Referral ',
			      }
			    }
		}
	})

</script>
@endpush