<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Channels</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="/tailwind.">
    <link rel="stylesheet" href="/tailwind.config.js">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <h2>Manage <b>Channels</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('channels.create') }}" class="btn btn-success "style="margin-top: 15px; float: right "><i class="material-icons ">&#xE147;</i> <span>Add New Channel</span></a>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Channel Name</th>
                        <th>Description</th>
                        <th>Subscribers Count</th>
                        <th>URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($channels as $channel)
                        <tr>
                            <td class="fw-bold">{{ $channel->ChannelID }}</td>
                            <td>{{ $channel->ChannelName }}</td>
                            <td>{{ $channel->Description }}</td>
                            <td>{{ $channel->SubscribersCount }}</td>
                            <td><a href="{{ $channel->URL }}" target="_blank">{{ $channel->URL }}</a></td>
                            <td>
                                <a href="{{ route('channels.edit', $channel->ChannelID) }}" class="btn btn-primary" style="width:70px">Edit</a>
                                <form action="{{ route('channels.destroy', $channel->ChannelID) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this channel?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $channels->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>