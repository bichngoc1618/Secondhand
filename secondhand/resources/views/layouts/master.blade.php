@yield('head')

<body>
  
    <header>

        <div class="navbar">     
            <div class="logo">
              <img src="{{asset('assets')}}/images/logo.png">
            </div>
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <ul class="links">
              <span class="close-btn material-symbols-rounded">close</span>
              <li><a href="{{route('User.home')}}">Home</a></li>
              <li><a href="{{route('User.product')}}">Product</a></li>
              <li><a href="{{route('User.contact')}}">Contact</a></li>
            </ul>
            
            <div class="nav-right" style="display: flex; align-items: center; gap: 1.5rem;">
              <div class="searchBox">
                <form action="{{ route('search') }}" method="POST" autocomplete="off" style="margin: 0;">
                  {{ csrf_field() }}
                  <input class="searchInput" type="text" name="query" id="searchInput" placeholder="Search">
                  <button class="searchButton" type="submit">
                      <i class="fa fa-search"></i>
                  </button>
                  <div id="search_ajax"></div>
              </form>
            </div>
            
            <div class="cart">
              <span id="cart-quantity">{{\App\Http\Controllers\User\CartControllerUs::countCart()}}</span>
              <a href="{{route('cart.index')}}" >
                  <i class="fas fa-shopping-cart fa-lg"></i>
              </a>
            </div>
        
            @if(auth()->check())
            <div style="display: flex; align-items: center; gap: 0.3rem; background: #e0f2f1; padding: 2px 10px 2px 4px; border-radius: 50px;">
               <img style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover; border: 2px solid white;" src="{{asset('assets')}}/images/{{Auth::user()->avatar}}" alt="avatar">
               <a href="{{route('Admin.information')}}" style="text-decoration: none; color: #0d5f41; font-weight: 700; font-size: 0.85rem; margin-right: 0.2rem; white-space: nowrap;">
                  {{Auth::user()->name}}
               </a>
            </div>
            <form class="login-btn" action="{{ route('logout') }}" method="GET" style="margin: 0;">
              @csrf
              <button style="background: #04AA6D; padding: 5px 12px; border-radius: 20px; border: none; font-size: 0.8rem; color: white; font-weight: bold; cursor: pointer; transition: 0.3s; white-space: nowrap;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'" type="submit" >Logout</button>
            </form>
            @else
            <a class="login-btn" href="{{ route('login')}}" style="text-decoration: none;">
                <button style="background: #04AA6D; padding: 5px 12px; border-radius: 20px; border: none; font-weight: bold; color: white; font-size: 0.8rem; cursor: pointer; transition: 0.3s; white-space: nowrap;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'" type="submit">Login</button>
            </a>
            @endif
          </div>
         
      </header>

      <div class="blur-bg-overlay"></div>
           <div class="form-popup">
               <span class="close-btn material-symbols-rounded">close</span>
             
           </div>

           <!--login-->
         
      
      
@yield('container')
@include('sweetalert::alert')


  <footer class="row text-center" style="background-color:#04AA6D99; padding: 1rem;">
 
  <div class="col-md-4">
    <img src="{{asset('assets')}}/images/logo.png" width= "8%">
    <span style="font-size: 2.5rem; font-weight: bolder;">ReEarth</span>
    <br>
    <span style="padding: 2,4rem; text-align: center;">When you buy recycled products you're not just purchasing a product-you're buying a sustainable future</span>
  </div>
  <div style="padding-left: 6.5rem;margin-right: 5rem;" class="col-md-4">
    <ul class="fa-ul text-dark">
      <li class="mb-4">
        <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-1">New York, NY 10012, US</span>
      </li>
      <li class="mb-4">
        <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">info@example.com</span>
      </li>
      <li class="mb-4">
        <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 01 234 567 88</span>
      </li>
     
    </ul>
  </div>
  <div class="col-md-3">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

   
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  
  <!-- Copyright -->
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
</body>

<script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="{{asset('assets')}}/js/appjs.js"></script>
<script src="{{ asset('assets/js/navbar.js')}}"></script>
<script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/js/cart.js"></script>
<script src="{{asset('assets')}}/js/progess_bar.js"></script>
<script src="{{asset('assets')}}/js/filtetprd.js"></script>
<script src="{{asset('assets')}}/js/quality.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  const navbarMenu = document.querySelector(".navbar .links");
const hamburgerBtn = document.querySelector(".hamburger-btn");
const hideMenuBtn = navbarMenu.querySelector(".close-btn");
const showPopupBtn = document.querySelector(".login-btn");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = formPopup.querySelector(".close-btn");
const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

// Show mobile menu
hamburgerBtn.addEventListener("click", () => {
    navbarMenu.classList.toggle("show-menu");
});

// Hide mobile menu
hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());



</script>
<script>
  function checkform() {
    var user = document.getElementById('name');
    var pass = document.getElementById('password');
    var pass2 = document.getElementById('pass2');

    if (user.value == "") {
      alert("Enter your name");
      user.focus();
      return false;
    }

    if (pass.value == "") {
      alert("Enter your password");
      pass.focus();
      return false;
    }

    if (pass.value.length < 8) {
      alert("Password must be at least 8 characters");
      pass.focus();
      return false;
    }

    if (pass.value != pass2.value) {
      alert("Passwords do not match");
      pass2.focus();
      return false;
    }

    return true;
  }
</script>

<!-- Thêm JavaScript cho drop-down menu -->
<script>
    $(document).ready(function(){
        $('.dropdown-link').click(function(){
            $('.dropdown-menu').toggleClass('show-menu');
        });
        $('.close-btn').click(function(){
            $('.dropdown-menu').removeClass('show-menu');
        });
    });
</script>
<script type="text/javascript">

  $('.confirm-button').click(function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      swal({
          title: `Are you sure you want to delete?`,
          text: "It will gone forevert",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
          .then((willDelete) => {
              if (willDelete) {
                  form.submit();
              }
          });
  });

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-px+K4FbAOX2sTPc6h6t5OfDDQ5qF5t9qa4L9BG6MwsPUEyjbEdw2+dQ28IdcKsUE+2wR6lv6Iz4q7jKmSkCo2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
   
   $(document).ready(function () {
    $('#searchInput').keyup(function () {
        var query = $(this).val();

        if (query !== "") {
            $.ajax({
                url: "/searchajax",
                method: "POST",
                data: { query: query, _token: $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data.html); 
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                  
                }
            });
        }
    });

    $(document).on('click', '.li_search_ajax', function () {
        $('#searchInput').val($(this).text());
        $('#search_ajax').fadeOut();
    });
});

</script>

<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="ReEarth"
  agent-id="8bc5d7bb-1d1d-4d77-a172-a9fd0d980b45"
  language-code="en"
 
></df-messenger>




</html>
</html>