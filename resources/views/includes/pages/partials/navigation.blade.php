<nav class="navbar navbar-fixed-top yellow">
    <div class="container-fluid">
        <!--second nav button -->
        {{--<a class="side-menu-button"> <i class="fa fa-bars" aria-hidden="true"></i> </a>--}}
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>
        </div>

        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse  ">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#Home" class="scroll">Home</a></li>
                    <li><a href="#about-us" class="scroll">About</a></li>
                    <li><a href="#services" class="scroll">Services</a></li>
                    {{--<li><a href="#portfolio" class="scroll">Portfolio</a></li>--}}
                    <li><a href="#portfolio" class="scroll">How it works</a></li>
                    <li><a href="#contact-us" class="scroll">Contact Us</a></li>
                     @if(Auth::user())
                        <li><a href="{{route('dashboard')}}"  class="btn button  pull-right" role="button">Dashboard</a></li>
                         @else
                        {{--<li><a  href="{{route('user-register.index')}}">Register</a></li>--}}
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('register.personal')}}" style="color: #0c0c0c">Personal</a></li>
                                    <li><a href="{{route('register.org')}}" style="color: #0c0c0c">Organisation</a></li>
                                    <li><a href="{{route('register.media')}}" style="color: #0c0c0c">Media house</a></li>
                                </ul>
                            </li>
                        </ul>
                        <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> <b>Log in</b></a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>


    </div>
</nav>
