@extends('admin.common.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Slide</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Slide</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
               
                    <!-- general form elements -->
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Edit Slide</h3>
                          </div>
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif


                          @if(session()->has('message'))
                              <div class="alert alert-success text-center">
                                  {{ session()->get('message') }}
                              </div>
                          @endif

                          @if(session()->has('error'))
                              <div class="alert alert-danger text-center">
                                  {{ session()->get('error') }}
                              </div>
                          @endif
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('updateslider/'.$slider_detail->id) }}" method="post">
                          {{ csrf_field() }}
                            <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="title">Slide Title</label>
                                <input type="text" name="title" value="{{ $slider_detail->title }}" class="form-control" id="title" placeholder="Enter Slide title">
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="slide_link">Slide Link</label>
                                <input type="text" name="slide_link" value="{{ $slider_detail->slide_link }}" class="form-control" id="slide_link" placeholder="Enter Slide link">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="type">Slide Type</label>
                                <select class="form-control" id="type" name="type">
                                  <option value="">--Select Slide type--</option>
                                  <option value="Main Slider" {{ ($slider_detail->type=='Main Slider') ? 'selected' : ''  }}>Main Slider</option>
                                  <option value="Brand Slider" {{ ($slider_detail->type=='Brand Slider') ? 'selected' : ''  }}>Brand Slider</option>
                                  <option value="Service Slider" {{ ($slider_detail->type=='Service Slider') ? 'selected' : ''  }}>Service Slider</option>
                                  <option value="Home Page About-us Image" {{ ($slider_detail->type=='Home Page About-us Image') ? 'selected' : ''  }}>Home Page About-us Image</option>
                                </select>
                              </div>
                            </div>


                            <div class="col-md-6  doc_link">
                                <div class="form-group">
                                    <label for="doc_link">Slide Image</label>
                                    <div class="row">
                                

                                        <div id="progress_bar" class="d-none progress" style="width: 100%;margin-bottom: 10px;">
                                            <div id="uploader" class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                <span class="sr-only">0% Complete (success)</span>
                                            </div>
                                        </div>



                                        <input type="hidden" name="image" value="" class="doc_link" id="doc_link">
                                        <input id="photo" class="file form-control col-md-6" type="file" name="pimg" value="" onchange="getfile()">
                                        <img src="{{ $slider_detail->image }}" id="view_doc" class="col-md-3 {{ $slider_detail->image != '' ? '' : 'd-none' }} view_doc">
                                    </div>
                                </div>
                            </div>


                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                  <option value="">--Select Status--</option>
                                  <option value="active" {{ ($slider_detail->status=='active') ? 'selected' : ''  }} >Active</option>
                                  <option value="suspended" {{ ($slider_detail->status=='suspended') ? 'selected' : ''  }} >Suspended</option>
                                </select>
                              </div>
                            </div>
                              
                          
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.card -->
               
           
        </div>
    </section>
</div>            


<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script type="text/javascript">


// Impot the functions you need from the SDKs you need

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
// Yor web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyD_W4Jq5UDPgLWmcFfttX1BpihrAKsfFEY",
  authDomain: "sliderimages-b9486.firebaseapp.com",
  projectId: "sliderimages-b9486",
  storageBucket: "sliderimages-b9486.appspot.com",
  messagingSenderId: "868957769848",
  appId: "1:868957769848:web:b388eb1865c87929931d8d",
  measurementId: "G-E5JCHG7C94"
};


// Initialize Firebase
firebase.initializeApp(firebaseConfig);



     var selectedFile;

function getfile(){

var pic = document.getElementById("photo");

 // selected file is that file which user chosen by html form
selectedFile = pic.files[0];
console.log(selectedFile);
 // make save button disabled for few seconds that has id='submit_link'
//document.getElementById('submit_link').setAttribute('disabled', 'true');
myfunction(); // call below written function
}

function myfunction()
    {
        // select unique name for everytime when image uploaded
        // Date.now() is function that give current timestamp
        var name="123"+Date.now();

        // make ref to your firebase storage and select images folder
        var storageRef = firebase.storage().ref('/sliderimages/'+ name);


        var progress_bar = document.getElementById('progress_bar');
            progress_bar.classList.remove("d-none");


        // put file to firebase 
        var uploadTask = storageRef.put(selectedFile);
    



        // all working for progress bar that in html
        // to indicate image uploading... report
        uploadTask.on('state_changed', function(snapshot){
          var progress = 
           (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            var uploader = document.getElementById('uploader');
            uploader.style.width=progress+'%';

            $('#Loader').show();

            switch (snapshot.state) {
              case firebase.storage.TaskState.PAUSED:
                console.log('Upload is paused');
                break;
              case firebase.storage.TaskState.RUNNING:
                console.log('Upload is running');
                break;
            }
        }, function(error) {console.log(error);
        }, function() {

             // get the uploaded image url back
             uploadTask.snapshot.ref.getDownloadURL().then(
              function(downloadURL) {

             // You get your url from here
              console.log('File available at', downloadURL);

            // print the image url 
             console.log(downloadURL);
            //document.getElementById('submit_link').removeAttribute('disabled'); 
            var view_doc = document.getElementById('view_doc');
            view_doc.classList.remove("d-none");
            view_doc.src = downloadURL;
            var doc_link = document.getElementById('doc_link');
            doc_link.value = downloadURL;
            progress_bar.classList.add("d-none");
            $('#Loader').hide();
          });
        });
    };
  </script>



@endsection