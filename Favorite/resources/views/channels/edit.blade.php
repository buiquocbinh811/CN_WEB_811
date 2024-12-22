<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Channel</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Channel</h1>
        <form action="{{ route('channels.update', $channel->ChannelID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="ChannelName" class="form-label">Channel Name</label>
                <input type="text" class="form-control" id="ChannelName" name="ChannelName" value="{{ $channel->ChannelName }}" required>
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" id="Description" name="Description" rows="3" required>{{ $channel->Description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="SubscribersCount" class="form-label">Subscribers Count</label>
                <input type="number" class="form-control" id="SubscribersCount" name="SubscribersCount" value="{{ $channel->SubscribersCount }}" required>
            </div>
            <div class="mb-3">
                <label for="URL" class="form-label">URL</label>
                <input type="url" class="form-control" id="URL" name="URL" value="{{ $channel->URL }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Channel</button>
            <a href="{{ route('channels.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>