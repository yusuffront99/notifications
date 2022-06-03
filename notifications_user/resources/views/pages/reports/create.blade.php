@extends('layouts.main')
@include('layouts.navbars.navbar')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-8">
            <form name="form-report" id="form-report" method="POST">
                <h2 class="text-center bg-dark p-2 text-white">Add New Reports</h2>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                </div>
            
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                    <label for="conditions">Conditions</label>
                    <select name="conditions" id="conditions" class="form-control">
                        <option value="">-- Chooise Conditions --</option>
                        <option value="normal">Normal</option>
                        <option value="abnormal">Abnormal</option>
                    </select>
                </div>
            
                <button type="submit" class="btn btn-dark btn-block" id="save_report">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#save_report').click(function(e){
                e.preventDefault();
                let title = $('#title').val();
                let notes = $('#notes').val();
                let conditions = $('#conditions').val();

                $.ajax({
                    url: "create_report",
                    type: "POST",
                    data: $('#form-report').serialize(),
                    success: function(data){
                        if(data.success){
                            alert('true');
                        }
                    }
                })
            });
        });
    </script>
@endpush