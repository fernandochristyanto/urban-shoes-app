<table id="pendingItems">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Threshold</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($scrap_requests as $request)
        <tr class="dataRow">
            <td class="iID" style="display: none">{{$request->id}}</td>
            <td class="iFinalized" style="display: none">{{$request->finalized}}</td>
            <td class="iName">{{$request->name}}</td>
            <td class="iDesc">{{$request->description}}</td>
            <td class="iThres">{{$request->min_price_threshold}}</td>
            <td class="iAction">
                @if($request->approval_status == 'P')
                    <button class="btnOK wire btnApprove">Approve</button>
                    <button class="btnNO wire btnDecline">Decline</button>
                @elseif($request->approval_status == 'A')
                    <button class="btnNO wire btnAbort">Abort</button>
                @elseif($request->approval_status == 'F' && $request->finalized == 0)
                    <button class="btnSecondary wire btnReview">Review</button>
                @elseif($request->approval_status == 'F' && $request->finalized == 1)
                    <button class="btnView">View</button>
                @elseif($request->approval_status == 'D')

                @endif
            </td>
        </tr>
        @empty
        <tr class="dataRow">
            <td colspan="5">No requests</td>
        </tr>
        @endforelse
    </tbody>
</table>