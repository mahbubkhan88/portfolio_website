@extends('backend.layouts.master')

@section('title', 'Visitor')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Sl No</th>
                        <th class="th-sm">IP Address</th>
                        <th class="th-sm">Date & Time</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($visitorData as $data)
                    <tr>
                        <th class="th-sm">{{ $data->id }}</th>
                        <th class="th-sm">{{ $data->ip_address }}</th>
                        <th class="th-sm">{{ Carbon\Carbon::parse($data->visit_time)->format('d M, Y') }} & {{ Carbon\Carbon::parse($data->visit_time)->format('H:i:s') }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection