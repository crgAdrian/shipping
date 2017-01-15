<html>
@include('backend.partials._head')
<body class="hold-transition login-page">
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <b style="font-size: 25px;">Verify estimated delivery time</b>
    </div>
    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">

        <form action="{{ route('tracking.search') }}" method="post" id="tracking" class="lockscreen-credentials">
            {{ csrf_field() }}
            <div class="input-group">
                <label for="tracking-code"></label>
                <input type="text" name="tracking_code" id="tracking-code" class="form-control" placeholder="Tracking Code" required>

                <div class="input-group-btn">
                    <button type="submit" id="submitForm" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.lockscreen-item -->
    <div id="tracking-list" class="help-block text-center">
        Enter your tracking code to display delivery details.
    </div>
</div>

@include('backend.partials._javascript')
    <script>


            $("form#tracking").submit(function(e) {
                $('#tracking-list').html('');
                var tracking_code = $('#tracking-code').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('tracking.search') }}",
                    dataType: "JSON",
                    data: {tracking_code:tracking_code}, // serializes the form's elements.
                    success: function(data)
                    {
                        if (data.tracking_product ){
                            $('#tracking-list').append("<span>The product <strong>"+ data.tracking_product.product +"</strong>, will be delivered on <strong>" + data.tracking_product.date + "</strong></span>")
                        } else {
                            $('#tracking-list').append("<span style='color:red'>Your tracking code is invalid!</span>");
                        }
                    }
                });

                e.preventDefault(); // avoid to execute the actual submit of the form.
            });




    </script>

</body>
</html>