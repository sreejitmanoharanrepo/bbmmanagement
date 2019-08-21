@extends('layouts.master')

@section('content')
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>    
<link rel="stylesheet" href="{{asset('css/datatableCutstom.css')}}"/>



<div class="card" id="container_div">
<div class="card-header" id="headername" style="font-weight:solid">
    Cases
</div>
<div class="card-body">

<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link active" href="#opened_cases">Open Cases</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#closed_cases">Closed Cases</a>
    </li>
  
  </ul>
  <div id="opened_cases">
<table id="example" class="hover" style="width:100%">
           <thead class="table_head">
         
                <th>Item</th>
                <th>Problem</th>
                <th>Trading Partner</th>
                <th>Status</th>
                <th>Start date</th>
                
      
            </thead>
        
        <tbody>
                @foreach($list_cases as $list_case)
                @if($list_case->DisputeState !="Closed")
                <tr>
                <td>{{$list_case->ItemID}}</td>
                <td>{{$list_case->DisputeReason}}</td>
                <td>{{$list_case->OtherPartyName}}</td>
                <td>{{$list_case->DisputeStatus}}</td>
                <td><?php $date_time= $list_case->DisputeCreatedTime;
            $date= explode("T",$date_time);
             echo $date[0];
             echo "  ";
             $date = $date[1];
             $d = explode(".", $date);
             echo $d[0] ?></td>
                </tr>
                @endif
                @endforeach
               
                
                
            
            </tbody>
        
    </table>
</div>


<div id="closed_cases">
<table id="example1" class="hover" style="width:100%">
           <thead class="table_head">
         
                <th>Item</th>
                <th>Problem</th>
                <th>Trading Partner</th>
                <th>Status</th>
                <th>Start date</th>
                
      
            </thead>
        
        <tbody>
                @foreach($list_cases as $list_case)
                @if($list_case->DisputeState =="Closed")
                <tr>
                <td>{{$list_case->ItemID}}</td>
                <td>{{$list_case->DisputeReason}}</td>
                <td>{{$list_case->OtherPartyName}}</td>
                <td>{{$list_case->DisputeStatus}}</td>
                <td><?php $date_time= $list_case->DisputeCreatedTime;
            $date= explode("T",$date_time);
             echo $date[0];
             echo "  ";
             $date = $date[1];
             $d = explode(".", $date);
             echo $d[0] ?></td>
                </tr>
                @endif
                @endforeach
               
                
                
            
            </tbody>
        
    </table>
</div>
</div>
</div>



@endsection

@section('javascript')
<script>
$(document).ready(function() {
   
    $('#example').DataTable();
});
</script>
@endsection

