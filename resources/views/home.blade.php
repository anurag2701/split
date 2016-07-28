@extends('layouts.layout') @section('title', 'Page Title')

@section('sidebar') @parent @endsection @section('content')
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<section class="panel b-blue" id="1">
	<article class="panel__wrapper">
		<div class="panel__content">
			<h1 class="panel__headline">
				<i class="fa fa-camera-retro"></i>&nbsp;Add Spendings
			</h1>
			<table class="table">
        	<tbody>
        		{{ Form::open(array('url' => 'create_spending','method' => 'post')) }}
        			 <tr>
						<th class="text-nowrap " scope="row"><label> 1) Enter Amount<span class="req">*</span></label></th> 
						<td><input type="number" name="amount" onchange="setTwoNumberDecimal" min="1" step="0.5" value="0.00" /></td> 
					</tr>
					
					<tr>
						<th class="text-nowrap " scope="row"><label> 2) Select Group<span class="req">*</span></label> </th> 
						<td>{{!	$groups = GroupsModel::where('user_id',Auth::id())->lists('group_name', 'group_id') }} {{ Form::select('group',$groups) }}</td> 
					</tr>
					
					<tr>
						<th class="text-nowrap " scope="row"> <label> 3) Select members<span class="req">*</span></label></th> 
						<td>{{! $groups = User::lists('name', 'id') }}
						{{ Form::select('user',	$groups,null,array('multiple'=>'multiple','name'=>'groups[]')) }}</td> 
					</tr>
					
					<tr>
						<th class="text-nowrap " scope="row"> <label> 4) Enter Description<span class="req">*</span></label></th> 
						<td>
						{{ Form::textarea('description') }} </td>
					</tr>
					
					<tr>
						<th class="text-nowrap " scope="row"> <label> 5) Send notifications<span class="req">*</span></label></th> 
						<td><button type="submit" class="btn btn-default">Submit</button></td>
					</tr>
        		{{ Form::close() }}
        	</tbody>
        	</table>
			<div class="panel__block"></div>
			</div>
	</article>
</section>



<section class="panel b-yellow" id="2">
	<article class="panel__wrapper">
		<div class="panel__content">
			<h1 class="panel__headline">
				<i class="fa fa-bolt"></i>&nbsp;Create Your Group
			</h1>
			 
			<table class="table">
        	<tbody>
        		{{ Form::open(array('url' => 'create_group','method' => 'post','name'=>"myForm","id"=>"myForm")) }}
					<tr>
						<th class="text-nowrap " scope="row"><label> 1) Group Name<span class="req">*</span></label> </th> 
						<td>{{	 Form::text('group_name',null,array('required')) }}</td> 
					</tr>
					
					<tr>
						<th class="text-nowrap " scope="row"> <label> 2) Enter comma separated Emails<span class="req">*</span></label></th> 
						<td>
						{{ Form::textarea('emails',null,array('required')) }} </td>
					</tr>
					
					<tr>
						<th class="text-nowrap " scope="row"> <label> 3) Submit<span class="req">*</span></label></th> 
						<td><button type="submit" class="btn btn-default">Create</button></td>
					</tr>
        		{{ Form::close() }}
        	</tbody>
        	</table>
			<div class="panel__block"></div>
			
			{{ Form::open(array('url'=>'delete_group','method'=>'post')) }}
    			<table class="table">
                	<tbody>
            					
            					@foreach($groups as $item)
                                   <tr><td>{{ $item }}</td></tr> 
                                @endforeach
            				
            				
        			</tbody>
				</table>
			{{ Form::close() }}
					
    				
              
			</p>
		</div>
	</article>



</section>







<section class="panel b-red" id="3">
	<article class="panel__wrapper">
		<div class="panel__content">
			<h1 class="panel__headline">
				<i class="fa fa-music"></i>&nbsp;Music
			</h1>
			<div class="panel__block"></div>
			<p>Beard sriracha kitsch literally, taxidermy normcore aesthetic
				wayfarers salvia keffiyeh farm-to-table sartorial gluten-free
				mlkshk. Selvage normcore 3 wolf moon, umami Kickstarter artisan
				meggings cardigan drinking vinegar bicycle rights.</p>
		</div>
	</article>
</section>
<section class="panel b-green" id="4">
	<article class="panel__wrapper">
		<div class="panel__content">
			<h1 class="panel__headline">
				<i class="fa fa-paper-plane"></i>&nbsp;Paper Planes
			</h1>
			<div class="panel__block"></div>
			<p>90's wayfarers lomo you probably haven't heard of them trust fund
				banh mi. Flannel Shoreditch dreamcatcher, quinoa flexitarian Banksy
				pickled post-ironic lo-fi. Photo booth asymmetrical tousled
				letterpress.</p>
		</div>
	</article>
</section>


@endsection


