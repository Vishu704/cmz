@extends('admin.common.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Blog</li>
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
                            <h3 class="card-title">Edit Blog</h3>
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
                          <form action="{{ url('update-blog/'.$blog_detail->id) }}" method="post">
                          {{ csrf_field() }}
                          <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Blog Title</label>
                                <input type="text" name="blog_title" value="{{ $blog_detail->blog_title }}" class="form-control" id="" placeholder="Enter page title">
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Blog Slug</label>
                                <input type="text" name="blog_slug" value="{{ $blog_detail->blog_slug }}" class="form-control" id="" placeholder="Enter page slug">
                              </div>
                            </div>
  
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Meta Keyword</label>
                                <input type="text" name="meta_keyword" value="{{ $blog_detail->meta_keyword }}" class="form-control" id="" placeholder="Enter page slug">
                              </div>
                            </div>
  
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $blog_detail->meta_title }}" class="form-control" id="" placeholder="Enter page slug">
                              </div>
                            </div>
  
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ $blog_detail->meta_description }}" class="form-control" id="" placeholder="Enter page slug">
                                {{-- <textarea id="summernote" name="meta_description" placeholder="Enter blog description">{{ $blog_detail->meta_description }}</textarea> --}}
                              </div>
                            </div>
  
                            <div class="col-md-6  doc_link">
                              <div class="form-group">
                                  <label for="doc_link">Image</label>
                                  <div class="row">
                              
                                      <div id="progress_bar" class="d-none progress" style="width: 100%;margin-bottom: 10px;">
                                          <div id="uploader" class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                              <span class="sr-only">0% Complete (success)</span>
                                          </div>
                                      </div>
  
                                      <input type="hidden" name="image" value="" class="doc_link" id="doc_link">
                                      <input id="photo" class="file form-control col-md-6" type="file" name="pimg" value="" onchange="getfile()">
                                      <img src="{{ $blog_detail->image }}" id="view_doc" class="col-md-3 {{ $blog_detail->image != '' ? '' : 'd-none' }} d-none view_doc">
                                  </div>
                              </div>
                          </div>
  
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Blog Description</label>
                                <textarea id="summernote" name="blog_description" placeholder="Enter blog description">{{ $blog_detail->blog_description }}</textarea>
                                {{-- <textarea class="form-control rounded-0" name="blog_description" id="" rows="3" placeholder="Enter page description">{{ $blog_detail->blog_description }}</textarea> --}}
                              </div>
                            </div>
  
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                  <option value="">--Select Status--</option>
                                  <option value="active" {{ ($blog_detail->status=='active') ? 'selected' : ''  }}>Active</option>
                                  <option value="suspended" {{ ($blog_detail->status=='suspended') ? 'selected' : ''  }}>Suspended</option>
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

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

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