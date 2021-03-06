@extends('layouts.dashboard')
@section('pageTitle', 'Dashboard for Remote Mobile Monitoring') 
@section('content')
<link href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css" rel="stylesheet">
<div class="row bg-title">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<h4 class="page-title dashboard">Take Picture</h4> </div>
               <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 new_syn_btn">
                            @include('user.last_sync')
                        </div>
	</div>
      <input type="hidden" name="" id="log_value" value="{{ $id }}">
      <input type="hidden" name="" id="device_id" value="{{ $device_id }}">
	<!-- /.col-lg-12 -->
	<div class="row">


		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="white-box take-pic">
        
        <div class="inputBox" style="text-align:right;padding-bottom:10px;">
                <!-- <input type="number" value="1" max="180"> -->
<div class="button-down">
        <lable>Camera Type:</lable>
                <select name="camera_type" id="camera_type">
                    <option value="1">Front Camera</option>
                    <option value="0">Back Camera</option>
                </select>
    </div>
        <button data-remaining-time="0" class="btn btn-full" id="take_picture" >
            Take Picture
            </button>
        </div>
        

<div class="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Taking Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body" id="spinner">
        <span class="fa fa-spinner fa-spin fa-3x" id=""></span>
      </div>

              <div class="modal-body append">
            
          </div>

      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
<img src='{{ asset('Spinner-1s-200px-removebg-preview.png') }}' style="
    position: relative;\
    z-index: 9; bottom:77px;display: none;" id="loader" >

<div class="table-img-setting">
	
   			@php
    if(Auth::user()->roles->first()->name == "SuperAdmin"){
        // dd($request->all());
       $check_id = $user_id->user;
        // dd($check_id);
    }else{
      $check_id =  Auth::id();
    }
@endphp
        @if($user_id->user == $check_id)  		
				<div class="container">
    <table id="example" class="uk-table uk-table-striped photos-table" style="width:100%">
        <thead class="call-log-heading">
            <tr>
                <!-- <th>Images</th> -->
<!--                 <th>Latitude</th>
                <th>Longitude</th> -->
                <!-- <th width="100px">Action</th> -->
            </tr>
        </thead>
        <tbody class="call_log_table table-style">
        </tbody>
    </table>
     @include('user.no_data_found')
</div>
@else

    @include('user.device_check');
@endif

			</div>
			</div>
		</div>



@endsection

@section('scripts')
<script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js" defer></script>
<script type="text/javascript">
  $(function () {
	  var editIcon = function ( data, type, row ) {
        if ( type === 'display' ) {
            return ' <i class="fa fa-phone"/></i>' + data;
        }
        return data;
    };
	var otherIcon = function ( data, type, row ) {
        if ( type === 'display' ) {
            return ' <i class="fa fa-user"/></i>' + data;
        }
        return data;
    };
	var anotherIcon = function ( data, type, row ) {
        if ( type === 'display' ) {
            return ' <i class="fa fa-mobile"/></i>' + data ;
        }
        return data;
    };
	var clockIcon = function ( data, type, row ) {
        if ( type === 'display' ) {
            return ' <i class="fa fa-clock-o"/></i>' + data ;
        }
        return data;
    };
	var calenderIcon = function ( data, type, row ) {
        if ( type === 'display' ) {
            return ' <i class="fa fa-calendar-check-o"/></i>' + data ;
        }
        return data;
    };
    var id = $('#log_value').val();
    var table = $('#example').DataTable({

  'columnDefs': [
        { 'visible': false,'ordering': false, 'targets': [0] }
    ],
                 fnInitComplete : function() {
      if ($(this).find('tbody tr').length<=1) {
         $(this).parent().hide();
          $('#show_possibilities').show();

  } else {
    $(this).parent().show();
  }
   }, 
order: [ [0, 'desc'] ],

        serverSide: true,
        // ordering: false,
        searching: false,
        processing: true,
        pageLength : 25,
         // order: [ [0, 'desc'] ],
           info:false,
    // scrollY: 800,
       "paging": true,
        // scroller: {
            // loadingIndicator: true
        // },
      

        language: {
              processing: "<img src='{{ asset('Loader-1-A.gif') }}' style='\
    position: relative;\
    z-index: 9; bottom:77px' >",

        // search: "_INPUT_",
        // searchPlaceholder: "Search...",
        paginate: {
            next: '<span class="glyphicon glyphicon-menu-right"></span>',
            previous: '<span class="glyphicon glyphicon-menu-left"></span>'
            }
        },
        'createdRow': function( row, data, dataIndex ) {
        $(row).addClass( 'col-md-5th-1' );
          },

        ajax: {
           "url": "{{ url('take-picture-default/') }}"+'/'+id,
            "data": function ( d ) {
            d.device_id = $('#device_id').val();
            }
        },
        columns: [
           { data: 'date_time', name: 'date_time'},
           {
            data:'path', 
            name:"path",
            "render": function (data, type, row) 
                {
                    return '<a class="popup_class" href="{{url("storage/take_pictures/")}}/' +id+'/'+  data + '"><img src="{{url("storage/take_pictures/")}}/' +id+'/'+  data + '" style="width: 289px;height:140px;" /><p>'+row.date_time_f+'</p></a><div class="date-download"><a href="{{url("storage/take_pictures/")}}/'+id+'/'+ row.path+'" download><i class="fa fa-download" aria-hidden="true"></i></a></div>'; 
                }
        },
            // { data: 'path', name: 'path'},
            // {render: editIcon, data: 'type', name: 'type'},
            // {render: anotherIcon, data: 'number', name: 'number'},
            // {render: clockIcon, data: 'duration', name: 'duration'},
            
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ],rowGroup: {
            startRender: null,
            startRender: function ( rows, group ) {
                return '<i class="fa fa-calendar cldr-icon" aria-hidden="true"></i>' + group;
            },
            dataSrc: 'intro'
        },
    });
    
  });
