 

                          @foreach($subcat->categories as $sub)

<div class="" aria-labelledby="navbarDropdown1" style="">
   <a class="dropdown-item" href="{{route('product.category',$sub->url)}}"><i class="fab fa-magento"></i>
      {{$sub->name}}
   </a>
    <!-- - <a class="text-left text-muted " style="margin-top:-8px;" href="" style="text-decoration:none;"></a> -->

       @if($sub->categories)
       @foreach($sub->categories as $sub)
       <div class="pl-4">
           <a class="dropdown-item" href="{{route('product.category',$sub->url)}}"><i class="fab fa-magento"></i>
      {{$sub->name}}
   </a>
       
     </div>
       @endforeach
       @endif
                                        
   </div>
    @endforeach
