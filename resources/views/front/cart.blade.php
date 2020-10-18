@extends('layouts.app')

@section('content')
@include('frontTemps.navbar')

<section class="accre_body" style="margin-top: 8%">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h4> You select the following Reservations: </h4>
                @include('includes.messages')
                <table class="table">
                    <tr class="thead-light">
                        <th>
                            #
                        </th>
                        <th>
                            Room Type
                        </th>
                        <th>
                            Room name
                        </th>
                        <th>
                            Start time
                        </th>
                        <th>
                            End time
                        </th>
                        <th>
                            Fees
                        </th>
                        <th>
                            
                        </th>
                    </tr>

					@php	$counter = 1; @endphp
					@foreach (Cart::content() as $item)
					<tr id="item{{$item->model->exam_id}}">
						<td>
							{{$counter}}
						</td>
						<td>
							{{$item->model->type}}
						</td>
						<td>
							{{$item->model->name}}
						</td>
						<td>
							{{$item->options->start_time}}
						</td>
						<td>
							{{$item->options->end_time}}
						</td>

						<td>
							{{$item->price}} EGP
						</td>
						<td>
							<form style="display:inline-block;" method='POST' action='{{route("cart.destroy", $item->rowId)}}' >
								@csrf
								@method('DELETE')
								<button style="background-color:#f4f4f4; border:none;color:#999" title="Delete" type="submit"class="cancel_icon"><i class="fa fa-times"></i></button>
							 </form>
						</td>
					</tr>
					@php	$counter++; @endphp
					@endforeach

                    
                </table>

                <p> <i class="fa fa-bell"></i> Please contact Work Space Service on the number
                    for complanes
                </p>
            </div>

            <div class="col-md-2">
                <div class="price">
					<table>
						<tr class="fees">
							@if ($newTotal > 0)
								<td colspan="2"><h4>  Total fees : <span>{{round($newTotal, 2)}} EGP</span></h4></td>
							@else
								<td colspan="2"><h4>  Total fees : <span>Free</span></h4></td>
							@endif
						</tr>
					</table>	
                </div>

                <div class="d-flex justify-content-between">
                    <form method='Get' action='{{route("paytabs")}}' >
                        <button type="submit"class="btn btn-primary reg-btn"> Confirm </button>
                     </form>
                    <a href="{{route('emptyCart')}}" class="btn btn-danger">Cancel</a>
                </div>


                <div class="mob">
                    Call center 
                    <p class="en_lang">(+966) 9200 25 830</p>
                </div>
                
            </div>

        </div>

        </div>
    </div>
    
</section>
@endsection