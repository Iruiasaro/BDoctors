<aside class="dashboard">
    <ul class="list-unstyled ">
        <li class="  pt-3">
            <a class="my-hover "href="{{route('admin.home')}}"> <i class="fa fa-home " aria-hidden="true"></i> <span class=" text-dashboard"> Admin Home </span></a>
        </li>
        <li class="  pt-3">
            <a class="my-hover" href="{{route('admin.edit',Auth::user()->id)}}"><i class="fa fa-pencil " aria-hidden="true"></i> <span class=" text-dashboard">Modifica Profilo </span> </a>
        </li>
        <li class=" pt-3">
            <a class="my-hover"href="{{route('doctor.show',Auth::user()->id)}}"><i class="fa fa-user-md" aria-hidden="true"></i> <span class="text-dashboard">Vedi Profilo </span> </a>
        </li>
        <li class="pt-3">
            <a class="my-hover"href="{{route('admin.messages',Auth::user()->id)}}"> <i class=" fa fa-comments " aria-hidden="true"></i>
                <span class="text-dashboard"> Messaggi </span> </a>
        </li>
        <li class="pt-3">
            <a class="my-hover"href="{{route('admin.charts',Auth::user()->id)}}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="text-dashboard"> Statistiche
                </span> </a>
        </li>
        <li class="pt-3">
            <a class="my-hover"href="{{route('admin.reviews',Auth::user()->id)}}"> <i class="fa fa-star-half-o" aria-hidden="true"></i> <span class="text-dashboard"> Recensioni
                </span> </a>
        </li>
        <li class="pt-3">
            <a class="my-hover"href="{{route('password.request')}}"> <i class="fa fa-key" aria-hidden="true"></i> <span class="text-dashboard"> Modifica password</span> </a>
        </li>
        <li class="p-0">
            <ul class="p-0" style="list-style: none">
                <li class="pt-3">
                    <a class="my-hover" href="{{route('admin.sponsorPlan')}}">
                        <i class="fa fa-eur" aria-hidden="true"></i> <span class="text-dashboard"> Pagamento sponsorizzazioni </span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>