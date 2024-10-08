@extends('frontend::layouts.user')
@section('title')
{{ __('Dashboard') }}
@endsection
@section('content')

{{-- <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="site-card">
                <div class="site-card-header">
                    <div class="title-small">{{ __('Recent Transactions') }}</div>
<div class="card-header-links">
    <a href="{{ route('user.transactions') }}" class="card-header-link"><i data-lucide="eye"></i>{{ __('See All') }}</a>
</div>
</div>
<div class="site-card-body p-0 overflow-x-auto">
    <div class="site-custom-table">
        <div class="contents">
            <div class="site-table-list site-table-head">
                <div class="site-table-col">{{ __('Description') }}</div>
                <div class="site-table-col">{{ __('Transactions ID') }}</div>
                <div class="site-table-col">{{ __('Type') }}</div>
                <div class="site-table-col">{{ __('Amount') }}</div>
                <div class="site-table-col">{{ __('Charge') }}</div>
                <div class="site-table-col">{{ __('Status') }}</div>
                <div class="site-table-col">{{ __('Method') }}</div>
            </div>
            @foreach ($recentTransactions as $transaction)
            <div class="site-table-list">
                <div class="site-table-col">
                    <div class="description">
                        <div class="event-icon">
                            @if($transaction->type->value == 'deposit' || $transaction->type->value == 'manual_deposit')
                            <i data-lucide="chevrons-down"></i>
                            @elseif(Str::startsWith($transaction->type->value ,'dps'))
                            <i data-lucide="archive"></i>
                            @elseif(Str::startsWith($transaction->type->value ,'fdr'))
                            <i data-lucide="book"></i>
                            @elseif(Str::startsWith($transaction->type->value ,'loan'))
                            <i data-lucide="alert-triangle"></i>
                            @elseif($transaction->type->value == 'subtract')
                            <i data-lucide="minus-circle"></i>
                            @elseif($transaction->type->value == 'receive_money')
                            <i data-lucide="arrow-down-left"></i>
                            @else
                            <i data-lucide="send"></i>
                            @endif
                        </div>
                        <div class="content">
                            <div class="title">
                                {{ $transaction->description }}
                                @if(!in_array($transaction->approval_cause,['none',""]))
                                <span class="msg" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip"
                                    data-bs-placement="top" data-bs-title="{{ $transaction->approval_cause }}"><i
                                        data-lucide="message-square"></i>
                                </span>
                                @endif
                            </div>
                            <div class="date">{{ $transaction->created_at }}</div>
                        </div>
                    </div>
                </div>
                <div class="site-table-col">
                    <div class="trx fw-bold">{{ $transaction->tnx }}</div>
                </div>
                <div class="site-table-col">
                    <div class="type site-badge badge-primary">
                        {{ ucfirst(str_replace('_',' ',$transaction->type->value)) }}</div>
                </div>
                <div class="site-table-col">
                    <div @class([ "fw-bold" , "green-color"=> isPlusTransaction($transaction->type) == true,
                        "red-color" => isPlusTransaction($transaction->type) == false
                        ])>{{ isPlusTransaction($transaction->type) == true ? '+' : '-' }}{{ $transaction->amount.' '.$currency }}
                    </div>
                </div>
                <div class="site-table-col">
                    <div class="fw-bold red-color">-{{ $transaction->charge.' '.$currency }}</div>
                </div>
                <div class="site-table-col">
                    @if($transaction->status->value == 'failed')
                    <div class="type site-badge badge-failed">{{ $transaction->status->value }}</div>
                    @elseif($transaction->status->value == 'success')
                    <div class="type site-badge badge-success">{{ $transaction->status->value }}</div>
                    @elseif($transaction->status->value == 'pending')
                    <div class="type site-badge badge-pending">{{ $transaction->status->value }}</div>
                    @endif
                </div>
                <div class="site-table-col">
                    <div class="fw-bold">
                        {{ $transaction->method !== '' ? ucfirst(str_replace('-',' ',$transaction->method)) :  __('System') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if(count($recentTransactions) == 0)
        <div class="no-data-found">{{ __('No Data Found') }}</div>
        @endif
    </div>
</div>
</div>
</div>
</div> --}}

<div class="row gy-30">
    <div class="col-xxl-12">
        <div class="dashboard-card">
            <div class="user-profile">
                <span class="info-title">{{ __('Balance') }}</span>
                <h3 class="number">{{ $currencySymbol.auth()->user()->balance }}</h3>
                <div class="plan-badge-inner">
                    <div class="plan-badge">
                        <span>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_41_1631)">
                                    <path
                                        d="M5.07855 6.41783L3.8985 5.73716C2.37866 5.05499 1.902 3.57277 1.75648 2.5894C1.74841 2.53496 1.77329 2.4966 1.78888 2.47858C1.80474 2.46018 1.83982 2.42936 1.89639 2.42936H2.48754L2.79341 2.18327L2.67339 1.82867L2.3902 1.58258H1.89639C1.60866 1.58258 1.33579 1.70751 1.1478 1.92539C0.960336 2.14264 0.876883 2.42985 0.918828 2.71341C1.02364 3.42156 1.29743 4.44946 2.00664 5.32485C2.7537 6.24696 3.79512 6.78071 5.10874 6.91669L5.38332 6.78864L5.07855 6.41783Z"
                                        fill="#FFE27A" />
                                    <path
                                        d="M2.39062 1.58258C2.40482 1.78823 2.43284 2.083 2.48797 2.42936H3.03993L3.21668 2.00597L2.91992 1.58258H2.39062Z"
                                        fill="#F9CF58" />
                                    <path
                                        d="M5.02514 6.05259C4.59699 5.99263 4.22391 5.88304 3.89844 5.73694C4.32186 6.18808 4.7663 6.45118 5.10859 6.9163C5.33125 6.93935 5.56148 6.95136 5.79968 6.95152L5.88272 6.47667L5.02514 6.05259Z"
                                        fill="#F9CF58" />
                                    <path
                                        d="M8.92196 6.41777L10.102 5.7371C11.6219 5.05493 12.0985 3.57271 12.244 2.58934C12.2521 2.5349 12.2272 2.49654 12.2117 2.47852C12.1958 2.46012 12.1607 2.4293 12.1041 2.4293H11.513L11.2071 2.18321L11.3271 1.82861L11.6103 1.58252H12.1041C12.3919 1.58252 12.6647 1.70745 12.8527 1.92533C13.0402 2.14257 13.1236 2.42979 13.0817 2.71335C12.9769 3.4215 12.7031 4.4494 11.9939 5.32478C11.2468 6.2469 10.2054 6.78065 8.89177 6.91663L8.61719 6.78858L8.92196 6.41777Z"
                                        fill="#FFE27A" />
                                    <path
                                        d="M11.6093 1.58252C11.5951 1.78817 11.567 2.08294 11.5119 2.4293H10.96L10.7832 2.00591L11.0799 1.58252H11.6093Z"
                                        fill="#F9CF58" />
                                    <path
                                        d="M8.97477 6.05253C9.40292 5.99257 9.776 5.88298 10.1015 5.73688C9.67805 6.18802 9.2336 6.45112 8.89132 6.91624C8.66866 6.93929 8.43842 6.9513 8.20023 6.95146L8.11719 6.47661L8.97477 6.05253Z"
                                        fill="#F9CF58" />
                                    <path
                                        d="M10.8709 1.26221L11.0867 1.52419C11.0093 2.37275 10.7346 4.10235 9.76151 5.29202C8.91976 6.3211 7.92404 6.36504 7.79941 8.66758L7.5403 8.92956H6.46049L6.20138 8.66758C6.07675 6.36504 5.08105 6.3211 4.23928 5.29202C3.26617 4.10235 2.99147 2.37275 2.91406 1.52419L3.12989 1.26221H10.8709Z"
                                        fill="#FFBA57" />
                                    <path
                                        d="M11.0857 1.52418C11.1144 1.20976 11.116 1.01611 11.116 1.01611L6.99941 0.692688L2.88281 1.01611C2.88281 1.01611 2.88445 1.20976 2.91314 1.52418H11.0857Z"
                                        fill="#FFAC3E" />
                                    <path
                                        d="M6.20117 8.6676C6.20976 8.82598 6.21427 8.99485 6.21427 9.17568L7.00027 9.66786L7.78626 9.17568C7.78626 8.99485 7.7908 8.82598 7.79936 8.6676H6.20117Z"
                                        fill="#FFAC3E" />
                                    <path
                                        d="M11.3347 0.770027H2.66455C2.38395 0.770027 2.18128 0.328562 2.22459 0.253777C2.31247 0.102074 2.47659 0 2.66455 0H11.3347C11.5227 0 11.6868 0.102074 11.7747 0.253777C11.818 0.328562 11.6153 0.770027 11.3347 0.770027Z"
                                        fill="#FFE27A" />
                                    <path
                                        d="M11.3345 0.508174H2.66432C2.47636 0.508174 2.31266 0.405854 2.22477 0.25415C2.18146 0.328936 2.15625 0.415533 2.15625 0.508174C2.15625 0.788775 2.38372 1.01625 2.66432 1.01625H11.3345C11.6151 1.01625 11.8426 0.788775 11.8426 0.508174C11.8426 0.415533 11.8173 0.328936 11.774 0.25415C11.6861 0.405854 11.5224 0.508174 11.3345 0.508174Z"
                                        fill="#F9CF58" />
                                    <path
                                        d="M8.92377 9.17572H5.07688C4.64677 9.17572 4.28285 9.49365 4.2251 9.91985L3.88672 12.4172L4.06396 12.6791H9.93666L10.1139 12.4172L9.77553 9.91985C9.7178 9.49362 9.35388 9.17572 8.92377 9.17572Z"
                                        fill="#E0E0E0" />
                                    <path
                                        d="M3.88721 12.4171L3.81836 12.9252L7.00082 13.291L10.1833 12.9252L10.1144 12.4171H3.88721Z"
                                        fill="#CECECE" />
                                    <path
                                        d="M10.5722 13.7539H3.42773L3.18164 13.4919V13.4897C3.18164 13.1779 3.43438 12.9252 3.74615 12.9252H10.2537C10.5655 12.9252 10.8183 13.1779 10.8183 13.4897V13.4919L10.5722 13.7539Z"
                                        fill="#5A5A5A" />
                                    <path
                                        d="M3.32276 14H10.6771C10.7551 14 10.8183 13.9368 10.8183 13.8589V13.4919H3.18164V13.8589C3.18164 13.9368 3.24483 14 3.32276 14Z"
                                        fill="#4C4C4C" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_41_1631">
                                        <rect width="14" height="14" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        {{ auth()->user()->plan->name ?? __('No Plan') }}
                    </div>
                </div>
                @if(auth()->user()->plan)
                <a class="plan-change" href="{{ route('user.subscriptions') }}">{{ __('Change Plan') }}</a>
                <p class="time">{{ __('Expiry Date') }}: {{ auth()->user()->validity_at->format('d M Y, h:i A') }}</p>
                @endif
                <div class="icon">
                    <span>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.8398 17.9123C10.8398 19.5248 12.0773 20.8248 13.6148 20.8248H16.7523C18.0898 20.8248 19.1773 19.6873 19.1773 18.2873C19.1773 16.7623 18.5148 16.2248 17.5273 15.8748L12.4898 14.1248C11.5023 13.7748 10.8398 13.2373 10.8398 11.7123C10.8398 10.3123 11.9273 9.1748 13.2648 9.1748H16.4023C17.9398 9.1748 19.1773 10.4748 19.1773 12.0873"
                                stroke="white" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 7.5V22.5" stroke="white" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M15 27.5C21.9036 27.5 27.5 21.9036 27.5 15C27.5 8.09644 21.9036 2.5 15 2.5C8.09644 2.5 2.5 8.09644 2.5 15C2.5 21.9036 8.09644 27.5 15 27.5Z"
                                stroke="white" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="single-card">
                <span class="info-title">{{ __('Viewed Ads') }}</span>
                <h3 class="number">{{ $user->adsHistories?->count() }}</h3>
                <p class="description">{{ __('You have total viewed ads') }}</p>
                <div class="btn-inner">
                    <a class="round-btn" href="{{ route('user.ads.clicks') }}"><span><i class="fa-sharp fa-regular fa-arrow-up-long"></i></span></a>
                </div>
                <div class="icon">
                    <span>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.5 23.575H21.55C20.55 23.575 19.6 23.9625 18.9 24.6625L16.7625 26.775C15.7875 27.7375 14.2 27.7375 13.225 26.775L11.0875 24.6625C10.3875 23.9625 9.425 23.575 8.4375 23.575H7.5C5.425 23.575 3.75 21.9125 3.75 19.8625V6.2125C3.75 4.1625 5.425 2.5 7.5 2.5H22.5C24.575 2.5 26.25 4.1625 26.25 6.2125V19.85C26.25 21.9 24.575 23.575 22.5 23.575Z"
                                stroke="#02BAD8" stroke-width="2.25" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M15.0883 11.1875C15.0383 11.1875 14.9633 11.1875 14.9008 11.1875C13.5883 11.1375 12.5508 10.075 12.5508 8.75C12.5508 7.4 13.6383 6.3125 14.9883 6.3125C16.3383 6.3125 17.4258 7.4125 17.4258 8.75C17.4383 10.075 16.4008 11.15 15.0883 11.1875Z"
                                stroke="#02BAD8" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M11.5633 14.95C9.90078 16.0625 9.90078 17.875 11.5633 18.9875C13.4508 20.25 16.5508 20.25 18.4383 18.9875C20.1008 17.875 20.1008 16.0625 18.4383 14.95C16.5508 13.7 13.4633 13.7 11.5633 14.95Z"
                                stroke="#02BAD8" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="single-card">
                <span class="info-title">{{ __('Transactions') }}</span>
                <h3 class="number">{{ $total_transaction }}</h3>
                <p class="description">{{ __('You have total transactions') }}</p>
                <div class="btn-inner">
                    <a class="round-btn" href="{{ route('user.transactions') }}"><span><i class="fa-sharp fa-regular fa-arrow-up-long"></i></span></a>
                </div>
                <div class="icon">
                    <span>
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M26.5 12.85V14C26.4985 16.6955 25.6256 19.3184 24.0117 21.4773C22.3977 23.6362 20.1291 25.2156 17.5442 25.9799C14.9593 26.7442 12.1966 26.6524 9.66809 25.7182C7.1396 24.7841 4.98082 23.0576 3.5137 20.7963C2.04658 18.5351 1.34974 15.8601 1.5271 13.1704C1.70445 10.4807 2.74651 7.92042 4.49785 5.87135C6.24919 3.82229 8.61598 2.39424 11.2452 1.8002C13.8745 1.20615 16.6253 1.47793 19.0875 2.57501"
                                stroke="#29B475" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M26.5 4L14 16.5125L10.25 12.7625" stroke="#29B475" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="single-card">
                <span class="info-title">{{ __('Deposit') }}</span>
                <h3 class="number">{{ $currencySymbol.$total_deposit }}</h3>
                <p class="description">{{ __('You have total deposits') }}</p>
                <div class="btn-inner">
                    <a class="round-btn" href="{{ route('user.transactions') }}"><span><i class="fa-sharp fa-regular fa-arrow-up-long"></i></span></a>
                </div>
                <div class="icon">
                    <span>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.875 17.1875C11.875 18.4 12.8125 19.375 13.9625 19.375H16.3125C17.3125 19.375 18.125 18.525 18.125 17.4625C18.125 16.325 17.625 15.9125 16.8875 15.65L13.125 14.3375C12.3875 14.075 11.8875 13.675 11.8875 12.525C11.8875 11.475 12.7 10.6125 13.7 10.6125H16.05C17.2 10.6125 18.1375 11.5875 18.1375 12.8"
                                stroke="#F23450" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 9.375V20.625" stroke="#F23450" stroke-width="1.875" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M27.5 15C27.5 21.9 21.9 27.5 15 27.5C8.1 27.5 2.5 21.9 2.5 15C2.5 8.1 8.1 2.5 15 2.5"
                                stroke="#F23450" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21.25 3.75V8.75H26.25" stroke="#F23450" stroke-width="1.875"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M27.5 2.5L21.25 8.75" stroke="#F23450" stroke-width="1.875" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="single-card">
                <span class="info-title">{{ __('Earn') }}</span>
                <h3 class="number">{{ $currencySymbol.$total_earnings }}</h3>
                <p class="description">{{ __('Total earnings') }}</p>
                
                <div class="icon">
                    <span>
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.83984 16.9123C9.83984 18.5248 11.0773 19.8248 12.6148 19.8248H15.7523C17.0898 19.8248 18.1773 18.6873 18.1773 17.2873C18.1773 15.7623 17.5148 15.2248 16.5273 14.8748L11.4898 13.1248C10.5023 12.7748 9.83984 12.2373 9.83984 10.7123C9.83984 9.3123 10.9273 8.1748 12.2648 8.1748H15.4023C16.9398 8.1748 18.1773 9.4748 18.1773 11.0873"
                                stroke="#6596F4" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14 6.5V21.5" stroke="#6596F4" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M17.75 26.5H10.25C4 26.5 1.5 24 1.5 17.75V10.25C1.5 4 4 1.5 10.25 1.5H17.75C24 1.5 26.5 4 26.5 10.25V17.75C26.5 24 24 26.5 17.75 26.5Z"
                                stroke="#6596F4" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="single-card">
                <span class="info-title">{{ __('Referral') }}</span>
                <h3 class="number">{{ $total_referral }}</h3>
                <p class="description">{{ __('You have total numbers of refer.') }}</p>
                <div class="btn-inner">
                    <a class="round-btn" href="{{ route('user.referral') }}"><span><i class="fa-sharp fa-regular fa-arrow-up-long"></i></span></a>
                </div>
                <div class="icon">
                    <span>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.4512 13.5875C11.3262 13.575 11.1762 13.575 11.0387 13.5875C8.06367 13.4875 5.70117 11.05 5.70117 8.05C5.70117 4.9875 8.17617 2.5 11.2512 2.5C14.3137 2.5 16.8012 4.9875 16.8012 8.05C16.7887 11.05 14.4262 13.4875 11.4512 13.5875Z"
                                stroke="#800AF6" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M20.5121 5C22.9371 5 24.8871 6.9625 24.8871 9.375C24.8871 11.7375 23.0121 13.6625 20.6746 13.75C20.5746 13.7375 20.4621 13.7375 20.3496 13.75"
                                stroke="#800AF6" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M5.20039 18.2C2.17539 20.225 2.17539 23.525 5.20039 25.5375C8.63789 27.8375 14.2754 27.8375 17.7129 25.5375C20.7379 23.5125 20.7379 20.2125 17.7129 18.2C14.2879 15.9125 8.65039 15.9125 5.20039 18.2Z"
                                stroke="#800AF6" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M22.9258 25C23.8258 24.8125 24.6758 24.45 25.3758 23.9125C27.3258 22.45 27.3258 20.0375 25.3758 18.575C24.6883 18.05 23.8508 17.7 22.9633 17.5"
                                stroke="#800AF6" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="single-card">
                <span class="info-title">{{ __('Withdraw') }}</span>
                <h3 class="number">{{ $currencySymbol.$total_withdraws }}</h3>
                <p class="description">{{ __('Total amount of withdraw.') }}</p>
                <div class="btn-inner">
                    <a class="round-btn" href="{{ route('user.transactions') }}"><span><i class="fa-sharp fa-regular fa-arrow-up-long"></i></span></a>
                </div>
                <div class="icon">
                    <span>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.875 17.1875C11.875 18.4 12.8125 19.375 13.9625 19.375H16.3125C17.3125 19.375 18.125 18.525 18.125 17.4625C18.125 16.325 17.625 15.9125 16.8875 15.65L13.125 14.3375C12.3875 14.075 11.8875 13.675 11.8875 12.525C11.8875 11.475 12.7 10.6125 13.7 10.6125H16.05C17.2 10.6125 18.1375 11.5875 18.1375 12.8"
                                stroke="#FFAC3E" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 9.375V20.625" stroke="#FFAC3E" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M27.5 15C27.5 21.9 21.9 27.5 15 27.5C8.1 27.5 2.5 21.9 2.5 15C2.5 8.1 8.1 2.5 15 2.5"
                                stroke="#FFAC3E" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M27.5 7.5V2.5H22.5" stroke="#FFAC3E" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M21.25 8.75L27.5 2.5" stroke="#FFAC3E" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="single-card">
                <span class="info-title">{{ __('Support Tickets') }}</span>
                <h3 class="number">{{ $total_tickets }}</h3>
                <p class="description">{{ __('Total numbers of your tickets') }}</p>
                <div class="btn-inner">
                    <a class="round-btn" href="{{ route('user.ticket.index') }}"><span><i class="fa-sharp fa-regular fa-arrow-up-long"></i></span></a>
                </div>
                <div class="icon">
                    <span>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 27.5C21.9036 27.5 27.5 21.9036 27.5 15C27.5 8.09644 21.9036 2.5 15 2.5C8.09644 2.5 2.5 8.09644 2.5 15C2.5 21.9036 8.09644 27.5 15 27.5Z"
                                stroke="#10E264" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M11.3633 11.25C11.6572 10.4146 12.2372 9.71011 13.0007 9.2614C13.7642 8.81268 14.6619 8.64865 15.5348 8.79837C16.4076 8.94809 17.1993 9.40188 17.7696 10.0794C18.34 10.7569 18.6521 11.6144 18.6508 12.5C18.6508 15 14.9008 16.25 14.9008 16.25"
                                stroke="#10E264" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 21.25H15.0125" stroke="#10E264" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-12">
        <div class="recent-transactions-wrapper">
            <div class="site-card">
                <div class="site-card-header">
                    <div class="site-card-title">{{ __('Recent Transactions') }}</div>
                </div>
                <div class="site-card-body p-0 overflow-x-auto">
                    <div class="site-custom-table">
                        <div class="contents">
                            <div class="site-table-list site-table-head">
                                <div class="site-table-col">{{ __('Description') }}</div>
                                <div class="site-table-col">{{ __('Transactions ID') }}</div>
                                <div class="site-table-col">{{ __('Type') }}</div>
                                <div class="site-table-col">{{ __('Amount') }}</div>
                                <div class="site-table-col">{{ __('Charge') }}</div>
                                <div class="site-table-col">{{ __('Status') }}</div>
                                <div class="site-table-col">{{ __('Method') }}</div>
                            </div>
                            @foreach ($transactions as $transaction)
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <div class="description">
                                        <div class="event-icon">
                                            {!! getTransactionIcon($transaction->type) !!}
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                {{ $transaction->description }}
                                                @if(!in_array($transaction->approval_cause,['none',""]))
                                                <span class="msg" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="custom-tooltip" data-bs-placement="top"
                                                    data-bs-title="{{ $transaction->approval_cause }}"><i
                                                        data-lucide="message-square"></i>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="date">{{ $transaction->created_at }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="site-table-col">
                                    <div class="trx fw-bold">{{ $transaction->tnx }}</div>
                                </div>
                                <div class="site-table-col">
                                    <div class="type site-badge badge-primary">
                                        {{ ucfirst(str_replace('_',' ',$transaction->type->value)) }}</div>
                                </div>
                                <div class="site-table-col">
                                    <div @class([ "fw-bold" , "green-color"=> isPlusTransaction($transaction->type) == true,
                                        "red-color" => isPlusTransaction($transaction->type) == false
                                        ])>{{ isPlusTransaction($transaction->type) == true ? '+' : '-' }}{{ number_format($transaction->amount,2).' '.$currency }}
                                    </div>
                                </div>
                                <div class="site-table-col">
                                    <div class="fw-bold red-color">-{{ $transaction->charge.' '.$currency }}</div>
                                </div>
                                <div class="site-table-col">
                                    @if($transaction->status->value == 'failed')
                                    <div class="type site-badge badge-failed">{{ $transaction->status->value }}</div>
                                    @elseif($transaction->status->value == 'success')
                                    <div class="type site-badge badge-success">{{ $transaction->status->value }}</div>
                                    @elseif($transaction->status->value == 'pending')
                                    <div class="type site-badge badge-pending">{{ $transaction->status->value }}</div>
                                    @endif
                                </div>
                                <div class="site-table-col">
                                    <div class="fw-bold">
                                        {{ $transaction->method !== '' ? ucfirst(str_replace('-',' ',$transaction->method)) :  __('System') }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if(count($transactions) == 0)
                        <div class="no-data-found">{{ __('No Data Found') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#copy').on('click', function () {
        copyRef();
    });

    function copyRef() {
        /* Get the text field */
        var textToCopy = $('#refLink').val();
        // Create a temporary input element
        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(textToCopy).select();
        // Copy the text from the temporary input
        document.execCommand('copy');
        // Remove the temporary input element
        tempInput.remove();

        // Set tooltip as copied
        var tooltip = bootstrap.Tooltip.getInstance('#copy');
        tooltip.setContent({
            '.tooltip-inner': 'Copied'
        });

        setTimeout(() => {
            tooltip.setContent({
                '.tooltip-inner': 'Copy'
            });
        }, 4000);
    }

</script>
@endsection
