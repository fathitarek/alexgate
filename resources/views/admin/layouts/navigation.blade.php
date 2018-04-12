<li>
    <a href="{{url('adminpanel')}}">
        <i class="fa fa-dashboard"></i>
        <span>الواجه الرئيسية</span>
    </a>
</li>




<li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i>
        <span> <i class="fa fa-angle-left pull-left"></i>إعدادات الموقع</span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/sitesettings')}}"><i class="fa fa-circle-o"></i>اعدادات الموقع </a></li>
        <li><a href="{{url('adminpanel/clients')}}"><i class="fa fa-circle-o"></i> العملاء</a></li>
        <li><a href="{{url('adminpanel/sliders')}}"><i class="fa fa-circle-o"></i> سلايدر</a></li>
        <li><a href="{{url('adminpanel/homeFetcher1')}}"><i class="fa fa-circle-o"></i> الصفحة الرئيسية Fetcher1</a></li>
        <li><a href="{{url('adminpanel/homeFetcher2')}}"><i class="fa fa-circle-o"></i> الصفحة الرئيسية Fetcher2</a></li>

    </ul>
</li>






<!-- Users -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i>
        <span> <i class="fa fa-angle-left pull-left"></i>الاعضاء</span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/users/create')}}"><i class="fa fa-circle-o"></i> اضف عضو</a></li>
        <li><a href="{{url('adminpanel/users')}}"><i class="fa fa-circle-o"></i> كل الاعضاء</a></li>
    </ul>
</li>

<!-- Buildings -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-building"></i>
        <span>النمازج</span>
        <span><i class="fa fa-angle-left pull-left" ></i></span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/building/create')}}"><i class="fa fa-circle-o"></i> اضف نموزج</a></li>
        <li><a href="{{url('adminpanel/building')}}"><i class="fa fa-circle-o"></i> كل النمازج</a></li>
    </ul>
</li>


<!-- projects  -->

<li class="treeview">
    <a href="#">
        <i class="fa fa-building"></i>
        <span>المشاريع</span>
        <span><i class="fa fa-angle-left pull-left" ></i></span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/addproject')}}"><i class="fa fa-circle-o"></i> اضف مشروع</a></li>
        <li><a href="{{url('adminpanel/projects/addlevel')}}"><i class="fa fa-circle-o"></i> اضف مرحله لمشروع</a></li>
        <li><a href="{{url('adminpanel/projects')}}"><i class="fa fa-circle-o"></i> كل المشاريع</a></li>

    </ul>
</li>


<li class="treeview">
    <a href="#">
        <i class="fa fa-building"></i>
        <span>العروض</span>
        <span><i class="fa fa-angle-left pull-left" ></i></span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/addoffer')}}"><i class="fa fa-circle-o"></i> اضف عرض</a></li>
        <li><a href="{{url('adminpanel/all-offers')}}"><i class="fa fa-circle-o"></i> كل العروض</a></li>
    </ul>
</li>



<li class="treeview">
    <a href="#">
        <i class="fa fa-building"></i>
        <span>الاخبار</span>
        <span><i class="fa fa-angle-left pull-left" ></i></span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/addnews')}}"><i class="fa fa-circle-o"></i> اضف خبر</a></li>
        <li><a href="{{url('adminpanel/all-news')}}"><i class="fa fa-circle-o"></i> كل الاخبار</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-building"></i>
        <span>{{ Lang::get('main.testimonial') }}</span>
        <span><i class="fa fa-angle-left pull-left" ></i></span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/testimonial/create')}}"><i class="fa fa-circle-o"></i>{{ Lang::get('main.add') }}</a></li>
        <li><a href="{{url('adminpanel/testimonial')}}"><i class="fa fa-circle-o"></i> {{ Lang::get('main.view') }}</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-map-marker"></i>
        <span>{{ Lang::get('main.locations') }}</span>
        <span><i class="fa fa-angle-left pull-left" ></i></span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/locations/create')}}"><i class="fa fa-circle-o"></i>{{ Lang::get('main.add') }}</a></li>
        <li><a href="{{url('adminpanel/locations')}}"><i class="fa fa-circle-o"></i> {{ Lang::get('main.view') }}</a></li>
    </ul>
</li>



<!-- Messages -->
<li class="treeview">
    <a href="{{url('adminpanel/contact')}}">
        <i class="fa fa-envelope"></i>
        <span>الرسائل</span>
    </a>
</li>

<!-- Chart -->
<li class="treeview">
    <a href="{{url('adminpanel/chart')}}">
        <i class="fa fa-bar-chart"></i>
        <span>احصائية إضافة النمازج</span>
    </a>
</li>