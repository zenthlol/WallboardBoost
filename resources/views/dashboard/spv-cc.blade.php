{{-- Navigation Timestamp --}}
<div class="btn-group btn-group-lg" id="nav-timestamp">
    <button type="button" id="nav-button-1" class="btn {{ $sortOption === 'byDeals' ? 'active' : '' }}" id="btn_today_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byDeals']) }}'">by Deals</button>

    <button type="button" id="nav-button-2" class="btn {{ $sortOption === 'byPremi' ? 'active' : '' }}" id="btn_tweek_agent_asuransi" onclick="window.location='{{ route('sysAdminAsuransi', ['sort' => 'byPremi']) }}'">by Premi</button>
</div>
