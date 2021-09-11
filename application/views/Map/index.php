<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Welcome to Google Map</title>
    <?php echo $map['js']; ?>
</head>

<body>
    <?php echo $map['html']; ?>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    document.querySelectorAll("[id^='gmimap']").onclick = function() {
        showStatus()
    };

    function showStatus() {
        swal("Success!", "Berhasil menambah data rincian!", "success");
    }
</script>