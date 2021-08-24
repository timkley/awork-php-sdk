<?php

namespace Tests\Model;

use Awork\Model\Comment;
use Awork\Model\User;

it('creates a model from data', function () {
    $fixture = getJsonFixture('comment.json');

    $comment = new Comment($fixture);

    expect($comment->getId())->toBe('2e6248f1-fdf6-4dae-9ee7-5579d806b457');
    expect($comment->getEntityType())->toBe('');
    expect($comment->getEntityId())->toBe('00000000-0000-0000-0000-000000000000');
    expect($comment->getUser())->toBeInstanceOf(User::class);
    expect($comment->getFormattedMessage())->toBe('<b>NASA</b>');
    expect($comment->getPlainFormattedMessage())->toBe('NASA');
});