</script>

    <script>
     $('.call_log_table').magnificPopup({
            delegate: 'a.popup_class',
            type: 'image',
            gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            }
        });

     // $(document).ready(function(){
          var id = $('#log_value').val();
        $('#take_picture').on('click', function(){
             
             var camera_type = $('#camera_type').val();
            // alert(camera_type);
             $('#spinner').show();
            $('#record_audio').prop({'disabled':'disabled'});
             $('.modal').modal('show');
            // $('#loader').show();
            $.ajax({
                url:"{{ url('run-command-to-take-picture') }}"+'/'+id,
                type:"post",
                data:{camera_type:camera_type},
                // async: false,
                success: function(data){
                  console.log(data);
                  $('#take_picture').prop({'disabled':false});
                  $('#spinner').hide();
                  $('.append').html('');

                  // console.log(data.data.device_state);

                  if(data.data.device_state == "Available"){
                     // alert("aa");
              
                    // console.log("asasa");
                    // console.log(data.data.path);

    $('.append').append('<a class="" href="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '"><img src="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '" style="width: 100%;height:100%;" /><p>'+ moment(data.data.date_time).format('h:mm:ss A')+'</p></a><div class="date-download"><a href="{{url("storage/take_pictures/")}}/'+id+'/'+ data.data.path+'" download><i class="fa fa-download" aria-hidden="true"></i></a></div>');

        var check_len = $('#example tbody').find(".dtrg-group").length;

                 if(check_len){


            $('#example tbody').find(".dtrg-group td").each(function(index, value) {
                 // console.log(this[index]);
                if(index == 0){
                        console.log($(value).text());

                        var current_data = $(value).text();
                        console.log(moment().format('MMM,DD Y'))
                        if(current_data == moment().format('MMM,DD Y')){
                            // alert("if");

                              $('#example tbody tr:nth-child(2)').before('<tr class="col-md-5th-1 even" role="row"><td><a class="" href="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '"><img src="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '" style="width: 100%;height:100%;" /><p>'+moment(data.data.date_time).format('h:mm:ss A')+'</p></a><div class="date-download"><a href="{{url("storage/take_pictures/")}}/'+id+'/'+ data.data.path+'" download><i class="fa fa-download" aria-hidden="true"></i></a></div></td></tr>');


                        }else{
                // alert("dfd");
                             $('#example tbody tr:nth-child(1)').before('<tr class="dtrg-group dtrg-start dtrg-level-0"><td colspan="1"><i class="fa fa-calendar abccc" aria-hidden="true"></i>&nbsp;&nbsp;'+moment().format('MMM,DD Y')+'</td><tr class="col-md-5th-1 even" role="row"><td><a class="" href="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '"><img src="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '" style="width: 100%;height:100%;" /><p>'+moment(data.data.date_time).format('h:mm:ss A')+'</p></a><div class="date-download"><a href="{{url("storage/take_pictures/")}}/'+id+'/'+ data.data.path+'" download><i class="fa fa-download" aria-hidden="true"></i></a></div></td></tr>');

                        }
                        // if(current_data == )
                    }
                });


                      
                 }else{
                    // alert("else");
                    $('#example tbody tr:nth-child(1)').before('<tr class="dtrg-group dtrg-start dtrg-level-0"><td colspan="1"><i class="fa fa-calendar abccc" aria-hidden="true"></i>&nbsp;&nbsp;'+moment().format('MMM,DD Y')+'</td><tr class="col-md-5th-1 even" role="row"><td><a class="" href="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '"><img src="{{url("storage/take_pictures/")}}/' +id+'/'+  data.data.path + '" style="width: 100%;height:100%;" /><p>'+moment(data.data.date_time).format('h:mm:ss A')+'</p></a><div class="date-download"><a href="{{url("storage/take_pictures/")}}/'+id+'/'+ data.data.path+'" download><i class="fa fa-download" aria-hidden="true"></i></a></div></td></tr>');
                 }



                 // $('.append').append('<a class="" href="{{url("storage/take_pictures/")}}/' + data.data.path + '"><img src="{{url("storage/take_pictures/")}}/' + data.data.path + '" style="width: 100%;height:100%;" /><p>'+ moment(data.data.date_time).format('h:mm:ss A')+'</p></a><div class="date-download"><a href="{{url("storage/take_pictures/")}}/'+data.data.path+'" download><i class="fa fa-download" aria-hidden="true"></i></a></div>');

                 //      $('#example tbody tr:nth-child(2)').before('<tr class="col-md-5th-1 even" role="row"><td><a class="" href="{{url("storage/take_pictures/")}}/' + data.data.path + '"><img src="{{url("storage/take_pictures/")}}/' + data.data.path + '" style="width: 100%;height:100%;" /><p>'+moment(data.data.date_time).format('h:mm:ss A')+'</p></a><div class="date-download"><a href="{{url("storage/take_pictures/")}}/'+data.data.path+'" download><i class="fa fa-download" aria-hidden="true"></i></a></div></td></tr>');
                }
                  else{
                    // alert("busy")
                            $('.append').append('<p>Currently Mobile Device is busy. </p>');
                      }
              }

            })
        })
     // })
     $('.close').click( function(){
         $('.append').html('');
     })

    </script>
    <script type="text/javascript">
    </script>

@endsection