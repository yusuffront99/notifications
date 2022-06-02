@extends('layouts.main')
@section('content')

<section>
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="text-center">Account Login</h4>
                    </div>
                    <div class="card-body">
                        <form id="form-register" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                
                        <button type="submit" class="btn btn-dark btn-block" id="registerBtn">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('javascript')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#registerBtn').on('click', function(e){
                e.preventDefault();

                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();

                $.ajax({
                    type: "POST",
                    url: "register_store",
                    data: $('#form-register').serialize(),
                    success:function(data){
                        if(data.success){
                            console.log('true');
                        }else{
                            console.log(data);
                        }
                    }
                });
            });
        });
    </script>
@endpush
