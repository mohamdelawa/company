@extends('layout.app')
@section('title')
    <title></title>
@stop

@section('page padding')

    <div class="row">
        <img src="index/assets/img/team.jpg" height="550px" width="100%">
    </div>
     <section>
    <div  class="container">
        <br />
        <div style="text-align: center" id="about" ><h1 ><b>About</b></h1></div>
        <br />

        <div class="row justify-content-center" style="word-wrap: break-word">
            <div class="col-md-8">
              <h4>
                    We are a company working in the field of programming websites and
                    smart phone applications that work on the Android and IOS system,
                    and we work in the field of design and montage

              </h4>
            </div>
        </div>
        <br />
    </div>
    <div  style="background-color: #eceff1; margin-top: 40px;">
        <br/>
        <br/>
        <div style="text-align: center; " id="Services" ><h1><b>Services</b></h1></div>
        <br />

        <div class="row justify-content-center">
            <div class="card col-md-3 mr-5 " style="margin-top: 20px;">
                <div >
                <img src="index/assets/img/web1.webp" class="card-img"
                     width="200px" height="300px"
                     alt="website" style="padding-top: 20px;">
                </div>
                <div class="card-body justify-content-center">
                    <h3 class="card-title" style="margin-left: 36%"><b>Web Site</b></h3>
                </div>
                <button class="btn btn-primary  " style="margin: auto; width: 90%; margin-bottom: 20px">More</button>

            </div>
            <div class="card col-md-3 mr-5 " style="margin-top: 20px;">
                <div  >
                <img src="index/assets/img/smartphone.webp" class="card-img " alt="smartphone"
                     width="200px" height="300px"
                     style="padding-top: 20px;">
                </div>
                <div class="card-body justify-content-center">
                    <h3 class="card-title " style="margin-left: 25%" ><b>Android & ios</b></h3>
                </div>
                <button class="btn btn-primary  " style="margin: auto; width: 90%; margin-bottom: 20px">More</button>



            </div>
            <div class="card col-md-3 mr-5 " style="margin-top: 20px;">
                <div >
                <img src="index/assets/img/design.jpg" class="card-img" alt="..."
                     width="200px" height="300px"  style="padding-top: 20px;">
                </div>
                <div class="card-body justify-content-center">
                    <h3 class="card-title" style="margin-left: 10%"><b>Montage and Design</b></h3>
                </div>
                <button class="btn btn-primary  " style="margin: auto; width: 90%; margin-bottom: 20px">More</button>

            </div>
        </div>
        <br />
    </div>
    <div class="container" style=" margin-top: 40px;">
        <br />
       <div style="text-align: center" id="contact" ><h1 ><b>Contact </b></h1></div>
        <br />
        <div class="row">
            <div class="col-md-7">
                <div class="map">
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2644.197062254244!2d34.448072314339136!3d31.508222554896022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDMwJzI5LjYiTiAzNMKwMjcnMDAuOSJF!5e1!3m2!1sen!2s!4v1600471937637!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                </div>
            </div>
            <br />
            <div class="col-md-5">
                @include('massege')
                <form class="my-form" method="get" action="{{route('contact')}}">
                    <div class="form-group">
                        <label for="form-name font-18"><b>Name</b></label>
                        <input type="فثءف" class="form-control" id="form-name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="form-email font-18"><b>Email Address</b></label>
                        <input type="email" class="form-control" id="form-email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="form-subject font-18"><b>Phone</b></label>
                        <input type="text" class="form-control" id="form-subject" name="phone" placeholder="Phone" required >
                    </div>
                    <div class="form-group">
                        <label for="form-message  font-18"><b>Email your Message</b></label>
                        <textarea class="form-control" id="form-message" name="message" placeholder="Message" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit"><b>Send</b></button>
                    @csrf
                </form>
            </div>
        </div>
        <br />
        </div>
     </section>
@stop
