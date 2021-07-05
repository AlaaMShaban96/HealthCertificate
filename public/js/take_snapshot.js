
    Webcam.set({

        width: 320,

        height: 240,

        image_format: 'jpeg',

        jpeg_quality: 90

    });

  function openCamera() {

    document.getElementById('closeCamera').style.visibility ='visible';
    document.getElementById('my_camera').innerHTML ='';
    document.getElementById('take_snapshot').style.display ='inline';
    document.getElementById('open_camera').style.display ='none';
    document.getElementById('zmdi-camera').style.display ='none';
    // document.getElementById("take_snapshot").onclick=take_snapshot();
    Webcam.attach( '#my_camera' );
  }
function closeCamera() {

    Webcam.reset();
    document.getElementById('open_camera').style.display ='inline';
    //    document.getElementById('zmdi-camera').style.display ='inline';
    document.getElementById('take_snapshot').style.display ='none';
    document.getElementById('closeCamera').style.visibility ='hidden';
    document.getElementById('my_camera').innerHTML ='';
    document.getElementById('my_camera').innerHTML = '<img src="images/avartar.png" alt="">';  
}

  

    function take_snap() {
 
        Webcam.snap( function(data_uri) {
            document.getElementById('my_camera').innerHTML ='';
            document.getElementById('my_camera').innerHTML = '<img    src="'+data_uri+'"/>';
            document.getElementById('photo').value =data_uri;
            document.getElementById('open_camera').style.display ='inline';
            document.getElementById('take_snapshot').style.display ='none';
        } );

    }
    function dataURItoBlob(data) {
        var binStr = data.split('base64,')[1];
         len = binStr.length,
         arr = new Uint8Array(len);
      
        for (var i = 0; i < len; i++) {
          arr[i] = binStr.charCodeAt(i);
        }
        return new Blob(arr);
      }
      
   