@if(isset($subscriptionfee->userid) == Auth::id())
    @if((isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active'))  and ($subscriptionfee->updated_at) < \Carbon\Carbon::now()->subDays(365)->toDateTimeString())
        <script>window.location = "{{ route('non-subscriber-dashboard') }}";</script>
    @endif
@endif

