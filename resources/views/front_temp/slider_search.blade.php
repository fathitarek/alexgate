<section class="main-search main-search--absolute">
    <div class="container">
        <div class="main-search__container">
            <section class="listing-search">
                <form action="http://haintheme.com/demo/html/realand/index.html" method="get"
                      class="listing-search__form">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="listing-type" class="listing-search__label">{{ Lang::get('home.unit_types') }}</label>
                            <select name="listing-type" id="listing-type" class="ht-field">
                                <option value="All" selected>{{ Lang::get('home.unit_types') }}</option>
                                <option value="For Rent">{{ Lang::get('home.rent') }}</option>
                                <option value="For Sale">{{ Lang::get('home.owner') }}</option>
                            </select>
                        </div><!-- .col -->

                        <div class="col-sm-3">
                            <label for="offer-type" class="listing-search__label">{{ Lang::get('home.select').Lang::get('home.country') }}</label>
                            <select name="offer-type" id="offer-type" class="ht-field">
                                <option value="All" selected>All Offer Type</option>
                                <option value="For Rent">For Rent</option>
                                <option value="For Sale">For Sale</option>
                                <option value="Open House">Open House</option>
                            </select>
                        </div><!-- .col -->

                        <div class="col-sm-3">
                            <label for="city" class="listing-search__label">{{ Lang::get('home.select').Lang::get('home.city') }}</label>
                            <select name="city" id="city" class="ht-field">
                                <option value="All" selected>All City</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                            </select>
                        </div><!-- .col -->

                        <div class="col-sm-3">
                            <label for="listing-btn" class="listing-search__label listing-search__label--hidden">{{ Lang::get('home.advanced_search') }}</label>
                            <a href="#" id="listing-btn" class="listing-search__btn">{{ lang::get('home.advanced_search') }}</a>
                        </div><!-- .col -->
                    </div><!-- row -->

                    <div class="listing-search__advance">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="keywords" class="listing-search__label">{{ Lang::get('home.keyword') }}</label>
                                <input type="text" id="keywords" class="listing-search__field"
                                       placeholder="{{ Lang::get('home.enter').Lang::get('home.keyword') }}">
                            </div><!-- .col -->

                            <div class="col-sm-3">
                                <label for="min-price" class="listing-search__label">{{ Lang::get('home.min_price') }}</label>
                                <select name="min-price" id="min-price" class="ht-field">
                                    <option value="Unlimited" selected>Unlimited</option>
                                    <option value="$1,000">$1,000</option>
                                    <option value="$10,000">$10,000</option>
                                    <option value="$20,000">$20,000</option>
                                    <option value="$50,000">$50,000</option>
                                    <option value="$100,000">$100,000</option>
                                </select>
                            </div><!-- .col -->

                            <div class="col-sm-3">
                                <label for="bedrooms" class="listing-search__label">{{ Lang::get('home.bedrooms') }}</label>
                                <select name="bedrooms" id="bedrooms" class="ht-field">
                                    <option value="Any" selected>Any</option>
                                    <option value="1">01 bedroom(s)</option>
                                    <option value="2">02 bedroom(s)</option>
                                    <option value="3">03 bedroom(s)</option>
                                    <option value="4">04 bedroom(s)</option>
                                    <option value="5">05 bedroom(s)</option>
                                    <option value="6">06 bedroom(s)</option>
                                    <option value="7">07 bedroom(s)</option>
                                </select>
                            </div><!-- .col -->

                            <div class="col-sm-3">
                                <label for="bathrooms" class="listing-search__label">{{ Lang::get('home.bathrooms') }}</label>
                                <select name="bathrooms" id="bathrooms" class="ht-field">
                                    <option value="Any" selected>Any</option>
                                    <option value="1">01 bathroom(s)</option>
                                    <option value="2">02 bathroom(s)</option>
                                    <option value="3">03 bathroom(s)</option>
                                    <option value="4">04 bathroom(s)</option>
                                    <option value="5">05 bathroom(s)</option>
                                    <option value="6">06 bathroom(s)</option>
                                    <option value="7">07 bathroom(s)</option>
                                </select>
                            </div><!-- .col -->

                            <div class="col-sm-3">
                                <label for="property-size" class="listing-search__label">{{ Lang::get('home.property_size') }}</label>

                                <div class="listing-search__amount">
                                    <label for="property-amount">Sq.Ft</label>
                                    <span id="property-amount"></span>
                                </div><!-- listing-search__amount -->
                                <div id="property-size"
                                     class="listing-search__slider listing-search__property-size"></div>
                            </div><!-- .col -->

                            <div class="col-sm-3">
                                <label for="lot-size" class="listing-search__label">Lot Size</label>

                                <div class="listing-search__amount">
                                    <label for="lot-amount">Sq.Ft</label>
                                    <span id="lot-amount"></span>
                                </div><!-- .listing-search__amount -->
                                <div id="lot-size" class="listing-search__slider listing-search__lot-size"></div>
                            </div><!-- .col -->

                            <div class="col-sm-3">
                                <label for="garages" class="listing-search__label">Garages</label>
                                <select name="garages" id="garages" class="ht-field">
                                    <option value="Any" selected>Any</option>
                                    <option value="1">01 garage(s)</option>
                                    <option value="2">02 garage(s)</option>
                                    <option value="3">03 garage(s)</option>
                                    <option value="4">04 garage(s)</option>
                                </select>
                            </div><!-- .col -->

                            <div class="col-sm-3">
                                <label for="tenure" class="listing-search__label">Tenure</label>
                                <select name="tenure" id="tenure" class="ht-field">
                                    <option value="Any" selected>Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div><!-- .col -->
                        </div><!-- .row -->

                        <div class="listing-search__more">
                            <a class="listing-search__more-btn" href="#">Additional Features</a>

                            <div class="listing-search__more-inner">
                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="parking-garage" id="parking-garage"
                                                   class="listing-search__more-field">
                                            <label for="parking-garage" class="listing-search__more-label">Parking/Garage
                                                (26)</label>
                                        </div><!-- .listing-search__more-wrapper -->

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="balcony-terrace" id="balcony-terrace"
                                                   class="listing-search__more-field">
                                            <label for="balcony-terrace" class="listing-search__more-label">Balcony/Terrace
                                                (24)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="garden" id="garden"
                                                   class="listing-search__more-field">
                                            <label for="garden" class="listing-search__more-label">Garden
                                                (26)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="porter-security" id="porter-security"
                                                   class="listing-search__more-field">
                                            <label for="porter-security" class="listing-search__more-label">Porter/Security
                                                (24)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="fireplace" id="fireplace"
                                                   class="listing-search__more-field">
                                            <label for="fireplace" class="listing-search__more-label">Fireplace
                                                (23)</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="rural-secluded" id="rural-secluded"
                                                   class="listing-search__more-field">
                                            <label for="rural-secluded" class="listing-search__more-label">Rural/Secluded
                                                (21)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="air-conditioning" id="air-conditioning"
                                                   class="listing-search__more-field">
                                            <label for="air-conditioning" class="listing-search__more-label">Air
                                                Conditioning (22)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="lawn" id="lawn"
                                                   class="listing-search__more-field">
                                            <label for="lawn" class="listing-search__more-label">Lawn (4)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="swimming-pool" id="swimming-pool"
                                                   class="listing-search__more-field">
                                            <label for="swimming-pool" class="listing-search__more-label">Swimming
                                                Pool (4)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="barbecue" id="barbecue"
                                                   class="listing-search__more-field">
                                            <label for="barbecue" class="listing-search__more-label">Barbecue
                                                (23)</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="microwave" id="microwave"
                                                   class="listing-search__more-field">
                                            <label for="microwave" class="listing-search__more-label">Microwave
                                                (24)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="tv-cable" id="tv-cable"
                                                   class="listing-search__more-field">
                                            <label for="tv-cable" class="listing-search__more-label">TV Cable
                                                (5)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="washer" id="washer"
                                                   class="listing-search__more-field">
                                            <label for="washer" class="listing-search__more-label">Washer
                                                (24)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="outdoor-shower" id="outdoor-shower"
                                                   class="listing-search__more-field">
                                            <label for="outdoor-shower" class="listing-search__more-label">Outdoor
                                                Shower (22)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="gym" id="gym"
                                                   class="listing-search__more-field">
                                            <label for="gym" class="listing-search__more-label">Gym (4)</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="window-coverings" id="window-coverings"
                                                   class="listing-search__more-field">
                                            <label for="window-coverings" class="listing-search__more-label">Window
                                                Coverings (21)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="dryer" id="dryer"
                                                   class="listing-search__more-field">
                                            <label for="dryer" class="listing-search__more-label">Dryer (21)</label>
                                        </div>

                                        <div class="listing-search__more-wrapper">
                                            <input type="checkbox" name="laundry" id="laundry"
                                                   class="listing-search__more-field">
                                            <label for="laundry" class="listing-search__more-label">Laundry
                                                (24)</label>
                                        </div>
                                    </div>
                                </div><!-- .row -->
                            </div><!-- .listing-search__more-inner -->
                        </div><!-- .listing-search__more -->
                    </div><!-- .listing-search__advance -->
                </form><!-- .listing-search__form -->
            </section><!-- .listing-search -->

            <section class="listing-sort">
                <div class="listing-sort__inner">
                    <ul class="listing-sort__list">
                        <li class="listing-sort__item"><a href="#" class="listing-sort__link"><i
                                        class="fa fa-th-list" aria-hidden="true" class="listing-sort__icon"></i></a></li>


                    </ul>

                    <span class="listing-sort__result">{{ Lang::get('home.resultsfrom') }} </span>

                    <p class="listing-sort__sort">
                        <label for="sort-type" class="listing-sort__label"><i class="fa fa-sort-amount-asc"
                                                                              aria-hidden="true"></i> {{ Lang::get('home.sort_by') }}
                        </label>
                        <select name="sort-type" id="sort-type" class="ht-field listing-sort__field">
                            <option value="default">{{ Lang::get('home.default') }} </option>
                            <option value="low-price">{{ Lang::get('home.lowhigh') }}</option>
                            <option value="high-price">{{ Lang::get('home.highlow') }}</option>
                        </select>
                    </p>
                </div><!-- .listing-sort__inner -->
            </section><!-- .listing-sort -->
        </div><!-- .main-search__container -->
    </div><!-- .container -->
</section><!-- .main-search -->