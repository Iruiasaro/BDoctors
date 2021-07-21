<aside class="dashboard">
    <ul class="list-unstyled">
        <li>
            <a href="{{route('admin.home')}}"> <i class="fa fa-home" aria-hidden="true"></i> <span class="text-dashboard"> Admin Home </span></a>
        </li>
        <li class="pt-3">
            <a href="{{route('admin.edit',Auth::user()->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> <span class="text-dashboard">Modifica Profilo </span> </a>
        </li>
         <li class="pt-3">
            <a href="{{route('doctor.show',Auth::user()->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> <span class="text-dashboard">Vedi Profilo </span> </a>
        </li>
        <li class="pt-3">
            <a href="{{route('admin.messages',Auth::user()->id)}}"> <i class="fa fa-comments" aria-hidden="true"></i> <span class="text-dashboard"> Messaggi </span> </a>
        </li>
        <li class="pt-3">
            <a href=""><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="text-dashboard"> Statistiche </span> </a>
        </li>
        <li class="pt-3">
            <a href=""> <i class="fa fa-star-half-o" aria-hidden="true"></i> <span class="text-dashboard"> Recensioni </span> </a>
        </li>
        <li class="pt-3">
           <a href="{{route('password.reset',Auth::user()->remember_token)}}">  <i class="fa fa-key" aria-hidden="true"></i> Modifica password </a>
        </li>
    </ul>
</aside>
