@if(isset($subscriptionfee->userid) == Auth::id())
    @if(isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active')  and ($subscriptionfee->updated_at) > \Carbon\Carbon::now()->subDays(365)->toDateTimeString())
        @if(isset($subscriber->step1))
            @if($subscriber->step1 != '')
                <script>window.location = "{{ route('second_step') }}";</script>
                <?php exit; ?>
            @endif
        @endif
    @else

    @endif
@endif