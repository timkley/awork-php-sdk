<?php

namespace Tests\Api;

use Awork\Collections\CommentCollection;
use Awork\Model\Comment;
use Illuminate\Http\Client\Request;

it('can get all comments for a specific entity', function () {
    fakeJsonResponse('comments.json');
    $comments = awork()->comments()->get('tasks', 'task-id');

    expect($comments)->toBeInstanceOf(CommentCollection::class);
    expect($comments->count())->toBe(2);
    expect($comments->first())->toBeInstanceOf(Comment::class);
});

it('can create a comment for a specific entity', function () {
    fakeJsonResponse('comment.json');

    $comment = awork()->comments()->create('tasks', 'task-id', 'this is my message');

    httpClient()->assertSent(function (Request $request) {
        return $request->body() === json_encode([
                                                    'message' => 'this is my message',
                                                ]) &&
            str_ends_with($request->url(), 'tasks/task-id/comments');
    });
    expect($comment)->toBeInstanceOf(Comment::class);
});
