<!DOCTYPE html>
<html>
    <head>
        {{-- <link rel='stylesheet' id='vamtam-gfonts-css'
        href='https://fonts.googleapis.com/css?family=Cabin%3Abold%2Cnormal%2C500%7CRubik%3A300italic%2C500%2Cbold%2C700i%7CMontserrat%3A600%2Cbold%7COpen+Sans%3Anormal%2Cbold&amp;subset=latin&amp;display=swap&amp;ver=1654812372'
        type='text/css' media='all' /> --}}
    </head>

<body>
    <style type="text/css">
    body{
        font-family: Montserrat;
        font-size:13px;
        padding: 5px;
    }
    h5{
        font-size: 14px;
    }
         td, th {
                border: 1px solid;
                padding:3px;
                }

.inner{
    border: none
}
.inner td, .inner th{
    border-top: none !important;
}
table {
    border: 1px solid;
  width: 100%;
  border-collapse: collapse;
  background-color: #d5dae5;
  height: auto;
}
    </style>

	<table style=" margin-bottom:60px;">
		<tr>
			<td style="text-align: center">
                <img width="200" src="{{ asset('logon.png') }}" class="logo"></td>
            <td style="text-align: center">
                <img width="200" src="{{ asset('barcode.png') }}" class="logo">
                <h5 style="letter-spacing: 11px; margin-top: -2px">{{ $info['order_num'] }}</h5>
                <p style="margin-top:-15px">Accounts Copy</p>
            </td>
			<td style="padding: 0px;" colspan="1">
				<table class="inner">
					<tr>
						<td> <h5>Pick Up Date:</h5>
                            {{ $info['pickup_date'] }}</td>
						<td><h5>Pick Up Time:</h5>
                            {{ $info['pickup_time'] }}</td>
                        <td><h5>Delivery Time</h5>
                            {{ $info['delivery_date'] }}</td>
					</tr>
					<tr>
						<td> <h5>Origin:</h5>
                            {{ $info['origin'] }}</td>
						<td><h5>Destination:</h5>
                            {{ $info['destination'] }}</td>
                        <td><h5>Courier Diplomat</h5>
                            {{ $info['courier_diplomat'] }}</td>
					</tr>
					<tr>
						<td> <h5>Carrier Diplomat:</h5>
                            {{ $info['carrier_diplomat'] }}</td>
						<td><h5>Carrier Ref No:</h5>
                            {{ $info['carrier_ref_no'] }}</td>
                        <td><h5>Departure Time</h5>
                            {{ $info['departure_time'] }}</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td> <h5>Shipper:</h5> </td>
						<td>{{ $info['shipper_name'] }}</td>
					</tr>
					
				</table>
			</td>
			<td> <h5>Consignee:</h5>  </td>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td>{{ $info['consignee_name'] }}</td>
						<td><h5>Status:
                            @if ($info['order_status'] === "not_collected")
                            Not Collected
                        @elseif ($info['order_status'] === "in_transit")
                            In Transit
                        @elseif ($info['order_status'] === "pending")
                            Pending
                        @elseif ($info['order_status'] === "delivered")
                            Delivered
                        @endif
                            </h5> 
                           
                            </td>
					</tr>
					
				</table>
			</td>
            
		</tr>
        <tr>
            <td style=" width:30%;" colspan="1">
                {{ $info['shipper_country'] }} <br>
                            {{ $info['shipper_num'] }}
				
			</td>
            <td style="width:30%;" colspan="1">
                {{ $info['consignee_country'] }}, {{ $info['destination'] }} <br>
                            {{ $info['consignee_num'] }}
				
			</td>
            <td rowspan="3" style="width: 30%;">
                <h5>
                    Comments: 
                    {{ $info['order_notes'] }}
                </h5>
                
            </td>
        </tr>
        <tr>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td><h5>Type of Shipment:</h5>
                            {{ $info['type_of_shipment'] }}</td>
						<td>
                            <h5>Packages:</h5>
                            {{ $info['packages'] }}
                        </td>
					</tr>
					
				</table>
			</td>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table>
					<tr>
						<td><h5>Product:</h5>
                            {{ $info['product'] }}</td>
						<td>
                            <h5>Weight:</h5>
                            {{ $info['weight'] }}kg
                        </td>
					</tr>
					
				</table>
			</td>
            
        </tr>
        <tr>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td><h5>Total Freight:</h5>
                            {{ $info['total_freight_amount'] }}</td>
						<td>
                            <h5>Quantity:</h5>
                            {{ $info['quantity'] }}
                        </td>
					</tr>
					
				</table>
			</td>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td><h5>Payment Mode:</h5>
                            {{ $info['payment_mode'] }}</td>
						<td>
                            <h5>Mode:</h5>
                            {{ $info['mode'] }}
                        </td>
					</tr>
					
				</table>
			</td>
            
        </tr>
	</table>


    <table style=" margin-bottom:60px;">
		<tr>
			<td style="text-align: center">
                <img width="200" src="{{ asset('logon.png') }}" class="logo"></td>
            <td style="text-align: center">
                <img width="200" src="{{ asset('barcode.png') }}" class="logo">
                <h5 style="letter-spacing: 11px; margin-top: -2px">{{ $info['order_num'] }}</h5>
                <p style="margin-top:-15px">Consignee Copy</p>
            </td>
			<td style="padding: 0px;" colspan="1">
				<table class="inner">
					<tr>
						<td> <h5>Pick Up Date:</h5>
                            {{ $info['pickup_date'] }}</td>
						<td><h5>Pick Up Time:</h5>
                            {{ $info['pickup_time'] }}</td>
                        <td><h5>Delivery Time</h5>
                            {{ $info['delivery_date'] }}</td>
					</tr>
					<tr>
						<td> <h5>Origin:</h5>
                            {{ $info['origin'] }}</td>
						<td><h5>Destination:</h5>
                            {{ $info['destination'] }}</td>
                        <td><h5>Courier Diplomat</h5>
                            {{ $info['courier_diplomat'] }}</td>
					</tr>
					<tr>
						<td> <h5>Carrier Diplomat:</h5>
                            {{ $info['carrier_diplomat'] }}</td>
						<td><h5>Carrier Ref No:</h5>
                            {{ $info['carrier_ref_no'] }}</td>
                        <td><h5>Departure Time</h5>
                            {{ $info['departure_time'] }}</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td> <h5>Shipper:</h5> </td>
						<td>{{ $info['shipper_name'] }}</td>
					</tr>
					
				</table>
			</td>
			<td> <h5>Consignee:</h5>  </td>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td>{{ $info['consignee_name'] }}</td>
						<td><h5>Status:
                            @if ($info['order_status'] === "not_collected")
                            Not Collected
                        @elseif ($info['order_status'] === "in_transit")
                            In Transit
                        @elseif ($info['order_status'] === "pending")
                            Pending
                        @elseif ($info['order_status'] === "delivered")
                            Delivered
                        @endif
                            </h5> 
                           
                            </td>
					</tr>
					
				</table>
			</td>
            
		</tr>
        <tr>
            <td style=" width:30%;" colspan="1">
                {{ $info['shipper_country'] }} <br>
                            {{ $info['shipper_num'] }}
				
			</td>
            <td style="width:30%;" colspan="1">
                {{ $info['consignee_country'] }}, {{ $info['destination'] }} <br>
                            {{ $info['consignee_num'] }}
				
			</td>
            <td rowspan="3" style="width: 30%;">
                <h5>
                    Comments: 
                    {{ $info['order_notes'] }}
                </h5>
                
            </td>
        </tr>
        <tr>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td><h5>Type of Shipment:</h5>
                            {{ $info['type_of_shipment'] }}</td>
						<td>
                            <h5>Packages:</h5>
                            {{ $info['packages'] }}
                        </td>
					</tr>
					
				</table>
			</td>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td><h5>Product:</h5>
                            {{ $info['product'] }}</td>
						<td>
                            <h5>Weight:</h5>
                            {{ $info['weight'] }}kg
                        </td>
					</tr>
					
				</table>
			</td>
            
        </tr>
        <tr>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td><h5>Total Freight:</h5>
                            {{ $info['total_freight_amount'] }}</td>
						<td>
                            <h5>Quantity:</h5>
                            {{ $info['quantity'] }}
                        </td>
					</tr>
					
				</table>
			</td>
            <td style="padding: 0px; width:30%;" colspan="1">
				<table class="inner">
					<tr>
						<td><h5>Payment Mode:</h5>
                            {{ $info['payment_mode'] }}</td>
						<td>
                            <h5>Mode:</h5>
                            {{ $info['mode'] }}
                        </td>
					</tr>
					
				</table>
			</td>
            
        </tr>
	</table>

    
</body>

</html>
