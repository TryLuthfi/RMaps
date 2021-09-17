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
    $(window).on('load', function() {
        $('#modal-lg-detail').modal('show');
    });

    document.querySelectorAll("[id^='gmimap']").onclick = function() {
        showStatus()
    };

    function showStatus() {
        swal("Success!", "Berhasil menambah data rincian!", "success");
    }
</script>

<!-- <div id="map"></div>
<style>x
    #map {
        height: 90%;
        width: 100%;
    }
</style>
<script>
    function initAutocomplete() {
        var myLatLng = {
            lat: 30.900965,
            lng: 75.857276
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, 'click', (function(marker) {
            return function() {
                $(".modal-title").text("This is google map..");
                $(".modal-body").text("Modal Body");
                $("#myModal").modal('show');
            }
        })(marker));
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCx651xXA4TeK_0VMkTLbtPciMouSJiK6E&libraries=
places&callback=initAutocomplete" async defer></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->