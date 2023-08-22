@extends('layouts.app')

@section('title', 'Coverage')

@section('content')

    <div class="container-fluid">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }

        .leaflet-popup-content {
            margin: 5px;
        }

        .cardmap {
            width: 200px;
            display: flex;
            align-items: center;
        }
    </style>
    <div class="d-flex justify-content-between">
        <h6 class="mb-4"><a class="text-decoration-none" href="{{ route('home') }}">Home</a> / Map Coverage</h6>
        <div>
            <a href="coverage.php?filter=maps" class="text-decoration-none font-weight-bold text-info"><button type="button" class="btn btn-info btn-sm"><span><i class="fas fa-map"></i></span>&nbsp;&nbsp;MAPS</button></a>
            <a href="coverage.php?filter=satellite" class="text-decoration-none font-weight-bold text-success"><button type="button" class="btn btn-success btn-sm"><span><i class="fas fa-satellite-dish"></i></span>&nbsp;&nbsp;SATTELITE</button></a>
        </div>
    </div>

    <div class="card shadow h-100 py-1 mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4 col-md-4 m-auto">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div style="font-size:0.8rem;">
                                <i class="fas fa-users text-success"></i>&nbsp;&nbsp;Total Subscribers:
                                0                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="fas fa-box-open text-info"></i>&nbsp;&nbsp;Total NAP:
                                1                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 m-auto">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div style="font-size:0.8rem;">
                                <i class="fas fa-map-marked text-danger"></i>&nbsp;&nbsp;Pinned Subscribers:
                                0                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="fas fa-map-marked text-danger"></i>&nbsp;&nbsp;Pinned NAP:
                                1                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 m-auto">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div style="font-size:0.8rem;">
                                <i class="fas fa-map text-warning"></i>&nbsp;&nbsp;Unpinned Subscribers:
                                0                        </div>
                            <div style="font-size:0.8rem;">
                                <i class="fas fa-map text-warning"></i>&nbsp;&nbsp;Unpinned NAP:
                                0                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="map" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" style="position: relative;" tabindex="0"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6850/3758.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(460px, 251px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6850/3759.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(460px, 507px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6849/3758.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(204px, 251px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6851/3758.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(716px, 251px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6849/3759.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(204px, 507px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6851/3759.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(716px, 507px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6850/3757.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(460px, -5px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6850/3760.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(460px, 763px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6849/3757.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(204px, -5px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6851/3757.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(716px, -5px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6849/3760.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(204px, 763px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6851/3760.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(716px, 763px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6848/3758.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-52px, 251px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6852/3758.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(972px, 251px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6848/3759.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-52px, 507px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6852/3759.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(972px, 507px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6848/3757.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-52px, -5px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6852/3757.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(972px, -5px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6848/3760.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-52px, 763px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/13/6852/3760.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(972px, 763px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-shadow-pane"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"><img src="https://www.onlygfx.com/wp-content/uploads/2022/04/map-pointer-pin-icon-3.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -10px; margin-top: -12.5px; width: 20px; height: 25px; transform: translate3d(597px, 483px, 0px); z-index: 483;"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a></div></div></div></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

    <script>
        let mapOptions = {
            center: [
                14.651381538871705, 121.04883732079935    ],
            zoom: 13
        }

        let map = new L.map('map', mapOptions);
        let layer = new L.TileLayer('https://a.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);

        var myIcon = L.Icon.extend({
            options: {
                iconSize: [20, 25]
            }
        });

        var myNap = L.Icon.extend({
            options: {
                iconSize: [20, 25]
            }
        });

        var myPin = new myIcon({
            iconUrl: 'https://www.onlygfx.com/wp-content/uploads/2022/04/map-pointer-pin-icon-4.png',
        })

        var NAP = new myNap({
            iconUrl: 'https://www.onlygfx.com/wp-content/uploads/2022/04/map-pointer-pin-icon-3.png',
        })


        let locations = [
        ]

        let napLocations = [
            {
                "id": 21,
                "lat": 14.651381538871705,
                "long":  121.04883732079935,
                "src": "",
                "title": "NAP Name:&nbsp;<strong>Nap Name Sample</strong></br>NAP Number:&nbsp;<strong>1</strong></br>NAP Total Ports:&nbsp;<strong>8</strong></br>NAP Available Ports:&nbsp;<strong>8</strong></br>OLT Name:&nbsp;<strong>HSGQ</strong></br>PON Port:&nbsp;<strong>1</strong></br>Description:&nbsp;<strong>Sample Nap Description</strong>",
                "url": "oltNap.php?id=21"
            },]

        let popupOption = {
            "closeButton": false
        }

        locations.forEach(element => {
            new L.Marker([element.lat, element.long], {
                icon: myPin
            }).addTo(map).on("mouseover", event => {
                event.target.bindPopup('<div class="cardmap"><div>' + element.title +
                    '</div></div>', popupOption).openPopup();
            })
                .on("mouseout", event => {
                    event.target.closePopup();
                })
                .on("click", () => {
                    window.open(element.url, "_self");
                })
        });

        napLocations.forEach(element => {
            new L.Marker([element.lat, element.long], {
                icon: NAP
            }).addTo(map).on("mouseover", event => {
                event.target.bindPopup('<div class="cardmap"><div>' + element.title +
                    '</div></div>', popupOption).openPopup();
            })
                .on("mouseout", event => {
                    event.target.closePopup();
                })
                .on("click", () => {
                    window.open(element.url, "_self");
                })
        });

    </script>

</div>
@endsection
