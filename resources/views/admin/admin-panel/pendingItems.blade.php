@extends('shared._adminLayout')
@section('title')
  View Pending Items
@endsection

@section('content')
<table id="pendingItems">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Threshold</th>
            <th>Item Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($scrap_requests as $request)
        <tr class="dataRow">
            <td class="iID" style="display: none'">{{$request->id}}</td>
            <td class="iName">{{$request->name}}</td>
            <td class="iDesc">{{$request->description}}</td>
            <td class="iThres">{{$request->min_price_threshold}}</td>
            <td class="iStatus">{{$request->approval_status_string}}</td>
            <td class="iAction">
                @if($request->approval_status == 'P')
                    <button class="btnOK wire">Approve</button>
                    <button class="btnNO wire">Decline</button>
                @elseif($request->approval_status == 'A')
                    <button class="btnNO wire">Abort</button>
                @elseif($request->approval_status == 'F' && $request->finalized == 0)
                    <button onclick="window.location='{{ route("admin.admin-panel.completedItems", ['id' => $request->id]) }}'" class="btnSecondary wire">Review</button>
                @elseif($request->approval_status == 'F' && $request->finalized == 1)
                    <button onclick="window.location='{{ route("admin.admin-panel.completedItems", ['id' => $request->id]) }}'">View</button>
                @elseif($request->approval_status == 'D')

                @endif
            </td>
        </tr>
        @empty
        <tr class="dataRow" colspan="5">
            No requests!
        </tr>
        @endforelse
    </tbody>
</table>
@endsection