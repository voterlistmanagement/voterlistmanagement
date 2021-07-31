@php
	$counter = 0;
	$sectionprinted = 0;
	if($is_suppliment == 1){
		$h_caption = 'परिवर्धन ';
	}else{
		$h_caption = '';
	}
@endphp
<table id="headertable" style="border: 0px text-align: center;" width="100%">
	<tr>
		<td style="align-content: center; text-align: center;font-size: 14px; font-weight: bold;">
			Annexure-A
		</td>
	</tr>
	<tr>
		<td style="align-content: center; text-align: center; font-size: 14px; font-weight: bold;">
			मुख्य पृष्ठ
		</td>
	</tr>
</table>
		@foreach ($mainpagedetails as $mainpagedetail)
		<table id="detailtable" style="border: 1px solid black;" width="100%">
		<tbody>
		<tr>	
		<td style="height: 40px;">
			<table width="100%">
				<tr>
					<td style="border: 1px solid black;" >{{ $mainpagedetail->year }} में प्रकाशित {{ $mainpagedetail->election_type }} मतदाता सूचि सम्बन्धित विधानसभा क्षेत्र का नाम : {{ $mainpagedetail->assembly }}
					</td>
				</tr>
			</table>
		</td>
		</tr>
		
		<tr>
			<td>
				<table width="100%" >
					<tr>			
						@php
						if ($main_page_type==2) {
							$colspan='100%';	 
		 				}else{
		  					$colspan='40%';	
		 				}	
						@endphp
						<td style="height: 150px;word-spacing:4px;padding-left: 20px;border: 1px solid black; font-size: 14px; font-weight: bold;" width="{{ $colspan }}">जिला का नाम : {{ $mainpagedetail->district }}</td> 
        				@if ($main_page_type!=2) 
						<td style="height: 150px;word-spacing:4px;padding-left: 2px;border: 1px solid black;" width="60%">
							<table width="100%">
							<thead>
								@php
									$part_no='';
									$time=0;
									$counter=0;
								@endphp
								@foreach ($voterssrnodetails as $voterssrnodetail)
									@if ($part_no!=$voterssrnodetail->partno)
										@php
										$part_no=$voterssrnodetail->partno;
										$time=0;
										$counter++;
										$counter++; 
										@endphp
					     				<tr>
					     					<th colspan ="6">भाग संख्या  : {{ $part_no }}</th>
					     				</tr> 	
										<tr>
											<th width = "17%" style="text-align:center;">क्र०से</th>
											<th width = "17%" style="text-align:center;">क्र तक</th>
											<th width = "17%" style="text-align:center;">क्र०से</th>
											<th width = "17%" style="text-align:center;">क्र तक</th>
											<th width = "16%" style="text-align:center;">क्र०से</th>
											<th width = "16%" style="text-align:center;">क्र तक</th>
										</tr>
									@endif

									@if ($time==0)
									@php
									$counter++;
									@endphp
	       							<tr>
	       							@endif 
	         							<td style="text-align:center"> {!! $voterssrnodetail->fromsrno !!}</td>
	         							<td style="text-align:center"> {!! $voterssrnodetail->tosrno !!} </td>
	       							@if ($time ==2)
	         							</tr>
	       							@endif
	         						@php
	           							$time ++;
	         						@endphp
	         						@if ($time==3)
	          						@php
	            						$time=0;
	          						@endphp
	         						@endif

								@endforeach

								
							</thead>
							</table>
						</td>
						@endif
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width = "100%">
				<table width = "100%">
					<tr>
						<td style="border: 1px solid black;height: 120px;word-spacing: 4px" width="100%">
		 			@if ($main_page_type==1) 
						1. (क) ग्राम पंचायत का नाम व वार्ड संख्या : <b>{{ $mainpagedetail->village }} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $mainpagedetail->ward }}</b>
						<br>
						<br>
						(ख) खंड का नाम  : <b>{{ $mainpagedetail->block }}</b>
						<br>
						<br>
						(ग) पंचायत समिति का नाम व वार्ड संख्या : <b>{{ $mainpagedetail->block }} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  {{ $mainpagedetail->ps_ward }}</b> 
						<br> 
						<br> 
						(घ) जिला परिषद व वार्ड संख्या: <b>{{ $mainpagedetail->district }}&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;{{ $mainpagedetail->zp_ward }}</b>   
						 
		 			@elseif($main_page_type==2)
		 				{{ $mainpagedetail->election_type }} का नाम व वार्ड संख्या : <b>{{ $mainpagedetail->village }} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $mainpagedetail->ward }}</b>
						<br>
						<br>
		 			@else
		 				{{ $mainpagedetail->election_type }} का नाम व वार्ड संख्या : <b>{{ $mainpagedetail->village }} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $mainpagedetail->ward }}</b>
		 			@endif
		 			@if ($mainpagedetail->booth_id>0)
		 				<br>
		 				<br>
		 				मतदान केन्द्र संख्या व नाम: <b>{{ $mainpagedetail->booth_no }} - {{ $mainpagedetail->booth_name}}</b>
		 			@endif
		 				</td> 
					</tr>	
				</table>
			</td>
		</tr>
		<tr>
			<td width="100%">
				<table width = "100%">
					<tr>
						<td style="border: 1px solid black;" width="100%">2- पुनरीक्षण  का विवरण
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width = "100%">
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 120px;word-spacing: 4px" width="50%">	
							पुनरीक्षण का वर्ष : <b>{{ $mainpagedetail->year }}</b>
							<br><br>
							पुनरीक्षण की तिथि  : <b>{{ $mainpagedetail->date }}</b>
							<br><br>
							पुनरीक्षण का स्वरूप  : <b>{{ $mainpagedetail->list_type }}  {{ $mainpagedetail->year }}</b> 
							<br><br>
							प्रकाशन की तिथि : <b>{{ $mainpagedetail->publication_date }}</b>  
						</td>
						<td style="border: 1px solid black;height: 120px;word-spacing: 4px;padding-left: 5px;text-align: justify-all;" width="50%">
							नामावली  पहचान  : 
							<br>
							नये परिसमिति निर्वाचन क्षेत्रो के विस्तारानुसार सभी अनुपूरकों सहित एकीकृत व  वर्ष <b>{{ $mainpagedetail->year }}</b> की पुनरीक्षित मूल निर्वाचक नामावली 
						</td>
					</tr>			
				</table>
			</td>
		</tr>

		@if ($mainpagedetail->total>0)
		<tr>
			<td>
				<table width = "100%">
					<tr>
						<td style="border: 1px solid black;" width="100%"><b>{{ $h_caption }}मतदाताओं की संख्या</b></td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">आरंभिक क्रम संख्या </td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">अंतिम  क्रम संख्या </td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">पुरुष</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">महिला</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="17%">अन्य</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="15%">कुल</td>
					</tr>
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->from_sr_no }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->to_sr_no }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->male }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->female }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->transgender }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->total }}</td>
					</tr>
				</table>
			</td>
		</tr>
		@endif

		@if ($mainpagedetail->modified_total>0)
		<tr>
			<td>
				<table width = "100%">
					<tr>
						<td style="border: 1px solid black;" width="100%"><b>संशोधित मतदाताओं की संख्या</b></td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">पुरुष</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">महिला</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">अन्य</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">कुल</td>
					</tr>
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->modified_male }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->modified_female }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->modified_third }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->modified_total }}</td>
					</tr>
				</table>
			</td>
		</tr>				
		@endif

		@if ($mainpagedetail->deleted_total>0)
		<tr>
			<td>
				<table width = "100%">
					<tr>
						<td style="border: 1px solid black;" width="100%"><b>विलोपन मतदाताओं की संख्या</b></td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">पुरुष</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">महिला</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">अन्य</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px" width="25%">कुल</td>
					</tr>
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->deleted_male }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->deleted_female }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->deleted_third }}</td>
						<td style="border: 1px solid black;height: 40px;text-align:center;word-spacing: 4px">{{ $mainpagedetail->deleted_total }}</td>
					</tr>
				</table>
			</td>
		</tr>
						
		@endif


		</tbody>
		</table>
		

		

		@php
			if ($mainpagedetail->total>0){
				$sectionprinted = $sectionprinted + 1;
			}
			if ($mainpagedetail->modified_total>0){
				$sectionprinted = $sectionprinted + 1;
			}
			if ($mainpagedetail->deleted_total>0){
				$sectionprinted = $sectionprinted + 1;
			}
			$counter = 21-$counter;
			if ($counter>14){
				$counter=14;
			}
			$margintop = $counter*20 - ($sectionprinted-1)*100;
			// $margintop = 0;
		@endphp
		<table width="100%" style='margin-top:{{$margintop}}px;'>
			<tr>
				<td width="48%" style="text-align: left;font-size: 11px;word-spacing: 4px"><b>*</b> {{ $mainpagedetail->year }} को अंतिम प्रकाशित विधानसभा मतदाता सूचि का क्रo/भाग  नo आयु {{ $mainpagedetail->date }} के अनुसार संशोधित</td> 
				<td width="52%" align="right" style="text-align: right;font-size: 12px;word-spacing: 4px"> कुल {{$totalpage}} पृष्ठों का पृष्ठ 1</td>
					        
			</tr>
		</table>
		@endforeach

		

	
	@push('scripts')
	<script type="text/javascript">findtablesheight();</script>
	@endpush
	
	
	<pagebreak>	

	