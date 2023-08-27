<script>
    CKEDITOR.replace('content');
</script>
<script src="/temp/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/temp/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/temp/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/temp/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/temp/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/temp/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/temp/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/temp/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/temp/admin/plugins/moment/moment.min.js"></script>
<script src="/temp/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/temp/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/temp/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/temp/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/temp/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/temp/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/temp/admin/dist/js/pages/dashboard.js"></script>
<script type="text/javascript" src="/temp/build/js/main.min.js"></script>
<script type="text/javascript" src="/temp/build/js/admin.min.js"></script>
<script>
    $(document).ready(function () {
        $('body').on('click', '.form-submit-ajax', function(e){
            e.preventDefault();
            let formID = $(this).closest('form').attr('id');
            let href = $(this).data('href');
            let getUrl = $(this).data('url');
            let update = $(this).data('update');
            if(validateForm(`#${formID}`)) {
                var formData = new FormData($(`#${formID}`)[0]);
                console.log(formData);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                debugger;
                $.ajax({
                    type: 'POST',
                    url: href,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $(update).load(getUrl);
                    },
                });

            } else {
                $('html, body').animate({
                    scrollTop: $(".helper").offset().top - 200
                }, 500)
            }
        });

        $('body').on('click', '.contact-form-submit', function(e){
            e.preventDefault();
            let formID = $(this).closest('form').attr('id');
            let href = $(this).data('href');
            let loading = $(this).data('loading');
            let getThis = $(this);
            if(validateForm(`#${formID}`)) {
                $(loading).css({
                    'display':  'inline-block',
                    'cursor': 'wait'
                });
                $(this).css('display', 'none');
                var formData = new FormData($(`#${formID}`)[0]);
                console.log(formData);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                debugger;
                $.ajax({
                    type: 'POST',
                    url: href,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(getThis);
                        $(getThis).css('display',  'inline-block');
                        $(loading).css('display', 'none');
                        alert(response.message);
                    },
                });

            } else {
                $('html, body').animate({
                    scrollTop: $(".helper").offset().top - 200
                }, 500)
            }
        });
    });

    function validateForm(formID) {
        let checkValid = true
        $(formID).find('.input-field').each(function(){
            let value = $(this).val()
            console.log(this)
            if(value == null || value == '' || value == undefined) {
                checkValid = false
                $(this).parent().find('.helper').remove()
                $(this).css({'border-color': "red"})
                let htmlAlert = `<span class="helper" style="color:#4b845e; position: absolute; top: -22px; left: 0">${$(this).data('require')}</span>`
                $(this).parent().append(htmlAlert)
            }
        })
        return checkValid
    }

</script>
