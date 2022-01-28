@push('scripts')
    <script>
    function showPassword() {
            var x = document.getElementById("PasswordPup");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    jQuery(document).ready(function() {
            jQuery(document).on('submit', '.submit-sign-popup', function(e) {
                e.preventDefault();
                var formdata = new FormData(jQuery(this)[0])
                jQuery('#login_error').html('')
                jQuery.ajax({
                    url: "{{ route('fe.signin.popup') }}",
                    dataType: 'json',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(data) {
                        if (data == 1) {
                            location.reload();
                        } else {
                            jQuery('#login_error').html('Email hoặc mật khẩu không đúng !');
                        }
                    },
                    error: function(error) {
                        jQuery('#login_error').html('Tài khoản không tồn tại');
                    },
                });
            });
            jQuery('.login-switch').magnificPopup({
                type: 'ajax'
            });
            
        });        
    </script>
@endpush
