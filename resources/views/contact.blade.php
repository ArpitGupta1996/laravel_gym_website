@include('layouts.header')

<div class="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <div class="titlepage text_align_center">
            <h2>Get In Touch</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form id="request" class="main_form" method="post" enctype="multipart/form-data" action="{{ route('savecontact') }}">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="row">
              <div class="col-md-12">
                <input class="form_control" placeholder="Name" type="text" name="name"> 
              </div>
              <div class="col-md-12">
                <input class="form_control" placeholder="Email" type="email" name="email">                          
              </div>
              <div class="col-md-12">
                <input class="form_control" placeholder="Phone number" type="number" name="phone">                          
              </div>  
              <div class="col-md-12">
                <input class="form_cont" placeholder="Message" type="text" name="message">
              </div>
              <div class="col-md-12">
                <button class="send_btn">Send</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4 offset-md-1">
          <ul class="top_infomation">        
            <li><a href="javascript:void(0)"><i><img src="images/call.png" alt="#"/></i><p><span>Phone Number :</span> <br>+01 1234567890</p></a></li>
            <li><a href="javascript:void(0)"><i><img src="images/mail.png" alt="#"/></i><p><span>Email :</span> <br>demo@gmail.com</p></a></li>   
          </ul>
        </div>
      </div>
    </div>
  </div>

@include('layouts.footer')
