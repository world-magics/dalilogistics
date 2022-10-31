<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Datlan</span></strong>. All Rights Reserved
    </div>
</footer><!-- End Footer -->

@if (session()->has('message'))
    <script type="text/javascript">
        $(function () {
            NotificationMessage('{{ session()->get('message') }}')
        });
    </script>
@endif
<script type="text/javascript">
    function NotificationMessage(data) {
        var html = `<div aria-live="polite" aria-atomic="true" class="bg-dark position-initial bd-example-toasts" id="toast_message">
            <div class="toast-container position-absolute p-3 bottom-0 end-0" id="toastPlacement" data-original-class="toast-container position-absolute p-3">
                <div class="toast fade show">
                    <div class="toast-header">
                        <img src="https://intend.uz/wp-content/themes/itrust/favicon/apple-icon-57x57.png" class="rounded me-2" alt="..." style=" width: 20px; ">
                        <strong class="me-auto">Уведомление</strong>
                        <small class="text-muted">сейчас</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${data}
                    </div>
                </div>
            </div>
        </div>`;
        $('#notification').html(html);

        setTimeout(function () {
            $('#toast_message').fadeOut('fast');
            setTimeout(function () {
                $('#notification').html('');
            }, 2000); // <-- time in milliseconds
        }, 5000); // <-- time in milliseconds
    }
</script>
