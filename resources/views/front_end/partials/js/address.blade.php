@push('scripts')
<script>
    jQuery('.select2bs4').select2({
        theme: 'bootstrap4',
    });
    jQuery(document).ready(function(){
        var district ='';
        var province ='';
        var ward ='';
        jQuery('#province_id').change(function() {
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('locations.district') }}",
                type: 'POST',
                data: {'province_id': jQuery(this).val()},
                cache: false,
                success: function(data){
                    jQuery('#district_id').html(data);
                }
            });
             province = jQuery(this).find('option:selected').text();
            jQuery('.address').val(province);
        });

        jQuery('#district_id').change(function() {
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('locations.ward') }}",
                type: 'POST',
                data: {'district_id': jQuery(this).val()},
                cache: false,
                success: function(data){
                    jQuery('#ward_id').html(data);
                }
            });
            district = jQuery(this).find('option:selected').text();
            jQuery('.address').val(province +','+ district);
        });
        jQuery('#ward_id').change(function() {
            ward = jQuery(this).find('option:selected').text();
            jQuery('.address').val(ward +','+ district +','+province);
        });
    });
</script>
@endpush
