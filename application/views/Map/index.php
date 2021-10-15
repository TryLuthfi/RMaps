<!-- <html lang="id">

<head>
    <meta charset="utf-8">
    <title>Welcome to Google Map</title>
    <?php echo $map['js']; ?>
</head>

<body>
    <?php echo $map['html']; ?>
</body> -->

<div id="map"></div>
<style>
    #map {
        height: 100%;
        width: 100%;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    function initAutocomplete() {
        $.ajax({
            url: "<?php echo base_url(); ?>Map/get_asu",
            dataType: 'text',
            type: "POST",
            success: function(result) {
                var abc = $.parseJSON(result);
                $.each(abc, function(index, object) {

                })
                console.log(abc.length)
                console.log(abc)

                console.log(parseFloat(abc[1]['lat_peta']))
                console.log(parseFloat(abc[1]['long_peta']))
                console.log(abc[1]['alamat_lokasi'])

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: new google.maps.LatLng(-8.025776, 112.622594)
                });

                navigator.geolocation.getCurrentPosition(function(position) {
                    console.log(position)
                    new google.maps.Marker({
                        position: {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        },
                        map: map,
                        icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                    })
                })

                for (var u = 0; u <= abc.length; u++) {
                    var marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(abc[u]['lat_peta']),
                            lng: parseFloat(abc[u]['long_peta'])
                        },
                        // position: new google.maps.LatLng(parseFloat(abc[u]['lat_peta']), parseFloat(abc[u]['long_peta'])),
                        map: map,
                        title: abc[u]['alamat_lokasi']
                    });

                    google.maps.event.addListener(map, 'click', function(event) {
                        placeMarker(event.latLng, event);

                    });

                    function placeMarker(location, event) {
                        var marker_click = new google.maps.Marker({
                            position: location,
                            map: map,
                            title: String(event.latLng.lat() + " || " + event.latLng.lng())
                        });
                    }

                    google.maps.event.addListener(marker, 'click', (function(marker, u) {
                        return function() {
                            /*Bootstrap Modal Pop Up Open Code*/
                            $(".modal-title").text("" + abc[u]['nama_lokasi']);
                            $(".alamat").text("" + abc[u]['alamat_lokasi']);
                            $(".no_hp").text("" + abc[u]['no_hp']);
                            if (abc[u]['nama_status'] === null) {
                                $(".status").text("Kosong");
                            } else {
                                $(".status").text("" + abc[u]['nama_status']);
                            }
                            $("#myModal").modal('show');
                        }
                    })(marker, u));
                }
            }
        })
    }
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td style="padding-right: 10px">Alamat Toko </td>
                        <td style="padding-right: 10px">:</td>
                        <td class="alamat"></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px">No HP </td>
                        <td style="padding-right: 10px">:</td>
                        <td class="no_hp"></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px">Status </td>
                        <td style="padding-right: 10px">:</td>
                        <td class="status"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3NCh3AK7mdJXpSMRZvsRr17Ne9ix2Hn0&libraries=
places&callback=initAutocomplete" async defer></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCx651xXA4TeK_0VMkTLbtPciMouSJiK6E&libraries=
places&callback=initAutocomplete" async defer></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>