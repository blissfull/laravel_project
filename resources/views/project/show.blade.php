@extends('layouts.app')

@section('content')

<div class="container">
	<div class="table-responsive" >
		<h1> Your Projects</h1>
		<table class="table table-striped">
			<tr>
				<th>Project Name</th>
				<th>Project Type</th>
				<th>Services</th>
				<th>Comments</th>
			</tr>

			<!-- display all the projects of logged in user -->
			@foreach($projects as $project)
				<tr>
					<td> {{ $project->project_name }} </td>
					<td> {{ $project->project_type }} </td>
					<td>
						<!-- one project may have many services  -->
						@foreach($project->services as $service)
							<p> {{ $service->name }} </p>
						@endforeach

					</td>
					<td> {{ $project->comments }} </td>
				</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection
