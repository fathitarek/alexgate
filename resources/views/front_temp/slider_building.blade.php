<section class="main-slider">
    <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="realand-slider-3"
         data-source="gallery"
         style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

        <!-- START REVOLUTION SLIDER 5.4.6 fullwidth mode -->
        <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6">
            <ul>

                @foreach(App\Building::whereIn('id',json_decode(getSettings('slider_ids')))->get() as $slide)
                    <?php $images = explode('|', $slide->image); ?>
                <!-- SLIDE  -->
                <li data-index="rs-{{ $slide->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-thumb="{{ asset(image_exist($images[0])) }}" data-rotate="0" data-saveperformance="off"
                    data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                    data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('home/images/revslider/dummy.png') }}" alt="" title="{{$slide->project_name}}" width="1920" height="780"
                         data-lazyload="{{ asset(image_exist($images[0])) }}" data-bgposition="center center"
                         data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption     rev_group" id="slide-{{ $slide->id }}-layer-1"
                         data-x="['left','left','center','center']" data-hoffset="['275','275','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-1','-1','-1','-1']"
                         data-width="['470','470','397','362']" data-height="['190','190','154','132']"
                         data-whitespace="nowrap" data-type="group" data-responsive_offset="on"
                         data-frames='[{"delay":500,"speed":1500,"sfxcolor":"#ffffff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                         data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"
                         style="z-index: 5; min-width: 470px; max-width: 470px; max-width: 190px; max-width: 190px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;background-color:rgba(255,255,255,0.95);">
                        <!-- LAYER NR. 2 -->
                        <span class="tp-caption   tp-resizeme" id="slide-{{ $slide->id }}-layer-2"
                              data-x="['left','left','left','left']" data-hoffset="['30','30','30','20']"
                              data-y="['top','top','top','top']" data-voffset="['30','30','30','15']"
                              data-fontsize="['16','16','14','14']" data-width="none" data-height="none"
                              data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                              data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                              data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                              data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                              data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                              data-paddingleft="[0,0,0,0]"
                              style="z-index: 6; white-space: nowrap; font-size: 16px; line-height: 22px; font-weight: 700; color: #333333; letter-spacing: 0px;font-family:Roboto;">{{ $slide->rooms }} ROOMS / {{ $slide->baths }} BATHS / {{ $slide->building_area }} {{ Lang::get('home.sq_ft') }} </span>

                        <!-- LAYER NR. 3 -->
                        <a class="tp-caption   tp-resizeme" href="@if($slide->nameurl){{url('الوحدات/' . $slide->project->nameurl.'/'.$slide->nameurl)}}@else{{url('الوحدات/' . $slide->project->nameurl.'/'.$slide->id)}}@endif" target="_self" id="slide-{{ $slide->id }}-layer-3"
                           data-x="['left','left','left','left']" data-hoffset="['30','30','30','20']"
                           data-y="['top','top','top','top']" data-voffset="['60','60','60','45']"
                           data-fontsize="['30','30','24','24']" data-width="none" data-height="none"
                           data-whitespace="nowrap" data-type="text" data-actions='' data-responsive_offset="on"
                           data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                           data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                           data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                           data-paddingleft="[0,0,0,0]"
                           style="z-index: 7; white-space: nowrap; font-size: 30px; line-height: 22px; font-weight: 800; color: #333333; letter-spacing: 0px;font-family:Raleway;text-decoration: none;">{{$slide->building_name}}</a>

                        <!-- LAYER NR. 4 -->
                        <span class="tp-caption   tp-resizeme" id="slide-{{ $slide->id }}-layer-4"
                              data-x="['left','left','left','left']" data-hoffset="['40','40','40','30']"
                              data-y="['top','top','top','top']" data-voffset="['95','95','90','75']"
                              data-fontsize="['15','15','13','13']" data-width="none" data-height="none"
                              data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                              data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                              data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                              data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                              data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                              data-paddingleft="[0,0,0,0]"
                              style="z-index: 8; white-space: nowrap; font-size: 15px; line-height: 22px; font-weight: 400; color: #888888; letter-spacing: 0px;font-family:Roboto;">{{$slide->project->project_location}} </span>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption   tp-resizeme" id="slide-{{ $slide->id }}-layer-9"
                             data-x="['left','left','left','left']" data-hoffset="['30','30','30','20']"
                             data-y="['top','top','top','top']" data-voffset="['95','95','90','75']"
                             data-fontsize="['14','14','13','13']" data-width="9" data-height="none"
                             data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                             data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                             data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 9; min-width: 9px; max-width: 9px; white-space: nowrap; font-size: 14px; line-height: 22px; font-weight: 400; color: #888888; letter-spacing: 0px;font-family:Open Sans;">
                            <i class="fa fa-map-marker"></i></div>
                    </div>

                    <!-- LAYER NR. 6 -->
                    <div class="tp-caption     rev_group" id="slide-{{ $slide->id }}-layer-5" data-x="['left','left','left','left']"
                         data-hoffset="['305','305','215','80']" data-y="['top','top','top','top']"
                         data-voffset="['450','450','375','290']" data-width="['230','230','189','189']"
                         data-height="['70','70','64','64']" data-whitespace="nowrap" data-type="group"
                         data-responsive_offset="on"
                         data-frames='[{"delay":1800,"speed":800,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                         data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"
                         style="z-index: 10; min-width: 230px; max-width: 230px; max-width: 70px; max-width: 70px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;background-color:rgb(31,195,65);border-radius:4px 4px 4px 4px;">
                        <!-- LAYER NR. 7 -->
                        <span class="tp-caption   tp-resizeme" id="slide-{{ $slide->id }}-layer-6"
                              data-x="['left','left','left','left']" data-hoffset="['30','30','25','25']"
                              data-y="['top','top','top','top']" data-voffset="['10','10','8','8']"
                              data-fontsize="['14','14','13','13']" data-width="none" data-height="none"
                              data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                              data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                              data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                              data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                              data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                              data-paddingleft="[0,0,0,0]"
                              style="z-index: 11; white-space: nowrap; font-size: 14px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">{{ Lang::get('home.start_from') }} </span>

                        <!-- LAYER NR. 8 -->
                        <h4 class="tp-caption   tp-resizeme" id="slide-{{ $slide->id }}-layer-7" data-x="['left','left','left','left']"
                            data-hoffset="['30','30','25','25']" data-y="['top','top','top','top']"
                            data-voffset="['32','32','30','30']" data-fontsize="['24','24','20','20']" data-width="none"
                            data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                            data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            style="z-index: 12; white-space: nowrap; font-size: 24px; line-height: 22px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Open Sans;">
                            ${{$slide->building_price}} </h4>
                    </div>
                </li>
                @endforeach
                <!-- SLIDE  -->
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->

    @include('front_temp.slider_search')
</section><!-- .main-slider -->