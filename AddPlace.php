<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href='https://css.gg/user.css' rel='stylesheet'>
      <link href='https://css.gg/close.css' rel='stylesheet'>
      <link href='https://css.gg/menu.css' rel='stylesheet'>
      <link href='https://css.gg/search.css' rel='stylesheet'>
      <link href='https://css.gg/log-off.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>RUH-tainment </title>
  <!-- Fonts from google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="Location.js" defer> </script>
</head>

<body>
  <section class="header">
    <nav>
        <a href="Homepage.php"> <img src="images/logo.png"> </a>
        <div class="nav-links" id="navLinks">
            <i class="gg-close fa"  onclick="hideBurger()"></i>
            <ul>
                <li> <a href="Admin-Homepage.php"> HOME </a></li>
                <li> <a href="Admin-Page.php"> PLACES <br></a></li>
                <li style="position:absolute;"> <a href="Logout.php" > <i class="gg-log-off"></i></a> </li> 
            </ul>
        </div>
        <i class="gg-menu fa" id="gg-menu" onclick="showBurger()"></i>
    </nav>

</section>

  <div class="add-new-Place-form"  style="padding-bottom: 2px;">
    <h1 style="text-align:center;  margin-top:2%; color:#f6faf3;font-size: 40px;">Add Place</h1>

    <form action="Insert-Place.php" enctype="multipart/form-data" method="POST">
    
      <div class="AllInput">
        <div class="Pname">
          <label for="Pname">Place Name :</label><br>
          <input type="text" name ="input" id="input" placeholder=" Enter place name" style="color: #0F222D;" required>
        </div><br>
        <br>
        <br>
        <div class="desc">
          <label for="description" style="margin-left:.1%;">Description :</label>
          <textarea name="description" class="descriptionBox" style="color:black" type="text" id="description" 
            placeholder="Description" required></textarea>
        </div>
        <div class="Pname">
          <label for="Pname">Mark As Featured :  </label> 
          <input type="checkbox" name ="feature" id="feature" value="true">
        </div>
        <br>
        <div class="select">
          <label for="AgeCategory">Age category :</label>
          <select id="AgeCategory" name="AgeCategory" style="color:black">
            <option value="Family" style="color:black">Family</option>
            <option value="Children" style="color:black">Children</option>
            <option value="Adult" style="color:black">Adult</option>
          </select>
        </div>
        <div class="Addphoto">
         <br> <label for="Addphoto">Add Photo :</label><br>
          <input type="file" name="fileUpload1" id="fileUpload1" placeholder="photo 1"  required>
        </div>

        <br>
        <label for="locationTextField">Location :</label><br>
        <div class="pac-card" id="pac-card">
          <div>
            <div id="pac-container">
              <input id="pac-input" name="pac-input" type="text" placeholder="Enter a location" required />
            </div>
          </div>
          <div id="map"></div>
          <div id="infowindow-content">
            <span id="place-name" class="title"></span><br />
            <span id="place-address"></span>
          </div>
        </div>
        <br>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <script>
          
          
          // parameter when you first load the API. For example:
          function initMap()
          {
            const map = new google.maps.Map( document.getElementById( "map" ), {
              center: { },
              zoom: 13,
              mapTypeControl: false,
            } );
            const card = document.getElementById( "pac-card" );
            const input = document.getElementById( "pac-input" );
            const biasInputElement = document.getElementById( "use-location-bias" );
            const strictBoundsInputElement = document.getElementById( "use-strict-bounds" );
            const options = {
              types: ['address' ],
              componentRestrictions: { 
                country: "sa"
              }
            };

            map.controls[ google.maps.ControlPosition.TOP_LEFT ].push( card );

            const autocomplete = new google.maps.places.Autocomplete( input, options );

            // Bind the map's bounds (viewport) property to the autocomplete object,
            // so that the autocomplete requests use the current map bounds for the
            // bounds option in the request.
            autocomplete.bindTo( "bounds", map );

            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById( "infowindow-content" );

            infowindow.setContent( infowindowContent );

            const marker = new google.maps.Marker( {
              map,
              anchorPoint: new google.maps.Point( 0, -29 ),
            } );

            autocomplete.addListener( "place_changed", () =>
            {
              infowindow.close();
              marker.setVisible( false );

              const place = autocomplete.getPlace();

              if ( !place.geometry || !place.geometry.location )
              {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert( "No details available for input: '" + place.name + "'" );
                return;
              }

              // If the place has a geometry, then present it on a map.
              if ( place.geometry.viewport )
              {
                map.fitBounds( place.geometry.viewport );
              } else
              {
                map.setCenter( place.geometry.location );
                map.setZoom( 17 );
              }

              marker.setPosition( place.geometry.location );
              marker.setVisible( true );
              infowindowContent.children[ "place-name" ].textContent = place.name;
              infowindowContent.children[ "place-address" ].textContent =
                place.formatted_address;
              infowindow.open( map, marker );
            } );

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener( id, types )
            {
              const radioButton = document.getElementById( id );

              radioButton.addEventListener( "click", () =>
              {
                autocomplete.setTypes( types );
                input.value = "";
              } );
            }

            setupClickListener( "changetype-all", [] );
            setupClickListener( "changetype-cities", [ "(cities)" ] );
            biasInputElement.addEventListener( "change", () =>
            {
              if ( biasInputElement.checked )
              {
                autocomplete.bindTo( "bounds", map );
              } else
              {
                // User wants to turn off location bias, so three things need to happen:
                // 1. Unbind from map
                // 2. Reset the bounds to whole world
                // 3. Uncheck the strict bounds checkbox UI (which also disables strict bounds)
                
                strictBoundsInputElement.checked = biasInputElement.checked;
              }

              input.value = "";
            } );
            strictBoundsInputElement.addEventListener( "change", () =>
            {
              autocomplete.setOptions( {
                strictBounds: strictBoundsInputElement.checked,
              } );
              if ( strictBoundsInputElement.checked )
              {
                biasInputElement.checked = strictBoundsInputElement.checked;
                autocomplete.bindTo( "bounds", map );
              }

              input.value = "";
            } );
          }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLTviqWwNO7oo4kux3L88Egt8BMYbwMtw&callback=initMap&libraries=places"
          async></script>
       

        <br>
        <button id="btn-place" style=" margin-left:350px; font-size:18px;" type="submit"
          class="btn btn-primary">submit</button>
      </div>

    </form>
  </div>
  <footer class="stickyfooter" style="margin-top: 100px;">  Copyright 2022 - RUH-tainment ALL Rights Reserved </footer>
  <script>

    var navLinks = document.getElementById( "navLinks" );

    function search() {
                 url = 'Admin-Page.php?sort='+document.getElementById("srch").value;
                 window.open(url);
            }

    function hideBurger()
    {
      navLinks.style.right = "-300px";
      // document.getElementById( "gg-menu" ).style.display = "block";
    }
    function showBurger()
    {
      navLinks.style.right = "0";
      // document.getElementById( "gg-menu" ).style.display = "none";

    }
      // $('.full-height').css('height', $(window).height());
      // Comma, not colon ----^

  </script>

</body>

</html>
