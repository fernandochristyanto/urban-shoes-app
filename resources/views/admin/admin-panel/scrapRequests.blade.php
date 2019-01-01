@extends('shared._adminLayout')
@section('title')
  Shoe Requests
@endsection

@section('content')
  <section id="section-control">
    <div>
      <select name="approval_status" id="ddl-approval-statuses" class="form-control">
        @foreach ($approval_statuses as $approval_status_key => $approval_status_value)
          <option value={{$approval_status_key}}>{{$approval_status_value}}</option>
        @endforeach
      </select>
    </div>
  </section>
  <div id="tbl-requests"></div>
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
      function addListenerToDdl(){
        $(document).on('change', '#ddl-approval-statuses', function(event){
          const selectedVal = $(this).val();

          fetchDatasFromBackend(selectedVal, false, 
            res => {
              $('#tbl-requests').html(res)
            },
            res => {
              console.error(res);
            }
          )
        })
      }

      function fetchDatasFromBackend(approvalStatusFromDdl, finalized, successCallback, errorCallback){
        const apiEndpoint = "{{route('_scraprequest.requeststable')}}";
        return $.ajax({
          url: `${apiEndpoint}?approval_status=${approvalStatusFromDdl}&finalized=${finalized}`,
          method: 'GET',
          success: res => {
            successCallback(res);
          },
          error: res => {
            errorCallback(res);
          }
        });
      }

      addListenerToDdl();
    })
  </script>
@endsection