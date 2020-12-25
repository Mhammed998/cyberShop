<section id="big-footer">
    <div class="container">
        <div class="row">


            <div class="col-md-3">
                <div class="three">
                    <h5>CyperShop</h5>
                  <p>
                      Navbars are responsive by default, but you can easily modify them to change that.
                      Responsive behavior depends on our Collapse JavaScript plugin.
                      Navbars are hidden by default when printing.
                  </p>
                </div>
            </div>

             <div class="col-md-3">
                <div class="one">
                    <h5>Top categories</h5>
                    <ul class="list-unstyled">
                        @if($categories->count() !=0)
                            @foreach($categories->where('parent_id' ,'=',0) as $cate)
                                <li class="pl-2"><a href="#">{{$cate->cate_name}}</a></li>
                            @endforeach
                            @endif
                    </ul>
                </div>
             </div>



            <div class="col-md-3">
                <div class="two">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="four">
                    <h5>Contact us</h5>

                     <div class="ml-1">
                         <p>Address: Egypt,cairo</p>
                         <p>Phone: 0255-653-699</p>
                     </div>
                    <p>You can follow us</p>
                    <div class="ml-1">
                        <a href="#"> <i  class="fa fa-facebook"></i> </a>
                            <a href="#">  <i class="fa fa-twitter"></i> </a>
                        <a href="#">   <i class="fa fa-instagram"></i> </a>
                        <a href="#">   <i class="fa fa-google"></i> </a>
                    </div>
                </div>
            </div>


        </div>
    </div>


</section>
<div id="footer-bottom">
    <p class="m-0"> &copy; <script type="text/javascript">
            document.write(new Date().getFullYear());
        </script>.Cybershop.All Rights Reserved. </p>
</div>
