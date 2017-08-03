@extends('layouts.app')

@section('content')

<div class="col-sm-8 col-sm-offset-2" >
	<h2> Enter Project Details </h2>
	<hr>

	<!-- project creation form with validation and proper error messages -->
	<form method="POST" action="{{ route('store_project') }}">
		  {{ csrf_field() }}

		  <div class="form-group">
			<label>Feilds maraked with * are compulsory</label>
		  </div>
		  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name">Project Name*</label>
			<input type="text" class="form-control" id="name" placeholder="Project Name" name="name">
			@if ($errors->has('name'))
                <span class="help-block">
                    <strong>Please enter name</strong>
                </span>
            @endif

		  </div>
		  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		  	<label>Project Type*</label>
			<select class="form-control" id="type" name="type">
				<option disabled  selected>Select Project Type</option>
				<option>Residential</option>
				<option>Commercial</option>
			  	<option>Other</option>
			</select>
			@if ($errors->has('type'))
                <span class="help-block">
                    <strong>Please select project type</strong>
                </span>
            @endif
		  </div>
		  <label>Services Select at leat one*</label>
		  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			  <select class="form-control" id="serviceCheckbox" multiple="multiple" name="serviceCheckbox[]">
			    <option value="detailing">Detailing</option>
			    <option value="estimating">Estimating</option>
			    <option value="design">Design</option>
			    <option value="construction">Construction</option>
			    <option value="review">Review</option>
			    <option value="inspection">Inspection</option>
			   </select>
			   @if ($errors->has('serviceCheckbox'))
                <span class="help-block">
                    <strong>Please select at least one service</strong>
                </span>
               @endif
		  </div>
		  <div class="form-group"> <label for="comments">Any additional comments?</label>
		  	<textarea class="form-control" type="checkbox" id="comments" name="comments"></textarea>
		  </div>
		  <label>Terms and Conditions*</label>
		  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		    <input type="checkbox" id="termsAndConditions" name="termsAndConditions"> I Agree
		     @if ($errors->has('termsAndConditions'))
                <span class="help-block">
                    <strong>You must agree to terms and conditions</strong>
                </span>
               @endif
		  </div>

		  <div class="form-group">
		  <button type="submit" class="btn btn-primary">Create Project</button>
		  </div>
	</form>

	<script>
	$('#serviceCheckbox').multiselect({
	    placeholder: 'Select Service(s)',
	});
	$(document).ready(function() {
	    $(".dropdown-toggle").dropdown();
	});
	</script>
</div>

@endsection
