@extends('layouts.subadmin')
@section('title')
    <title>Comment Add | CRM</title>
@endsection


@section('main')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Lead Form</h4>
                </div>
                <div class="card-body">
                    <!-- Add Note Section -->
                    <h4>Add Note</h4>
                    <form action="{{ route('subadmin.comment.store', $lead->id) }}" method="POST">
                        @csrf
                        <textarea name="comment" class="form-control" placeholder="Add a comment"></textarea>
                        
<select name="status_id" class="form-control" required>
    @foreach (\App\Models\Status::all() as $status)
        <option value="{{ $status->id }}">{{ $status->name }}</option>
    @endforeach
</select>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>

                    <!-- Comments Table Section -->
                    <h4 class="mt-4">Comments</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
        $comments = \App\Models\Comment::where('lead_id', $lead->id)->get();
    @endphp
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                        @php
                                            $status = \App\Models\Status::find($comment->status_id);
                                        @endphp
                                    
                                        @if ($status && $status->name === 'deal_closed')
                                            <span style="color: red; font-weight: bold;">
                                                {{ ucwords(str_replace('_', ' ', $status->name)) }}
                                            </span>
                                        @elseif ($status)
                                            {{ $status->name }}
                                        @else
                                            <span class="text-muted">No Status</span>
                                        @endif
                                    </td>
                                    
                                    <td>{{ $comment->user->name ?? 'Unknown' }}</td>
                                    <td> Date: {{ formatToBdTime($comment->created_at)['long_date'] }}<br>
                                        Time: {{ formatToBdTime($comment->created_at)['time'] }}
                                    </td>

                                    <td>
                                        
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No comments available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
