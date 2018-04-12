<section class="main-slider">
    <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="realand-slider-3"
         data-source="gallery"
         style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.6 fullwidth mode -->
        <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6">
            <ul>
                @foreach(App\slider::where('status',1)->orderBy('created_at')->get() as $slide)
                <!-- SLIDE  -->
                <li data-index="rs-{{ $slide->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-thumb="{{ asset('sliders/'.$slide->image) }}" data-rotate="0" data-saveperformance="off"
                    data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                    data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('home/images/revslider/dummy.png') }}" alt="" title="{{ $slide->title }}" width="1920" height="780"
                         data-lazyload="{{ asset('sliders/'.$slide->image) }}" data-bgposition="center center"
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

                        <!-- LAYER NR. 3 -->
                        <a class="tp-caption   tp-resizeme" href="{{ $slide->url_link }}" target="_blank" id="slide-{{ $slide->id }}-layer-3"
                           data-x="['left','left','left','left']" data-hoffset="['30','30','30','20']"
                           data-y="['top','top','top','top']" data-voffset="['60','60','60','45']"
                           data-fontsize="['30','30','24','24']" data-width="none" data-height="none"
                           data-whitespace="nowrap" data-type="text" data-actions='' data-responsive_offset="on"
                           data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                           data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                           data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                           data-paddingleft="[0,0,0,0]"
                           style="z-index: 7; white-space: nowrap; font-size: 30px; line-height: 22px; font-weight: 800; color: #333333; letter-spacing: 0px;font-family:Raleway;text-decoration: none;">{{ $slide->title }} </a>
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
                              style="z-index: 8; white-space: nowrap; font-size: 15px; line-height: 22px; font-weight: 400; color: #888888; letter-spacing: 0px;font-family:Roboto;">{{ $slide->description }} </span>
                     </div>
                </li>
                @endforeach

            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->

    @include('front_temp.slider_search')
</section><!-- .main-slider -->