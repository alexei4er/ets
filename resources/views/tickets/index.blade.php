@extends('ets_views::layouts.bootstrap')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('fail_message'))
<div class="alert alert-danger" role="alert">
    {{ session('fail_message') }}
</div>
@endif

<div class="row mt-5">
    @foreach ($event->tickets as $ticket)
    <div class="col-sm">
        <div class="h5">{{ $ticket->title }}</div>
        <div class="h4">{{ $ticket->price }}</div>
        <div class="mb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{$ticket->id}}">
                Купить
            </button>
        </div>
        <small class="pb-3">{{ $ticket->description }}</small>
    </div>
    @endforeach
</div>

@endsection

@section('in_body')

@foreach ($event->tickets as $ticket)
<div id="modal-{{$ticket->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-{{$ticket->id}}-Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @include('ets_views::tickets.ticket-form')
        </div>
    </div>
</div>
<script>
    $("input[name='customer_type']").on("change", function() {
        var form = $(this).closest('form');
        if (form.find("input[name='customer_type']:checked").val() == 'organization') {
            form.find(".for_organization").show().find("input").attr("required", "required");
        } else {
            form.find(".for_organization").hide().find("input").removeAttr("required");
        }
    });

    $(".event-ticket-search-form").on("submit", function() {
        $(this).find('[data-dismiss="modal"]').click();
    });

    $("input[value='person']").click();
</script>
@endforeach

@endsection
