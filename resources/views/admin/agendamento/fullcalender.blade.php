@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <style type="text/css">
    .fc-event{
      cursor: pointer;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> -->
  <link href="{{ asset('template/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.0/lang-all.js"></script> -->
@endsection

@section('page-caminho')
@endsection

@section('page-title')
Agendamentos
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="title"></p>
        <p class="description"></p>
        <p class="celular"></p>

      </div>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="card-box">

    {!! $calendar->calendar() !!}

  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="{{ asset('template/plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.0/lang-all.js"></script>
{!! $calendar->script() !!}

<script>
  eventRender: function(event, element) {
    element.qtip({
      content: event.description
    });
  }

</script>

@endsection
