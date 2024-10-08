<div class="col-xl-6 col-lg-12 col-md-12 col-12">
    <div class="site-card">
        <div class="site-card-header">
            <h3 class="title">{{$fields['title']}}</h3>
        </div>
        <div class="site-card-body">
            @include('backend.setting.site_setting.include.form.__open_action')

            <div class="site-input-groups row mb-0">
                <div class="col-sm-4 col-label">{{ __('URL Ads') }}</div>
                <div class="col-sm-8">
                    <div class="form-row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Ads Price:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="link_ads_price"
                                           value="{{ oldSetting('link_ads_price','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Amount For User:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="link_ads_amount"
                                           value="{{ oldSetting('link_ads_amount','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-input-groups row mb-0">
                <div class="col-sm-4 col-label">{{ __('Image Ads') }}</div>
                <div class="col-sm-8">
                    <div class="form-row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Ads Price:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="image_ads_price"
                                           value="{{ oldSetting('image_ads_price','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Amount For User:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="image_ads_amount"
                                           value="{{ oldSetting('image_ads_amount','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-input-groups row mb-0">
                <div class="col-sm-4 col-label">{{ __('Script Ads') }}</div>
                <div class="col-sm-8">
                    <div class="form-row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Ads Price:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="script_ads_price"
                                           value="{{ oldSetting('script_ads_price','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Amount For User:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="script_ads_amount"
                                           value="{{ oldSetting('script_ads_amount','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-input-groups row mb-0">
                <div class="col-sm-4 col-label">{{ __('YouTube Ads') }}</div>
                <div class="col-sm-8">
                    <div class="form-row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Ads Price:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="youtube_ads_price"
                                           value="{{ oldSetting('youtube_ads_price','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Amount For User:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="youtube_ads_amount"
                                           value="{{ oldSetting('youtube_ads_amount','ads') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('backend.setting.site_setting.include.form.__close_action')
        </div>
    </div>
</div>

