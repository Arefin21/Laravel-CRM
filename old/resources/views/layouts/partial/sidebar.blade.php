<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('asset/assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{route('subscriber-dashboard')}}" class="simple-text logo-normal">
            <img src="{{asset('asset/images/logo.png')}}">
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(isset($subscriptionfee->userid) == Auth::id())
                @if((isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active'))  and ($subscriptionfee->updated_at)< \Carbon\Carbon::now()->subDays(300)->toDateTimeString())
                    {{--<script>window.location = "{{ route('nonSubscriber_seminar_details',$seminar->id) }}";</script>--}}


                    <li class="nav-item @if(Request::path() =='admin/subscriber/subscriberlist')
                            active
                            @endif">
                        {{--<a class="nav-link" href="{{route('nonSubscriber_subscription_details_renew',$subscription_feesses->id)}}">--}}
                            {{--<i class="material-icons">money_on</i>--}}

                            {{--<p class="renew">Renew for Next 1 Year</p>--}}

                        {{--</a>--}}
                    </li>

                @endif
            @endif

                <style>
                    .renew {
                        opacity: 0;
                        animation: blinking 1s linear infinite;
                        color: #ec4c49;
                        font-weight: bold;
                    }

                    @keyframes blinking {
                        from,
                        49.9% {
                            opacity: 0;
                        }
                        50%,
                        to {
                            opacity: 1;
                        }
                    }
                </style>

            <li class="nav-item @if(Request::path() =='Subscriber/SubscriberDashboard')
                    active
                @endif">
                <a class="nav-link" href="{{route('subscriber-dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>

                </a>
            </li>
            

            <li class="nav-item @if(Request::path() =='Subscriber/PersonalInformation')
                    active
                @endif">
                <a class="nav-link" href="{{route('PersonalInformation')}}">
                    <i class="material-icons">account_circle</i>
                    <p>Personal Information</p>
                </a>
            </li>


            <li class="nav-item @if(Request::path() =='Subscriber/FamilyDetails')
                    active
                @endif">
                <a class="nav-link" href="{{route('FamilyDetails')}}">
                    <i class="material-icons">face</i>
                    <p>Details of Family </p>
                </a>
            </li>
            <li class="nav-item @if(Request::path() =='Subscriber/IncomeDetails')
                    active
                @endif">
                <a class="nav-link" href="{{route('IncomeDetails')}}">
                    <i class="material-icons">attach_money</i>
                    <p>Detail of Income</p>
                </a>
            </li>
            <li class="nav-item @if(Request::path() =='Subscriber/CompanyInformation')
                    active
                @endif">
                <a class="nav-link" href="{{route('CompanyInformation')}}">
                    <i class="material-icons">apartment</i>
                    <p>Company Information</p>
                </a>
            </li>
            <!--  <li class="nav-item ">
               <a class="nav-link" href="reference.html">
                 <i class="material-icons">bubble_chart</i>
                 <p>Name of Reference</p>
               </a>
             </li> -->

            <li class="nav-item @if(Request::path() =='Subscriber/Reference')
                    active
                @endif">
                <a class="nav-link" href="{{route('Reference')}}">
                    <i class="material-icons">supervisor_account</i>
                    <p>Name of Reference </p>
                </a>
            </li>

            <li class="nav-item @if(Request::path() =='Subscriber/Upload')
                    active
                @endif">
                <a class="nav-link" href="{{route('Upload')}}">
                    <i class="material-icons">upload</i>
                    <p>Upload Photos & Files </p>
                </a>
            </li>



            @if(App\Models\Registration::all()->where('subscriber_id', Auth::user()->id)->first()->status =='active')

            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="change-request.html">--}}
                    {{--<i class="material-icons">language</i>--}}
                    {{--<p>Change Request </p>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item @if(Request::path() =='Subscriber/Payment')--}}
                    {{--active--}}
                {{--@endif">--}}
                {{--<a class="nav-link" href="{{route('Payment')}}">--}}
                    {{--<i class="material-icons">payment</i>--}}
                    {{--<p>Payment </p>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li class="nav-item ">
                <a class="nav-link" href="{{route('Payment.history')}}">
                    <i class="material-icons">language</i>
                    <p>Payment History</p>
                </a>
            </li>
                <li class="nav-item @if(Request::path() =='Subscriber/Certificate')
                        active
                    @endif">
                    <a class="nav-link" href="{{route('Certificate')}}">
                        <i class="material-icons">note</i>
                        <p>Certificate </p>
                    </a>
                </li>
            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="all-services.html#">--}}
                    {{--<i class="material-icons">language</i>--}}
                    {{--<p> All Services</p>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li class="nav-item ">
                <a class="nav-link" href="{{route('Subscriber.Seminar')}}">
                    <i class="material-icons">language</i>
                    <p> Seminar / Workshop / Training</p>
                </a>
            </li>

            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="my-activity.html">--}}
                    {{--<i class="material-icons">language</i>--}}
                    {{--<p> My Activity</p>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="#">--}}
                    {{--<i class="material-icons">language</i>--}}
                    {{--<p>Help Desk</p>--}}
                {{--</a>--}}
            {{--</li>--}}

            @endif


            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="material-icons">logout</i>
                    <p>logout</p>
                </a>
            </li>


            <!-- <li class="nav-item active-pro ">
              <a class="nav-link" href="./upgrade.html">
                <i class="material-icons">unarchive</i>
                <p>logout</p>
              </a>
            </li> -->
        </ul>
    </div>

</div>