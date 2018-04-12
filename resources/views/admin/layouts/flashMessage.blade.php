@if(Session::has('flash_message'))


    <script>

        swal({
         type: 'success',
         title: '{{Session::get('flash_message')}}',
         showConfirmButton: false,
         //timer: 3000
        }).then(
            function () {
                console.log("asdasdas")

            },
            // handling the promise rejection
            function (dismiss) {
                if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            }
        )
        $("textarea.swal2-textarea").remove()
    </script>
@endif