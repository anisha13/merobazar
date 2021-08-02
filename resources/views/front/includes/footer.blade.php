
@php($categories =App\Category::where('parent_id','0')->where('status','1')->get())

<footer class="mainfooter" role="contentinfo">
  <div class="footer-middle">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Category</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            @foreach($categories as $category)
            <li><a href="#">{{$category->name}}</a></li>
            @endforeach
            
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>My Account</h4>
          <ul class="list-unstyled">
            <li><a href="{{route('front.user')}}">Your Account</a></li>
            <li><a href="{{route('mywishlist')}}">Wishlist</a></li>
            
            @if(!empty(auth()->user()))
            <li>
            {{Form::open(['class'=>'ml-auto','methood'=>'post','route'=>'logout'])}}
                <button class="btn btn-link p-0 ml-5" type="submit" style="text-decoration:none; color:white; margin-left:0px !important;"> Log Out</button>
                {{Form::close()}}
            </li>
            @else
            <li><a href="{{route('front.user')}}">LogIn</a></li>
            @endif
            
           
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Company</h4>
          <ul class="list-unstyled">
         
            <li><a href="{{route('about.page')}}">Company Profile</a></li>
            <li><a href="{{route('privacypolicy.page')}}">Privacy</a></li>
            <li><a href="{{route('termsofsale.page')}}">Terms Of Use</a></li>
            
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div>
      </div>
      @php($socialmedia =App\Socialmedia::all())
      @php($companydetail =App\Companydetail::orderBy('created_at','desc')->first())
    	<div class="col-md-3 col-6">
    		<h4>Follow Us</h4>
            <ul class="social-network social-circle">
              @foreach($socialmedia as $media)
             <li><a href="{{$media->url}}" class="icoFacebook pt-1" title="Facebook"><img src="{{asset('images/'.$media->image)}}" height="20"></a></li>
             @endforeach
             
            </ul>	
            <h5 class="mt-2">Contact Us</h5>
            	
            <p style="margin-top:-10px !important; font-size:13px;"><i class="fa fa-home"></i> {{$companydetail->address}} </p>	
            <p style="margin-top:-10px !important; font-size:13px;"><i class="fa fa-envelope "></i> {{$companydetail->email}} </p>
            <p style="margin-top:-10px !important; font-size:13px;"><i class="fa fa-phone "></i> {{$companydetail->phone}} </p>	
		</div>
    </div>
	<div class="row">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright 2020 - Mero Bazzar.  All rights reserved.</p>
		</div>
	</div>


  </div>
  </div>
</footer>






  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('front/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('front/js/mdb.min.js')}}"></script>
  <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('front/js/owl.js')}}"></script>

  <script>
    $(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready

// breakpoint and up  
$(window).resize(function(){
	if ($(window).width() >= 980){	

      // when you hover a toggle show its dropdown menu
      $(".navbar .dropdown-toggle").hover(function () {
         $(this).parent().toggleClass("show");
         $(this).parent().find(".dropdown-menu").toggleClass("show"); 
       });

        // hide the menu when the mouse leaves the dropdown
      $( ".navbar .dropdown-menu" ).mouseleave(function() {
        $(this).removeClass("show");  
      });
  
		// do something here
	}	
});  
  
  

// document ready  
});
    </script>

  <script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

</body>
</html>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

  <script>
    
    $(document).ready(function () {
$('.navbar-light .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });
}); 
 
    $(document).ready(function() {
	$(".megamenu").on("click", function(e) {
		e.stopPropagation();
	});
});

</script>
<script>
 $(document).ready(function () {
        $('.brand').click(function () {
            hidecat= $('#hidecat').val();

            var brand =[];
            $('.brand').each(function () {
                if($(this).is(":checked"))
                {
                    brand.push($(this).val());
                }
            });
            base = $('base').attr('href');
            url = base+'/filter/brand/';
            Finalbrand = brand.toString();
            $.ajax({
                type:'GET',
                dataType:'html',
                url:url,
                data:"brand="+ Finalbrand,

                success:function (response) {

                    $('#updateDiv').html(response);
                    $("#divcount").html(response.count);
                }
            })
        });
    });

</script>
<script>
 $(document).ready(function () {
        $('.catfilter').click(function () {
            category = $(this).val();
            base = $('base').attr('href');
            url = base+'/filter/category/'+category;
            
            $.get(url).done(function (response){
                    
                    $('#updateDiv').html(response);
                    $("#divcount").html(response.count);
                });
          
        });
    });

</script>
<script>
 $(document).ready(function () {
        $('#price').click(function () {
            
            category = $("#hidecat").val();
            max = $(".max").val();
            min=$(".min").val();
            
            base = $('base').attr('href');
            url = base+'/filter/price/'+category+'/'+max+'/'+min;
            
            $.get(url).done(function (response){
                    
                    $('#updateDiv').html(response);
                    $("#divcount").html(response.count);
                });
          
        });
    });

</script>
<script type="text/javascript">
  var navigator_info = window.navigator;

  var screen_info = window.screen;
  var uid = navigator_info.mimeTypes.length;
  uid += navigator_info.userAgent.replace(/\D+/g, '');
  uid += navigator_info.plugins.length;
  uid += screen_info.height || '';
  uid += screen_info.width || '';
  uid += screen_info.pixelDepth || '';
  console.log(uid);
  base = base = $('base').attr('href');
  url = base + '/store/fingerprint/' + uid;
  $.get(url).done(function(response) {
    console.log(response);
  })
</script>

