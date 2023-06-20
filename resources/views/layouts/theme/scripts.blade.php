<script src="{{ asset('assets') }}/js/loader.js"></script>
<script src="{{ asset('assets') }}/js/libs/jquery-3.1.1.min.js"></script>
<script src="{{ asset('bootstrap') }}/js/popper.min.js"></script>
<script src="{{ asset('bootstrap') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('plugins') }}/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets') }}/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('assets') }}/js/custom.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('plugins') }}/notification/snackbar/snackbar.min.js"></script>
<script src="{{ asset('plugins') }}/nicescroll/nicescroll.js"></script>
<script src="{{ asset('plugins') }}/currency/currency.js"></script>
<script src="https://kit.fontawesome.com/b3fb79f871.js" crossorigin="anonymous"></script>
<script src="{{ asset('js') }}/apexcharts.js"></script>
<script>
    function noty(msg, option = 1) {
        Snackbar.show({
            text: msg.toUpperCase(),
            actionText: 'CERRAR',
            actionTextColor: '#FFFFFF',
            backbroundColor: option == 1 ? '#3b3f5c' : '#e7515a',
            pos: 'bottom-right'
        });
    }
</script>
