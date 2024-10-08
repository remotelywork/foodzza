{{-- <div class="hv-item">
    <div class="hv-item-parent">
        <div class="person">
            @if(null != $levelUser->avatar)
                <img src="{{ asset($levelUser->avatar)}}">
            @else
                <div class="f-name-l-name">{{ $levelUser->first_name[0] }}{{ $levelUser->last_name[0] }}</div>
            @endif
            <p class="name">
                @if($me)
                    {{ __("It's Me") }}( {{ $levelUser->full_name }} )
                @else
                    <b>
                        {{ $levelUser->full_name }}
                    </b>
                @endif

            </p>
        </div>
    </div>



    @if($depth && $level >= $depth && $levelUser->referrals->count() > 0)

        <div class="hv-item-children">

            @foreach($levelUser->referrals as $levelUser)
                <div class="hv-item-child">
                    <!-- Key component -->
                    @include('frontend::referral.include.__tree',['levelUser' => $levelUser,'level' => $level,'depth' => $depth + 1,'me' => false])
                </div>
            @endforeach

        </div>

    @endif


</div> --}}

<div class="{{ $me ? 'main-referral-tree-item-parent' : 'main-referral-tree-item tree-children' }}">
    <div class="main-referral-tree-card {{ $me ? ' tree-parent' : '' }}">
        <div class="thumb">
            <img src="{{ asset($levelUser->avatar_path)}}" alt="profile tree">
        </div>
        <div class="content">
            <h5 class="title">
                @if($me)
                    {{ __("It's Me") }} ({{ $levelUser->full_name }})
                @else
                    <b>{{ $levelUser->full_name }}</b>
                @endif
            </h5>
            @if(!$me)
            <p class="info">
                {{ __('Deposit') }} : {{ $currencySymbol.$levelUser->total_deposit }}
            </p>
            @endif
        </div>
    </div>
</div>

@if($depth && $level >= $depth && $levelUser->referrals->count() > 0)
    <ul>
        @foreach($levelUser->referrals as $childUser)
            <li class="child">
                <div class="main-referral-tree-item tree-children">
                    <div class="main-referral-tree-card-inner">
                        <!-- Recursively include children -->
                        @include('frontend::referral.include.__tree', [
                            'levelUser' => $childUser, 
                            'level' => $level, 
                            'depth' => $depth + 1, 
                            'me' => false
                        ])
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif

